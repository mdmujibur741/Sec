<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
 use Mpdf\MpdfException;

class PDFController extends Controller
{
    public function pdfView($id)
    {
       $submission = Submission::findOrFail($id);
       if($submission){
         $pdf = PDF::loadView('pdf', compact('submission')); 
         $name = $submission->name . time();
         return $pdf->stream($name . '.pdf');
       }
      
    }

    public function pdfDownload($id)
    {
      $submission = Submission::findOrFail($id);
      if($submission){
        $pdf = PDF::loadView('pdf', compact('submission')); 
        $name = $submission->name . time();
        return $pdf->download($name . '.pdf');
      }
    }

}
