<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ChecklistRequest;
use App\Models\Country;
use App\Models\ProjetRequestDetail;
use App\Support\BlogContentFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function platform()
    {
        return view('frontend.platform');
    }

    public function packages()
    {
        return view('frontend.packages');
    }

    public function mobileApp()
    {
        return view('frontend.mobile-app');
    }

    public function pricing()
    {
        return redirect()->route('frontend.packages');
    }

    public function quote()
    {
        return redirect()->route('frontend.contact');
    }

    public function contact(Request $request)
    {
        $country['cdata'] = Country::all();
        return view('frontend.contact', $country);
    }

    public function contactDetails(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            // 'company' => 'required',
            'country' => 'required',
            // 'website' => 'required',
            // 'plan' => 'required',
            // 'budget' => 'required',
        ]);


        $save = new ProjetRequestDetail();

        $save->name = $request->name;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        // $save->company = $request->company;
        $save->country = $request->country;
        // $save->website = $request->website;
        // $save->plan = $request->plan;
        // $save->budget = $request->budget;

        // if ($request->modules) {
        //     $save->modules = implode(',', $request->modules);
        // }

        $save->notes = $request->notes;

        $save->save();
        session()->flash('successMsg', 'Your details have been submitted successfully. We will get back to you soon.');
        return redirect()->route('frontend.contact');
    }
    public function checklistRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $checklist = new ChecklistRequest();
        $checklist->email = $request->email;
        $checklist->save();

        return back()->with(
            'successMsg',
            'Thank you! Checklist request submitted successfully.'
        );
    }
    public function getDemo(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|min:3|max:50',
            'email' => 'required|email:rfc,dns|unique:projet_request_details,email',
            'mobile' => 'required|digits_between:10,15',
            'plan'   => 'required|string',
        ], [
            'email.email' => 'Please enter a valid email address.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'The email has already been used.',
            'mobile.digits_between' => 'Please enter a valid mobile number.',
        ]);

        // $checkEmail = ProjetRequestDetail::where('email', $request->email)->first();

        // if ($checkEmail) {
        //     session()->flash('failedMsg', 'This email already exists. Please use another email.');
        //     return redirect()->back()->withInput();
        // }
        $status = 'Unattended';

        $var = new ProjetRequestDetail();

        $var->name   = $request->name;
        $var->email  = $request->email;
        $var->mobile = $request->mobile;
        $var->plan   = $request->plan;
        $var->status   = $status;

        $var->save();

        $mailData = [
            'name'   => $request->name,
            'email'  => $request->email,
            'mobile' => $request->mobile,
            'plan'   => $request->plan,
        ];

        $user['to'] = $request->email;
        Mail::send('frontend.mails.mail', $mailData, function ($message) use ($user) {

            $message->to($user['to']);
            $message->subject('MLM Software Demo Request Received');
        });

        session()->flash('successMsg', 'Your demo request has been sent successfully!');

        return redirect()->back();
    }
    public function blog()
    {
        $result['blogs'] = Blog::all();
        return view('frontend.blog')->with($result);
    }


    public function blogDetails(string $slug)
    {
        $blogs = Blog::latest()->get();
        $blog = $blogs->first(function ($blog) use ($slug) {
            return Str::slug($blog->title) === $slug;
        });

        abort_if(!$blog, 404);

        return view('frontend.blog-details', [
            'blog' => $blog,
            'article' => BlogContentFormatter::format($blog->title, $blog->text, $blog->image_urls),
            'recentBlogs' => $blogs->where('id', '!=', $blog->id)->take(3),
        ]);
    }

    public function blogProjectDetails(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'country' => 'required',
            'plan' => 'required',
            // 'budget' => 'required',
        ]);

        $save = new ProjetRequestDetail();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        $save->country = $request->country;
        $save->plan = $request->plan;
        // $save->budget = $request->budget;
        $save->notes = $request->notes;

        if ($request->modules) {
            $save->modules = implode(',', $request->modules);
        }

        $save->save();

        return back()->with('successMsg', 'Your project details have been submitted successfully.');
    }
}
