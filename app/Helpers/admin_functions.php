<?php


use App\Models\Admin;
use App\Models\Blog;
use App\Models\ChecklistRequest;
use App\Models\Country;
use App\Models\ProjetRequestDetail;
use Illuminate\Support\Facades\Hash;

function todayProjectRequestCount()
{
    $today = date('Y-m-d');
    return ProjetRequestDetail::whereDate('created_at', $today)->count();
}

function totalProjectRequestCount()
{
    return ProjetRequestDetail::count();
}

function blogCount()
{
    return Blog::count();
}

function attendedProjectRequestCount()
{
    return ProjetRequestDetail::where('status', 'Attended')->count();
}

function pendingProjectRequestCount()
{
    return ProjetRequestDetail::where(function ($query) {
        $query->whereNull('status')
            ->orWhere('status', '')
            ->orWhere('status', 'Unattended');
    })->count();
}

function rejectedProjectRequestCount()
{
    return ProjetRequestDetail::where('status', 'Rejected')->count();
}

function UnilevelPlanCount()
{
   $Ulevel = ProjetRequestDetail::where('plan', 'Unilevel Plan')->count();
   return $Ulevel;
}

function singleLegPlanCount()
{
   $Slevel = ProjetRequestDetail::where('plan', 'Single Leg Plan')->count();
   return $Slevel;
}

function binaryPlanCount()
{
   $Blevel = ProjetRequestDetail::where('plan', 'Binary Plan')->count();
   return $Blevel;
}

function matrixPlanCount()
{
   return ProjetRequestDetail::where('plan', 'Matrix Plan')->count();
}

function boardPlanCount()
{
   return ProjetRequestDetail::where('plan', 'Board Plan')->count();
}

function cryptoPlanCount()
{
   return ProjetRequestDetail::where('plan', 'Crypto Plan')->count();
}

function otherPlanCount()
{
   $Olevel = ProjetRequestDetail::where(function ($query) {
       $query->where('plan', 'Repurchase Plan')
              ->orWhere('plan', 'Investment Plan')
              ->orWhere('plan', 'Genration Plan');
   })->count();
   return $Olevel;
}

function countAllProjectRequest(){
    $count = ProjetRequestDetail::count();
    return $count;
}