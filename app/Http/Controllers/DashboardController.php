<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
       if(auth()->user()->type == 1){

         $agents = User::where('status', 1)->get()->count();
         $totalSub = Submission::all()->count();
         

         return Inertia::render('Dashboard',compact('agents','totalSub'));
       }else{
          if(auth()->user()->status == 1){
              
              return to_route('agent.submissions.index');
          }elseif(auth()->user()->status == 0){
             return "Not Active ";
          }
       }
        
    }
}
