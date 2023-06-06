<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitissonUpdateRequest;
use Inertia\Inertia;
use App\Http\Resources\SubmisstionResource;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request as Req;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class SubmissionController extends Controller
{
    public function index()
    {
      $filters = Request::only('search','perPage');
      $inputSearch = Request::input('search');
      $perPage = Request::input('perPage') ?: 15;
     
      $authId = auth()->user()->id;

      $agentSubs = SubmisstionResource::collection(Submission::query()
      ->where('user_id', $authId)->when($inputSearch, function($query, $search){
        $query->where('name','like', "%{$search}%");})->orderBy('id', 'desc')->paginate($perPage)->withQueryString());
      
         return Inertia::render('agent/index',compact('agentSubs','filters'));
        
    }

    public function create()
    {
         $certificate_no = time()+'68422';
         $centers = ['Dhaka Medical College Hospital', 'Thakurgaon (sadar) Upazila Health Office', 'Border Guard Bangladesh Hospital, Thakurgaon', 'Zila Sadar Hospital, Thakurgaon', 'Tangali (sadar) Upazila Health Office', 'Sheikh Hasina Medical College Hospital, Tangail', 'Tangali 250 Bed General Hospital', 'Sylhet (sadar) Upazila Health Office', 'Combined Military Hospital (CMH), Jalalabad', 'Sheikh Russel National Gastroliver Institute & Hospital',
'Shaheed Suhrawardy Medical College & Hospital', 'Sir Salimullah Medical College Hospital', 'Sirajganj (sadar) Upazila Health Office', 'Sirajganj 250 Bed Bangamata Sheikh Fazilatunnesa Mujib General Hospital', 'Sherpur (sadar) Upazila Health Office', 'Zila Sadar Hospital, Sherpur', 'Shariatpur (sadar) Upazila Health Office', 'Police Hospital, Shariatpur', '100 Bed Zila Sadar Hospital, Shariatpur', 'Syadpir 100 Zila Hospital', 'Satkhira (sadar) Upazila Health Office','Zila Sadar Hospital, Satkhira',
'Sunamganj (sadar) Upazila Health Office', 'Sunamganj 250 Bed Zila Sadar Hospital', 'Rangpur (sadar) Upazila Health Office', 'Rangpur Medical College Hospital', 'Zila Sadar Hospital, Rangpur', 'Godagari 31 Bed  Hospitla,  Godagari, Rajshahi', 'Combined Military Hospital (CMH), Rajshahi', 'Rajshahi Medical College Hospital', 'Rajbari (sadar) Upazila Health Office', 'Police Hospital, Rajbari', 'Zila Sadar Hospital, Rajbari', 'Police Hospital, Rangamati','Zila Sadar Hospital, Rangamati',
'Rangamati (sadar) Upazila Health Office', 'Pabna (sadar) Upazila Health Office', '250 Bed General Hospital, Pabna', 'Panchagar (sadar) Upazila Health Office', 'Zila Sadar Hospital, Panchagar', 'Patuakhali (sadar) Upazila Health Office', 'Police Hospital, Patuakhali', 'Patuakhali 250 Bed Sadar Hospital', 'Police Hospital, Pirojpur', 'Pirojpur (sadar) Upazila Health Office', 'Natore (sadar) Upazila Health Office', 'Combined Military Hospital (CMH), Natore', 'Zila Sadar Hospital, Natore',
'Naogaon (sadar) Upazila Health Office', '100 Zila Sadar Hospital, Naogaon', 'Netrakona (sadar) Upazila Health Office', 'Zila Sadar Hospital, Netrakona', 'Narsingdi (sadar) Upazila Health Office', 'Narsingdi 100 Bed Zila Hospital', 'Zila Sadar Hospital, Narsingdi', 'Narayanganj (sadar) Upazila Health Office', 'Narayanganj General (Victoria) Hospital', 'Narayanganj 300 Bed Hospital', 'Nilphamari (sadar) Upazila Health Office', '250 Bed General Hospital, Noakhali',
'Police Hospital, Noakhali','Noakhali (sadar) Upazila Health Office', 'Mymensingh Medical College Hospital','Combined Military Hospital (CMH), Mymensingh','Mymensingh (sadar) Upazila Health Office','Narail (sadar) Upazila Health Office', 'Zila Sadar Hospital, Narail', 'Police Hospital, Madaripur','Upazila Health Complex, Magura','Magura (sadar) Upazila Health Office','250 Bed General Hospital, Meherpur', 'Meherpur (sadar) Upazila Health Office','Munsiganj (sadar) Upazila Health Office','Moulavibazar 250 Bed Zila Sadar Hospital','Moulavibazar (sadar) Upazila Health Office',
'Munsiganj 250 Bed General Hospital','Police Hospital, Munsiganj','250 Bed General Hospital, Manikganj','Police Hospital, Manikganj','Manikganj (sadar) Upazila Health Office','Madaripur (sadar) Upazila Health Office','Zila Sadar Hospital, Madaripur', 'Kishoreganj (sadar) Upazila Health Office',
'250 Bed General Hospital, Kishoreganj','Police Hospital, Kishoreganj','Zila Sadar Hospital, Khagrachori','Police Hospital, Khagrachori','Khagrachori (sadar) Upazila Health Office','Zila Sadar Hospital, Kurigram','Kurigram (sadar) Upazila Health Office','250 Bed General Hospital, Khulna','Khulna Medical College Hospital','Kustia 250 Bed General Hospital','Kustia (sadar) Upazila Health Office','Lalmonirhat (sadar) Upazila Health Office','Lakshmipur (sadar) Upazila Health Office','Zila Sadar Hospital, Lalmonirhat','Police Hospital, Lakshmipur','Jassore 250 Bed General Hospital','Jassore Medical College Hospital','Jamalpur 250 Bed General Hospital','Jamalpur (sadar) Upazila Health Office','Zila Sadar Hospital, Jaypurhat','Jaypurhat (sadar) Upazila Health Office',
'Police Hospital, Jhalakathi', 'Zila Sadar Hospital, Jhalakathi', 'Jhalakathi (sadar) Upazila Health Office', 'Zila Sadar Hospital, Jhinaidah', 'Jhinaidah (sadar) Upazila Health Office', 
'250 Bed General Hospital, Gopalganj', 'Police Hospital, Gopalganj', 'Gopalganj (sadar) Upazila Health Office', 'Zila Sadar Hospital, Gazipur', 'Sheikh Fazilatunnesa Mujib Memorial KPG Specialized Hospital & Nursing Institute', 'Police Hospital, Gazipur', 'Gazipur (sadar) Upazila Health Office', 'Zila Sadar Hospital, Gaibandha', 'Gaibandha (sadar) Upazila Health Office',
'Hobiganj (sadar) Upazila Health Office', '250 Bed General Hospital, Hobiganj', 
'zilasadar Health Complex, Chuadanga', 'Bangladesh Border Guard Hospital, Chuadanga', 'Chuadanga (sadar) Upazila Health Office', 'Adhunik Sadar Hospital, Chapainababganj', 'Chapai Nababganj (sadar) Upazila Health Office', '250 Bed General Hospital, Dinajpur', 'M abdur Rohim Medical College Hospital, Dinajpur', 'Dinajpur (sadar) Upazila Health Office',
'250 Bed Zila Sadar Hospital, Feni', 'Police Hospital, Feni', 'Feni (sadar) Upazila Health Office', 'Police Hospital, Brabambaria', 'Brabambaria (sadar) Upazila Health Office', 'Zila Sadar Hospital, Bagerhat', 'Bagerhat (sadar) Upazila Health Office',
'Chandpur (sadar) Upazila Health Office', 'Police Hospital, Chandpur', 'Chandpur 250 Bed General Hospital', 'Zila Sadar Hospital, Comilla', 'Comilla Medical College Hospital', 'Comilla (sadar) Upazila Health Office', 'Cox s Bazar (sadar) Upazila Health Office','Barguna (sadar) Upazila Health Office','Zila Sadar Hospital, Barguna','Police Hospital, Barguna','Zila Sadar Hospital, Barisal','Barisal (sadar) Upazila Health Office','Police Hospital, Barisal','Zila Sadar Hospital, Bhola','Police Hospital, Bhola','Bhola (sadar) Upazila Health Office','Zila Sadar Hospital, Bandarban','Police Hospital, Bandarban','Bandarban (sadar) Upazila Health Office','250 Bed Mohammad ALi Hospital, Bogura','Shahid Ziaur Rahman Medical Collage Hospital','Combined Military Hospital (CMH), Bogura','Bogura (sadar) Upazila Health Office','Brabambaria 250 Bed Zila Sadar Hospital',
'Chittagong 250 Bed General Hospital','Cox`s Bazar 250 Bed Zila Sadar Hospital', 'other',
];
        return Inertia::render('agent/create',compact('certificate_no','centers'));
    }

    public function store(SubmitissonUpdateRequest $request)
    {

  
   $file_name = '/qrcode/'. time() . '.png';
   $output =  $file_name;




        $subId = Submission::insertGetId([
            'certificate_no' => $request->certificate_no,
             'birth_certificate' =>$request->birth_certificate, 
             'national_id' =>$request->national_id , 
             'nationality' => $request->nationality,
             'passport_no' => $request->passport_no,
            'name' => $request->name, 
            'dob' => $request->dob,
             'gender' => $request->gender, 
             'first_dose_date' => $request->first_dose_date,
              'first_dose_name' => $request->first_dose_name, 
              'second_dose_date' => $request->second_dose_date, 
              'second_dose_name' => $request->second_dose_name,
           'third_dose_date' => $request->third_dose_date, 
           'third_dose_name' => $request->third_dose_name,
           'fourth_dose_date' => $request->fourth_dose_date,
           'fourth_dose_name' => $request->fourth_dose_name,
           'vaccine_center' => $request->vaccine_center, 
           'other_center' => $request->other_center,
           'first_dose_other_name' => $request->first_dose_other_name,
           'second_dose_other_name' => $request->second_dose_other_name,
           'third_dose_other_name' => $request->third_dose_other_name,
            'fourth_dose_other_name' => $request->fourth_dose_other_name,
           'qr_code' => $output,
           'total'=>$request->total,
           'user_id' =>auth()->user()->id,
           'vaccinated_by' => "Directorate General of Health Services (DGHS)",
          ]);

          // QrCode generate  and Save

          $encryptId = Crypt::encrypt($subId);

          $image = \QrCode::format('png')->size(250)
          ->generate(url('http://127.0.0.1:8000/verify/'.$encryptId));
          Storage::disk('public')->put($output, $image); 
          
          return Redirect::back();
    }


    public function edit(Submission $submission)
    {
      $centers = ['Dhaka Medical College Hospital', 'Thakurgaon (sadar) Upazila Health Office', 'Border Guard Bangladesh Hospital, Thakurgaon', 'Zila Sadar Hospital, Thakurgaon', 'Tangali (sadar) Upazila Health Office', 'Sheikh Hasina Medical College Hospital, Tangail', 'Tangali 250 Bed General Hospital', 'Sylhet (sadar) Upazila Health Office', 'Combined Military Hospital (CMH), Jalalabad', 'Sheikh Russel National Gastroliver Institute & Hospital',
      'Shaheed Suhrawardy Medical College & Hospital', 'Sir Salimullah Medical College Hospital', 'Sirajganj (sadar) Upazila Health Office', 'Sirajganj 250 Bed Bangamata Sheikh Fazilatunnesa Mujib General Hospital', 'Sherpur (sadar) Upazila Health Office', 'Zila Sadar Hospital, Sherpur', 'Shariatpur (sadar) Upazila Health Office', 'Police Hospital, Shariatpur', '100 Bed Zila Sadar Hospital, Shariatpur', 'Syadpir 100 Zila Hospital', 'Satkhira (sadar) Upazila Health Office','Zila Sadar Hospital, Satkhira',
      'Sunamganj (sadar) Upazila Health Office', 'Sunamganj 250 Bed Zila Sadar Hospital', 'Rangpur (sadar) Upazila Health Office', 'Rangpur Medical College Hospital', 'Zila Sadar Hospital, Rangpur', 'Godagari 31 Bed  Hospitla,  Godagari, Rajshahi', 'Combined Military Hospital (CMH), Rajshahi', 'Rajshahi Medical College Hospital', 'Rajbari (sadar) Upazila Health Office', 'Police Hospital, Rajbari', 'Zila Sadar Hospital, Rajbari', 'Police Hospital, Rangamati','Zila Sadar Hospital, Rangamati',
      'Rangamati (sadar) Upazila Health Office', 'Pabna (sadar) Upazila Health Office', '250 Bed General Hospital, Pabna', 'Panchagar (sadar) Upazila Health Office', 'Zila Sadar Hospital, Panchagar', 'Patuakhali (sadar) Upazila Health Office', 'Police Hospital, Patuakhali', 'Patuakhali 250 Bed Sadar Hospital', 'Police Hospital, Pirojpur', 'Pirojpur (sadar) Upazila Health Office', 'Natore (sadar) Upazila Health Office', 'Combined Military Hospital (CMH), Natore', 'Zila Sadar Hospital, Natore',
      'Naogaon (sadar) Upazila Health Office', '100 Zila Sadar Hospital, Naogaon', 'Netrakona (sadar) Upazila Health Office', 'Zila Sadar Hospital, Netrakona', 'Narsingdi (sadar) Upazila Health Office', 'Narsingdi 100 Bed Zila Hospital', 'Zila Sadar Hospital, Narsingdi', 'Narayanganj (sadar) Upazila Health Office', 'Narayanganj General (Victoria) Hospital', 'Narayanganj 300 Bed Hospital', 'Nilphamari (sadar) Upazila Health Office', '250 Bed General Hospital, Noakhali',
      'Police Hospital, Noakhali','Noakhali (sadar) Upazila Health Office', 'Mymensingh Medical College Hospital','Combined Military Hospital (CMH), Mymensingh','Mymensingh (sadar) Upazila Health Office','Narail (sadar) Upazila Health Office', 'Zila Sadar Hospital, Narail', 'Police Hospital, Madaripur','Upazila Health Complex, Magura','Magura (sadar) Upazila Health Office','250 Bed General Hospital, Meherpur', 'Meherpur (sadar) Upazila Health Office','Munsiganj (sadar) Upazila Health Office','Moulavibazar 250 Bed Zila Sadar Hospital','Moulavibazar (sadar) Upazila Health Office',
      'Munsiganj 250 Bed General Hospital','Police Hospital, Munsiganj','250 Bed General Hospital, Manikganj','Police Hospital, Manikganj','Manikganj (sadar) Upazila Health Office','Madaripur (sadar) Upazila Health Office','Zila Sadar Hospital, Madaripur', 'Kishoreganj (sadar) Upazila Health Office',
      '250 Bed General Hospital, Kishoreganj','Police Hospital, Kishoreganj','Zila Sadar Hospital, Khagrachori','Police Hospital, Khagrachori','Khagrachori (sadar) Upazila Health Office','Zila Sadar Hospital, Kurigram','Kurigram (sadar) Upazila Health Office','250 Bed General Hospital, Khulna','Khulna Medical College Hospital','Kustia 250 Bed General Hospital','Kustia (sadar) Upazila Health Office','Lalmonirhat (sadar) Upazila Health Office','Lakshmipur (sadar) Upazila Health Office','Zila Sadar Hospital, Lalmonirhat','Police Hospital, Lakshmipur','Jassore 250 Bed General Hospital','Jassore Medical College Hospital','Jamalpur 250 Bed General Hospital','Jamalpur (sadar) Upazila Health Office','Zila Sadar Hospital, Jaypurhat','Jaypurhat (sadar) Upazila Health Office',
      'Police Hospital, Jhalakathi', 'Zila Sadar Hospital, Jhalakathi', 'Jhalakathi (sadar) Upazila Health Office', 'Zila Sadar Hospital, Jhinaidah', 'Jhinaidah (sadar) Upazila Health Office', 
      '250 Bed General Hospital, Gopalganj', 'Police Hospital, Gopalganj', 'Gopalganj (sadar) Upazila Health Office', 'Zila Sadar Hospital, Gazipur', 'Sheikh Fazilatunnesa Mujib Memorial KPG Specialized Hospital & Nursing Institute', 'Police Hospital, Gazipur', 'Gazipur (sadar) Upazila Health Office', 'Zila Sadar Hospital, Gaibandha', 'Gaibandha (sadar) Upazila Health Office',
      'Hobiganj (sadar) Upazila Health Office', '250 Bed General Hospital, Hobiganj', 
      'zilasadar Health Complex, Chuadanga', 'Bangladesh Border Guard Hospital, Chuadanga', 'Chuadanga (sadar) Upazila Health Office', 'Adhunik Sadar Hospital, Chapainababganj', 'Chapai Nababganj (sadar) Upazila Health Office', '250 Bed General Hospital, Dinajpur', 'M abdur Rohim Medical College Hospital, Dinajpur', 'Dinajpur (sadar) Upazila Health Office',
      '250 Bed Zila Sadar Hospital, Feni', 'Police Hospital, Feni', 'Feni (sadar) Upazila Health Office', 'Police Hospital, Brabambaria', 'Brabambaria (sadar) Upazila Health Office', 'Zila Sadar Hospital, Bagerhat', 'Bagerhat (sadar) Upazila Health Office',
      'Chandpur (sadar) Upazila Health Office', 'Police Hospital, Chandpur', 'Chandpur 250 Bed General Hospital', 'Zila Sadar Hospital, Comilla', 'Comilla Medical College Hospital', 'Comilla (sadar) Upazila Health Office', 'Cox s Bazar (sadar) Upazila Health Office','Barguna (sadar) Upazila Health Office','Zila Sadar Hospital, Barguna','Police Hospital, Barguna','Zila Sadar Hospital, Barisal','Barisal (sadar) Upazila Health Office','Police Hospital, Barisal','Zila Sadar Hospital, Bhola','Police Hospital, Bhola','Bhola (sadar) Upazila Health Office','Zila Sadar Hospital, Bandarban','Police Hospital, Bandarban','Bandarban (sadar) Upazila Health Office','250 Bed Mohammad ALi Hospital, Bogura','Shahid Ziaur Rahman Medical Collage Hospital','Combined Military Hospital (CMH), Bogura','Bogura (sadar) Upazila Health Office','Brabambaria 250 Bed Zila Sadar Hospital',
      'Chittagong 250 Bed General Hospital','Cox`s Bazar 250 Bed Zila Sadar Hospital','other'
      ];
      return Inertia::render('agent/edit',compact('submission','centers'));
    }

    public function update(SubmitissonUpdateRequest $request, $id)
    {

  

      $submission = Submission::findOrFail($id);
         $submission->update([
          'certificate_no' => $request->certificate_no,
          'birth_certificate' => $request->birth_certificate, 
          'national_id' =>$request->national_id , 
          'nationality' => $request->nationality,
          'passport_no' => $request->passport_no,
         'name' => $request->name, 
         'dob' => $request->dob,
          'gender' => $request->gender, 
          'first_dose_date' => $request->first_dose_date,
           'first_dose_name' => $request->first_dose_name, 
           'second_dose_date' => $request->second_dose_date, 
           'second_dose_name' => $request->second_dose_name,
        'third_dose_date' => $request->third_dose_date, 
        'third_dose_name' => $request->third_dose_name,
        'fourth_dose_date' => $request->fourth_dose_date,
        'fourth_dose_name' => $request->fourth_dose_name,
        'vaccine_center' => $request->vaccine_center, 
        'other_center' => $request->other_center,
        'first_dose_other_name' => $request->first_dose_other_name,
        'second_dose_other_name' => $request->second_dose_other_name,
        'third_dose_other_name' => $request->third_dose_other_name,
         'fourth_dose_other_name' => $request->fourth_dose_other_name,
        'total'=>$request->total,
        'user_id' =>auth()->user()->id,
        'vaccinated_by' => "Directorate General of Health Services (DGHS)",
         ]);

         return to_route('agent.submissions.index');
    }


    public function show($id)
    {
     
       $submission = SubmisstionResource::collection(Submission::where('id', $id)->get());
       return Inertia::render('agent/show',compact('submission'));
    }


    public function destroy(Submission $submission)
    {
       $submission->delete();
       return Redirect::back();
    }
}
