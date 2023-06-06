<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VerifyController extends Controller
{
    public function verify($encryptId)
    {
        $id = Crypt::decrypt($encryptId);
         $sub= Submission::findOrFail($id);
         if($sub){
             return view('verify',compact('sub'));
         }else{
             return "Not Match Qr Code";
         }
    }
}
