<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TempController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
// Route::get('/platform', [FrontendController::class, 'platform'])->name('frontend.platform');
// Route::get('/packages', [FrontendController::class, 'packages'])->name('frontend.packages');
Route::get('/mobile-app', [FrontendController::class, 'mobileApp'])->name('frontend.mobile-app');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/pricing', [FrontendController::class, 'pricing'])->name('frontend.pricing');
Route::get('/quote', [FrontendController::class, 'quote'])->name('frontend.quote');
Route::post('/contact-details', [FrontendController::class, 'contactDetails'])->name('frontend.contact-details');
Route::post('/blog-project-details', [FrontendController::class, 'blogProjectDetails'])->name('frontend.blog-project-details');
Route::post('/checklist-request', [FrontendController::class, 'checklistRequest'])->name('frontend.checklist_request');
Route::post('/get-demo', [FrontendController::class, 'getDemo'])->name('frontend.get-demo');
Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('frontend.blog.details');
Route::view('/mlm-software-company-meerut', 'frontend.mlm-software-company-meerut')->name('frontend.meerut');
Route::view('/ai-integration', 'frontend.ai-integration')->name('frontend.ai-integration');


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/send-admin-otp', [AdminController::class, 'sendAdminOtp']);
Route::post('adminLogin', [AdminController::class, 'authenticate'])->name('adminLogin');

//forget password
Route::get('/forget-password', [AdminController::class, 'forgetPassword']);
Route::post('/retrivePassword', [AdminController::class, 'retrivePassword'])->name('retrivePassword');
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
    Route::get('/admin/member-details', [AdminController::class, 'details']);
    Route::post('/getMemberDetails', [AdminController::class, 'getMemberDetails'])->name('getMemberDetails');
    Route::get('/admin/company-wise-member', [AdminController::class, 'companyWiseMember'])->name('admin.company-wise-member');
    Route::post('/getCompanyWiseMember', [AdminController::class, 'getCompanyWiseMember'])->name('getCompanyWiseMember');
    Route::get('/resetStatus', [AdminController::class, 'resetStatus'])->name('resetStatus');
    Route::post('/admin/mail/send', [TempController::class, 'runMailProcess'])->name('admin.mail.send');
    Route::post('/admin/mail/reset-status', [AdminController::class, 'resetStatus'])->name('admin.mail.reset-status');

    Route::get('/setEmailDetail', [TempController::class, 'setEmailDetail']);
    Route::get('/sendUserMail', [TempController::class, 'sendUserMail']);
    // Route::get('/queueEmailDetails', [TempController::class, 'queueEmailDetails']);

    Route::get('/admin/project-request-details', [AdminAuthController::class, 'projectRequestDetails'])->name('admin.project-request.details');
    Route::get('/admin/project-request-attended', [AdminAuthController::class, 'attendedProjectRequestDetails'])->name('admin.project-request.attended');
    Route::get('getProjectReqDetails', [AdminAuthController::class, 'getProjectReqDetails'])->name('getProjectReqDetails');
    Route::get('getAttendedProjectReqDetails', [AdminAuthController::class, 'getAttendedProjectReqDetails'])->name('getAttendedProjectReqDetails');
    Route::post('/admin/project-request/{id}/update-status', [AdminAuthController::class, 'updateProjectRequestStatus'])->name('admin.project-request.update-status');
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/settings', [AdminController::class, 'setting'])->name('admin.settings');
    Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/details', [BlogController::class, 'details'])->name('admin.blog.details');
    Route::put('/admin/blog/{blog}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{blog}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
});
