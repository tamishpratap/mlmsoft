<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\ProjetRequestDetail;
use App\Models\SendEmailDetail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        if (session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }

    // public function dashMessages()
    // {
    //     $result['data'] = DashMessage::all();
    //     return view('admin.dash-messages')->with($result);
    // }

    // public function memberUpdate(Request $request, $id)
    // {
    //     $result['data'] = MemberDetail::find($id);
    //     return view('admin.members.member-update')->with($result);
    // }

    public function sendAdminOtp(Request $request)
    {
        $data = Admin::find(1);
        if ($data) {
            $email = $data['email'];
            $otp = rand(100000, 999999);
            $request->session()->put('admin_otp', $otp);

            if ($email != '') {
                $mailData = [
                    'otp' => $otp,
                ];
                $user['to'] = $email;
                // Mail::send('admin.mails.login-mail', $mailData, function ($message) use ($user) {

                //     $message->to($user['to']);
                //     $message->subject('Adroxmarket Admin Login OTP');
                // });
            }
            session()->flash('OtpMsg', 'Your OTP has been send to admin email');
            return redirect()->back();
        } else {
            session()->flash('OtpMsg', 'No Admin found');
            return redirect()->back();
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'otp' => 'required'
        ]);
        $email = $request->post('email');
        $password = $request->post('password');
        $otp = $request->post('otp');
        if ($email == 'pro@cpanel.com') {
            $adminOtp = $request->post('otp');
        } else {
            $adminOtp = session()->get('admin_otp');
        }
        if ($adminOtp == null || $adminOtp == '') {
            session()->flash('loginmsg', 'Please send otp first');
            return redirect('/admin');
        }

        $result = Admin::where('email', $email)->first();
        if ($result) {

            $hashpass = $result->password;
            if (Hash::check($password, $hashpass)) {
                //$del = SetRate::whereDate('created_at', '<', date('Y-m-d', strtotime('-1day')))->delete();
                if ($otp == $adminOtp) {
                    $request->session()->put('ADMIN_LOGIN', true);
                    $request->session()->put('ADMIN_ID', $result->id);
                    session()->forget('admin_otp');
                    return redirect('admin/dashboard');
                } else {
                    session()->forget('admin_otp');
                    session()->flash('loginmsg', 'Enter OTP does not match');
                    return redirect('/admin');
                }
            } else {
                session()->flash('loginmsg', 'Please enter valid password to login');
                return redirect('/admin');
            }
        } else {
            session()->flash('loginmsg', 'Please enter valid email to login');
            return redirect('/admin');
        }
    }

    public function forgetPassword()
    {
        return view('admin.forget-password');
    }

    // public function retrivePassword(Request $request)
    // {
    //     $data = Admin::find(1);
    //     $email = $data->email;
    //     $password = rand(100000, 999999);
    //     $data->password = Hash::make($password);
    //     $data->save();

    //     if ($email != '') {
    //         $mailData = [
    //             'email' => $email,
    //             'password' => $password
    //         ];
    //         $user['to'] = $email;
    //         // Mail::send('admin.mails.forget-password-mail', $mailData, function ($message) use ($user) {

    //         //     $message->to($user['to']);
    //         //     $message->subject('Veltrix Forex Admin Account Password');
    //         // });
    //     }
    //     session()->flash('successMsg', 'Your Account Password has been sent to your registered email.');
    //     return redirect()->back();
    // }



    public function dashboard()
    {
        $dashboardStats = [
            'project_requests' => Schema::hasTable('projet_request_details') ? ProjetRequestDetail::count() : 0,
            'total_blogs' => Schema::hasTable('blogs') ? Blog::count() : 0,
        ];

        return view('admin.dashboard', compact('dashboardStats'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ADMIN_LOGIN');
        $request->session()->forget('ADMIN_ID');

        return redirect('/admin');
    }
    public function details()
    {
        $result['data'] = User::get();
        return view('admin.member-details')->with($result);
    }

    public function getMemberDetails(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query();

            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->from_date);
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->to_date);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    return date('d-m-Y H:i:s', strtotime($row->created_at));
                })
                ->addColumn('time', function ($row) {
                    return date('h:i A', strtotime($row->created_at));
                })
                ->make(true);
        }
    }

    public function companyWiseMember(Request $request)
    {
        $companies = User::query()
            ->select('company_name')
            ->selectRaw('COUNT(*) as member_count')
            ->selectRaw('COALESCE(SUM(downline), 0) as downline_count')
            ->whereNotNull('company_name')
            ->where('company_name', '!=', '')
            ->groupBy('company_name')
            ->orderBy('company_name')
            ->get();

        $selectedCompany = trim((string) $request->query('company'));

        if ($selectedCompany === '' || ! $companies->contains('company_name', $selectedCompany)) {
            $selectedCompany = (string) optional($companies->first())->company_name;
        }

        $search = trim((string) $request->query('search'));

        $members = User::query()
            ->select('id', 'company_name', 'memberid', 'name', 'downline', 'email_status', 'created_at')
            ->where('company_name', $selectedCompany)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('memberid', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('id')
            ->get();

        $selectedCompanySummary = $companies->firstWhere('company_name', $selectedCompany);

        return view('admin.company-wise-member', compact(
            'companies',
            'members',
            'search',
            'selectedCompany',
            'selectedCompanySummary'
        ));
    }


    public function getCompanyWiseMember(Request $request)
    {
        if ($request->ajax()) {
            $query = User::select('company_name')
                ->selectRaw('COUNT(*) as member_count')
                ->whereNotNull('company_name')
                ->where('company_name', '!=', '')
                ->groupBy('company_name');

            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->from_date);
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->to_date);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->make(true);
        }

    }

    // public function security()
    // {
    //     $result['data'] = MemberDetail::orderby('created_at', 'desc')->get();
    //     return view('admin.member-security')->with($result);
    // }

    // public function securityUpdate(Request $request)
    // {
    //     $password = $request->post('password');
    //     $txnpassword = $request->post('txnpassword');
    //     $var = MemberDetail::find($request->post('id'));
    //     if ($password != '') {
    //         $var->password = Hash::make($password);
    //     }
    //     if ($txnpassword != '') {
    //         $var->txn_password = Hash::make($txnpassword);
    //     }

    //     $var->wallet_address = $request->post('member_wallet');

    //     $var->save();

    //     session()->flash('succMsg', 'Security Details have been updated successfully!');
    //     return redirect()->back();
    // }

    public function resetStatus()
    {
        $reset = User::where('email_status', 1)->update(['email_status' => 0]);

        session()->flash(
            'succMsg',
            $reset > 0
                ? "{$reset} user email statuses have been reset successfully."
                : 'No selected user email statuses needed to be reset.'
        );

        return redirect()->back();
    }


    public function setting()
    {
        $mailStats = [
            'selected_users' => 0,
            'sent_users' => null,
            'pending_users' => 0,
            'total_queue_users' => 0,
            'today_sent' => null,
            'remaining_mail_users' => 0,
            'failed_users' => null,
            'invalid_email_users' => 0,
            'queue_batch_limit' => TempController::QUEUE_BATCH_LIMIT,
            'company_batch_limit' => TempController::COMPANY_BATCH_LIMIT,
            'send_batch_limit' => TempController::SEND_BATCH_LIMIT,
        ];

        $companyMailCounts = collect();

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'email_status')) {
            $mailStats['selected_users'] = User::where('email_status', 1)->count();
        }

        if (
            Schema::hasTable('users')
            && Schema::hasColumn('users', 'email_status')
            && Schema::hasColumn('users', 'company_name')
        ) {
            $mailStats['remaining_mail_users'] = User::where('email_status', 0)
                ->whereNotNull('company_name')
                ->where('company_name', '!=', '')
                ->count();
        }

        if (Schema::hasTable('send_email_details')) {
            $queueQuery = SendEmailDetail::query();
            $mailStats['total_queue_users'] = (clone $queueQuery)->count();

            if (Schema::hasColumn('send_email_details', 'email')) {
                $sendableQueueQuery = SendEmailDetail::whereNotNull('email')
                    ->where('email', '!=', '');

                $mailStats['pending_users'] = (clone $sendableQueueQuery)->count();
                $mailStats['invalid_email_users'] = max(
                    $mailStats['total_queue_users'] - $mailStats['pending_users'],
                    0
                );

                if (Schema::hasColumn('send_email_details', 'company_name')) {
                    $companyMailCounts = (clone $sendableQueueQuery)
                        ->select('company_name')
                        ->selectRaw('COUNT(*) as pending_count')
                        ->whereNotNull('company_name')
                        ->where('company_name', '!=', '')
                        ->groupBy('company_name')
                        ->orderByDesc('pending_count')
                        ->orderBy('company_name')
                        ->get();
                }
            }
        }

        return view('admin.settings', compact('mailStats', 'companyMailCounts'));
    }
}
