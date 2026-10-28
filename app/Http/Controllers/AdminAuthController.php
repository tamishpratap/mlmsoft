<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChecklistRequest;
use App\Models\Country;
use App\Models\ProjetRequestDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 4 characters',
        ]);

        // Check Email
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->back()->with('loginmsg', 'Invalid Email');
        }

        // Check Password
        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->with('loginmsg', 'Invalid Password');
        }

        // Session
        $request->session()->put('ADMIN_LOGIN', true);
        $request->session()->put('ADMIN_ID', $admin->id);
        $request->session()->put('ADMIN_NAME', $admin->name);

        return redirect('/admin/dashboard');
    }

    public function getProjectReqDetails(Request $request)
    {
        if ($request->ajax()) {

            $data = ProjetRequestDetail::query()
                ->where(function ($query) {
                    $query->where('status', 'Unattended')
                        ->orWhereNull('status')
                        ->orWhere('status', '');
                })
                ->latest();

            return datatables()
                ->of($data)

                ->addColumn('id', function ($row) {
                    return $row->id;
                })

                ->addColumn('name', function ($row) {
                    return $row->name;
                })

                ->addColumn('email', function ($row) {
                    return $row->email;
                })

                ->addColumn('mobile', function ($row) {
                    return $row->mobile;
                })

                ->addColumn('country', function ($row) {
                    return $row->country;
                })

                ->addColumn('plan', function ($row) {
                    return $row->plan;
                })

                ->addColumn('budget', function ($row) {
                    return $row->budget;
                })

                ->addColumn('notes', function ($row) {
                    return $row->notes;
                })

                ->addColumn('status', function ($row) {

                    return $row->status ? $row->status : 'Unattended';
                })

                ->rawColumns(['status'])

                ->make(true);
        }

        $result['countries'] = Country::all();
        $result['checklist_requests'] = ChecklistRequest::all();
        $result['admin'] = Admin::find(session('ADMIN_ID'));
        $result['dashboardStats'] = [
            'project_requests' => Schema::hasTable('projet_request_details') ? ProjetRequestDetail::count() : 0,
            'total_blogs' => Schema::hasTable('blogs') ? Blog::count() : 0,
        ];

        return view('admin.dashboard')->with($result);
    }

    public function getAttendedProjectReqDetails(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjetRequestDetail::query()
                ->where('status', 'Attended')
                ->latest();

            return datatables()
                ->of($data)
                ->addColumn('project_name', function ($row) {
                    return $row->plan ?: ($row->website ?: 'Project Request #' . $row->id);
                })
                ->addColumn('client_name', function ($row) {
                    return $row->name;
                })
                ->addColumn('request_date', function ($row) {
                    return $row->created_at ? $row->created_at->format('M d, Y') : 'N/A';
                })
                ->addColumn('status', function ($row) {
                    return $row->status ?: 'Attended';
                })
                ->make(true);
        }

        return response()->json(['data' => []]);
    }

    public function projectRequestDetails()
    {
        $projectRequests = ProjetRequestDetail::all();
        return view('admin.project-request-details', compact('projectRequests'));
    }

    public function attendedProjectRequestDetails()
    {
        return view('admin.attended-project-request-details');
    }

    public function updateProjectRequestStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Unattended,Attended',
        ]);

        ProjetRequestDetail::where('id', $id)->update(['status' => $request->status]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ADMIN_LOGIN');
        $request->session()->forget('ADMIN_ID');
        return redirect('/admin');
    }
}
