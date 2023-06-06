{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine PDF</title>
    <style type="text/css">
        body{
            background: #fff;
            margin: 0;
            font-family: 'solaiman_lipi', Arial, sans-serif !important;
        }
        .container{
            height: auto;
            width: 100%;
            border: 1px solid #EBEBEB;

        }
        .headerTable tr, .headerTable tr, .headerTable td{
            border: none;
        }
        .p-1{
            font-size: 15px;
            font-family: 'solaiman_lipi', Arial, sans-serif !important;;
        }
        .p-2{
            font-size: 15px;
            font-family: 'solaiman_lipi', Arial, sans-serif !important;;
        }
        /*qr start*/
        .qr{
            width: 24%;
            margin: 0px auto;
        }
        .qr img{
            display: block;
            width: 100%;
        }
        .text-center{
            text-align: center;
        }
        /*qr end*/
        /*header end*/

        /*main start*/
        /*main title start*/
        .main-title{
            text-align: center;
            border-width:none;
        }
        .main-title h1{
            margin: 10px 0px 10px 0px;
            font-size: 20px;

        }
        /*main title end*/
        /*table start*/
        .InformationTable tr th, .InformationTable tr td{
            border-collapse: collapse;
            border: 1px;
            border-bottom-style: dashed;
            border-top-style: dashed;
            border-color: #e3dcdc;
            padding: {{ $submission->total > 2 ? '6px' : '10px' }};
        }
        .InformationTable{
            font-size: 16px;
        }
        table tr th{
            padding: 10px;
            font-size: 10px;
            background: #EEEEEE;
        }
        /*table end*/
        /*main footer start*/
        .main-footer{
            width: 50%;
            margin: 0px auto;
            text-align: center;
        }
        .main-footer img{
            display: block;
            width: 100%;
        }
        /*main footer end*/
        /*main end*/
    /*    certificate start */
        .certificate{
            margin-top: 15%;
            margin-left: 5%;
            margin-right: 5%;
        }
        .text-end{
            text-align: right;
        }
        .text-start{
            text-align: left;
        }
        .text-center{

            line-height: 1.6;

        }
        .main{
            /*background: url("https://blogger.googleusercontent.com/img/a/AVvXsEjmyUcmqGm9E8Kii0uWo3w3oYCt53FnksUWf2e8yzOT3uAIAiF-FW7W3NbIyf0PXaRJayt3be5I8tMuiHbIJqw0Mu9_l9cV0d5ll3QA2Mv-4qsAPrbCPnjtT0WRNrtwtqgcsq0ti7JnoIPoUZJP0bF2wz3Hu9kC48sHE3WIV38r3FblL3UTnrIMMWA6Fw=w640-h466");*/
            background-repeat: no-repeat;
            background: url({{public_path().'/image/bg.png'}});
                @if($submission->total > 2)
            background-size: 85% 43%; /* width height */
            background-position: 85% 48%; /* hor, ver */
            @else
            background-size: 85% 40%; /* width height */
            background-position: 85% 58%; /* hor, ver */
            @endif
       }

    </style>
</head>
<body>
    <div class="main">
<div class="container">
    <header>

        <table width="100%" cellspacing="0" class="headerTable">
            <tr>
                <td style="text-align: right;width: 20%;">
                        <img src="{{public_path().'/image/bd_logo.png'}}" style="height: 70px; width: 70px;"/>
                </td>
                <td style="text-align: center;width: 60%;">
                    <p class="p-1">Government of the People's Republic of Bangladesh</p>
                    <p class="p-2">Ministry of Health and Family Welfare</p>
                </td>
                <td style="text-align: left;width: 20%;">
                  <img src="{{public_path().'/image/Mujib_100_Logo.png'}}" style="height: 90px; width: 85px;float: left;"/> 
                </td>
            </tr>
        </table>
        <div class="qr">
            <img src="{{storage_path('app/public').$submission->qr_code}}" alt=".." title=".."/>
        </div>
    </header>
    <main>
        <div class="main-title">
            <hr style="height:0.5px; width:100%; border-width:0;color:#E9E9E9; background-color:#E9E9E9">
            <p style="margin-top: -8px;margin-bottom: 2px; font-size: 16px;font-weight: normal"> COVID-19 Vaccination Certificate <br>
               <span style="font-weight: normal;font-size: 13px;"> (কোভিড-১৯ ভ্যাকসিন গ্রহণের সার্টিফিকেট)</span>
            </p>
        </div>
        <table width="100%" cellspacing="0" class="InformationTable">
            <tr>
                <th colspan="2" class="text-start" width="50%" style="font-size: 16px;text-align: left;border-right: none;border-color: #e3dcdc;border-width:1px;">Beneficiary Details (টিকা গ্রহণকারীর বিবরণ)</th>
                <th colspan="2" class="text-end" width="50%" style="font-size: 16px;text-align: left;font-weight: normal;border-width:1px"><b>Vaccination Details (টিকা প্রদানের বিবরণ) </b></th>
            </tr>

            <tr>
                <td width="25%" class="text-end"  style="border-right: dashed;font-size: 15px;border-color: #e3dcdc;border-width:1px;">Certificate No: <br> সার্টিফিকেট নং-</td>
                <td width="25%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">BD1{{$submission->certificate_no}}</td>
                
                <td width="25%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Date of Vaccination (Dose 1): <br>
                টিকা প্রদানের তারিখ (ডোজ ১):
                </td>
                <td width="25%"> {{!empty($submission->first_dose_date) ? $submission->first_dose_date : "N/A"}}</td>
            </tr>

            <tr>
                
                <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Passport No:<br> পার্সপোর্ট নং-</td>
                <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">  {{!empty($submission->passport_no) ? $submission->passport_no : "N/A"}} </td>
                
                <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Name of Vaccine (Dose 1): <br>টিকার নাম (ডোজ ১):</td>
                <td width="30%"> {{!empty($submission->first_dose_name) ? $submission->first_dose_name : "N/A"}}</td>
            </tr>

            <tr>
                
                
                <td width="15%" class="text-end" style="border-right: dashed;font-size: 15px;border-color: #e3dcdc;border-width:1px;">
                {{!empty($submission->national_id) ? "NID Number:  জাতীয় পরিচয়পত্র নং -" : "Birth Reg. Cert. No: জন্ম নিবন্ধন সনদপত্র নম্বর-"}}
                    </td>
                    
                <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">{{!empty($submission->national_id) ? $submission->national_id : $submission->birth_certificate}}</td>
                <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Date of Vaccination (Dose 2): <br>টিকা প্রদানের তারিখ (ডোজ ২): </td>
                <td width="30%">{{!empty($submission->second_dose_date) ? $submission->second_dose_date: "N/A"}}</td>
            </tr>

            <tr>
                <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Country/Nationality:<br> দেশ/জাতীয়তাঃ</td>
                <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;"> {{$submission->nationality}}</td>
                <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Name of Vaccine (Dose 2):<br>টিকার নাম (ডোজ ২):</td>
                <td width="30%"> {{!empty($submission->second_dose_name) ? $submission->second_dose_name : "N/A"}}</td>
            </tr>

          

            <tr>
                <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Name: <br> নামঃ</td>
                <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">  {{$submission->name}}</td>
                <td width="35%" class="text-end" rowspan="2" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Vaccination Center: <br>টিকা প্রদানের কেন্দ্রঃ</td>
                <td width="30%" rowspan="2"> {{!empty($submission->vaccine_center) ? $submission->vaccine_center : "N/A"}}</td>
            </tr>

            <tr>
                <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Date of Birth: <br> জন্ম তারিখঃ</td>
                <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;"> {{$submission->dob}}</td>
            </tr>

            <tr>
                <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Gender: <br> লিঙ্গঃ</td>
                <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">{{ucfirst($submission->gender)}}</td>
                <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Vaccinated By: <br>টিকা প্রদানকারীঃ </td>
                <td width="30%"> {{!empty($submission->vaccinated_by) ? $submission->vaccinated_by : "N/A"}}</td>
            </tr>
            @if($submission->total > 2)
            <tr>
                <td width="100%" class="text-center" colspan="4" style="text-align: center;border-bottom: 1px solid #e3dcdc;border-width:1px">


                    <table cellspacing="3" style="margin: auto;font-size: 14px;border: 1px solid #e3dcdc;">
                        <tr>
                            <td colspan="3" style="text-align: center;padding: 4px;border: 1px dashed #e3dcdc;"><b>Other Doses(অন্যান্য ডোজসমূহ):</b></td>
                        </tr>
                        <tr style="font-size: 13px;">
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;"><b>Dose:</b></td>
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;"><b>Vaccine Name(টিকার নাম):</b></td>
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;"><b>Date(তারিখ):</b></td>
                        </tr>
                        @if($submission->third_dose_date !== null)
                        <tr style="font-size: 13px;">
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;">Dose-3</td>
                            <td style="text-align: left; padding: 4px;border: 1px dashed #e3dcdc;">
                             
                                         {{$submission->third_dose_name}}
                                  
                                </td>
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;">{{ $submission->third_dose_date }}</td>
                        </tr>
                        @endif
                        @if($submission->fourth_dose_date !== null)
                        <tr  style="font-size: 13px;">
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;">Dose-4</td>
                            <td style="text-align: left; padding: 4px;border: 1px dashed #e3dcdc;">
                            
                                {{$submission->fourth_dose_name}}
                                  
                                </td>
                            <td style="padding: 4px;border: 1px dashed #e3dcdc;">{{ $submission->fourth_dose_date }}</td>
                        </tr>
                        @endif
                    </table>


                </td>
            </tr>
            @endif

            <tr>
                <td width="100%" class="text-center" colspan="4" style="border-bottom: 1px solid #e3dcdc;border-width:1px">
                    To verify this certificate please visit www.surokkha.gov.bd/verify or scan the QR code. <br>
                    (এই সার্টিফিকেটটি যাচাই করার জন্য www.surokkha.gov.bd/verify ভিজিট অথবা QR কোডটি স্ক্যান করুন )
                </td>
            </tr>

            <tr>
                <td width="100%" class="text-center" colspan="4" style="border-bottom-style: solid;border-top: none">
                    For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd <br>
                    (প্রয়োজনে www.dghs.gov.bd ওয়েবসাইটে ভিজিট করুন অথবা ইমেইল করুনঃ info@dghs.gov.bd)
                </td>
            </tr>

            <tr>
                <th colspan="4" class="text-center" width="100%" style="border-bottom: none;border-top: none">In cooperation with</th>
            </tr>
        </table>
        <div class="main-footer">
            <img src="{{public_path().'/image/footer.png'}}" alt="" title="">
        </div>
    </main>
</div>
</div>
<div class="">
    <div class="certificate">
        <table width="100%" style="border: 1px solid green;">
            <tr>
                <td style="border-right: 1px solid green;width: 48%">
                    <table width="100%" style="padding: 1px; border: none" class="certificateInnerTable">
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <img src="{{public_path().'/image/bd_logo.png'}}" style="height: 60px; width: 60px"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; font-size: 13px;">
                                Government of the People's Republic of Bangladesh <br>
                                Ministry of Health and Family Welfare
                            </td>
                        </tr>
                        <tr style="background: green;">
                            <td colspan="2" style="color: white; font-size: 20px; text-align: center">
                                <span><b>COVID-19</b>
                                    <br>
                                    Vaccination Certificate
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                Certificate No: BD1{{$submission->certificate_no}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                              <img src="{{storage_path('app/public').$submission->qr_code}}" style="height: 100px; width: 80px"/> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;font-weight: bold;font-size: 17px;color: black; text-transform: uppercase;">
                                {{$submission->name}}
                            </td>
                        </tr>
                        
                       
                        
                        <tr style="background: green;color: white">
                            
                            <td style="text-align: right;color: white">
                                 {{-- {{empty($submission->national_id) ? "Birth Reg. Cert. No" :"NID No"}} --}}
                              {{--   @if($submission->national_id !==null)  NID No  @else Birth Reg. Cert. No @endif
                            </td>
                            <td style="text-align: left;color: white">
                                {{-- {{!empty($submission->national_id) ? $submission->national_id : $submission->birth_certificate}} --}}
                              {{--   @if($submission->national_id !==null){{ $submission->national_id }} @else {{$submission->birth_certificate}} @endif
                            </td>
                            
                            
                        </tr>
                         <tr style="background: green;color: white">
                             
                             
                            <td style="text-align: right;color: white">
                                Passport No
                            </td>
                            
                            <td style="text-align: left;color: white">
                                {{!empty($submission->passport_no) ? $submission->passport_no : "N/A"}}
                            </td>
                            
                            
                        </tr>
                        
                        
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Nationality
                            </td>
                            <td style="text-align: left;color: white">{{$submission->nationality}}</td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">Vaccine Name</td>
                            <td style="text-align: left;color: white">
                                @if(!empty($submission->first_dose_name))   {{'Pfizer (Pfizer-BioNTech)'}} @endif
                                @if(!empty($submission->second_dose_name	))   {{$submission->second_dose_name	}} @endif
                                @if(!empty($submission->third_dose_name))   {{$submission->third_dose_name}} @endif
                                @if(!empty($submission->fourth_dose_name))   {{$submission->fourth_dose_name}} @endif
                            </td>
                        </tr>
                        <tr style="background: green;color: white">
                            <td style="text-align: right;color: white">
                                Total Doses
                            </td>
                            <td style="text-align: left;color: white">{{$submission->total}}</td>
                        </tr>
                    </table>
                </td>
                <td width="3%"></td>
                <td style="border-left: 1px solid green;width: 49%">
                    <table width="100%" style="padding: 1px; border: none" class="certificateInnerTable">
                        <tr>
                            <td colspan="2" style="height: 70px"></td>
                        </tr>
                        <tr style="border: 5px solid greenyellow;">
                            <td colspan="2">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">

                        </tr>
                        <tr style="border-top: 1px solid green;">
                            <td colspan="2" style="text-align: center; font-size: 18px;">
                               To Verify this certificate please <br>
                                visit <b>www.surokkha.gov.bd/verify</b> <br>
                                <span style="font-size: 12px">Or</span> <br>
                                <b>Scan the QR code.</b>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;font-size: 18px">
                                For any further assistance, please <br>
                                visit www.dghs.gov.bd or<br>
                                email: info@dghs.gov.bd
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">
                            <td colspan="2">
                                <hr style="width: 100%; color: green;">
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid red;">
                            <td colspan="2" style="text-align: center">
                                <img src="{{public_path().'/image/certificate_footer.PNG'}}" style="height: 50px; width: 150px;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 30px"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html> 
 

 --}}


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Vaccine PDF</title>
     <style type="text/css">
         body{
             background: #fff;
             margin: 0;
             font-family: 'solaiman_lipi', Arial, sans-serif !important;
         }
         .container{
             height: auto;
             width: 100%;
             border: 1px solid #EBEBEB;
 
         }
         .headerTable tr, .headerTable tr, .headerTable td{
             border: none;
         }
         .p-1{
             font-size: 15px;
             font-family: 'solaiman_lipi', Arial, sans-serif !important;;
         }
         .p-2{
             font-size: 15px;
             font-family: 'solaiman_lipi', Arial, sans-serif !important;;
         }
         /*qr start*/
         .qr{
             width: 24%;
             margin: 0px auto;
         }
         .qr img{
             display: block;
             width: 100%;
         }
         .text-center{
             text-align: center;
         }
         /*qr end*/
         /*header end*/
 
         /*main start*/
         /*main title start*/
         .main-title{
             text-align: center;
             border-width:none;
         }
         .main-title h1{
             margin: 10px 0px 10px 0px;
             font-size: 20px;
 
         }
         /*main title end*/
         /*table start*/
         .InformationTable tr th, .InformationTable tr td{
             border-collapse: collapse;
             border: 1px;
             border-bottom-style: dashed;
             border-top-style: dashed;
             border-color: #e3dcdc;
             padding: {{ $submission->total > 2 ? '6px' : '10px' }};
         }
         .InformationTable{
             font-size: 16px;
         }
         table tr th{
             padding: 10px;
             font-size: 10px;
             background: #EEEEEE;
         }
         /*table end*/
         /*main footer start*/
         .main-footer{
             width: 50%;
             margin: 0px auto;
             text-align: center;
         }
         .main-footer img{
             display: block;
             width: 100%;
         }
         /*main footer end*/
         /*main end*/
     /*    certificate start */
         .certificate{
             margin-top: 1px;
             margin-left: 1px;
             margin-right: 1px;
            
         }
         .text-end{
             text-align: right;
         }
         .text-start{
             text-align: left;
         }
         .text-center{
 
             line-height: 1.5;
 
         }
         .main{
             /*background: url("https://blogger.googleusercontent.com/img/a/AVvXsEjmyUcmqGm9E8Kii0uWo3w3oYCt53FnksUWf2e8yzOT3uAIAiF-FW7W3NbIyf0PXaRJayt3be5I8tMuiHbIJqw0Mu9_l9cV0d5ll3QA2Mv-4qsAPrbCPnjtT0WRNrtwtqgcsq0ti7JnoIPoUZJP0bF2wz3Hu9kC48sHE3WIV38r3FblL3UTnrIMMWA6Fw=w640-h466");*/
             background-repeat: no-repeat;
             background: url({{public_path().'/image/bg.png'}});
                 @if($submission->total > 2)
             background-size: 85% 43%; /* width height */
             background-position: 85% 48%; /* hor, ver */
             @else
             background-size: 85% 40%; /* width height */
             background-position: 85% 58%; /* hor, ver */
             @endif
        }
 
     </style>
 </head>
 <body>
     <div class="main">
 <div class="container">
     <header>
 
         <table width="100%" cellspacing="0" class="headerTable">
             <tr>
                 <td style="text-align: right;width: 20%;">
                         <img src="{{public_path().'/image/bd_logo.png'}}" style="height: 70px; width: 70px;"/>
                 </td>
                 <td style="text-align: center;width: 60%;">
                     <p class="p-1">Government of the People's Republic of Bangladesh</p>
                     <p class="p-2">Ministry of Health and Family Welfare</p>
                 </td>
                 <td style="text-align: left;width: 20%;">
                   <img src="{{public_path().'/image/Mujib_100_Logo.png'}}" style="height: 90px; width: 85px;float: left;"/> 
                 </td>
             </tr>
         </table>
         <div class="qr">
             <img src="{{storage_path('app/public').$submission->qr_code}}" alt=".." title=".."/>
         </div>
     </header>
     <main>
         <div class="main-title">
             <hr style="height:0.5px; width:100%; border-width:0;color:#E9E9E9; background-color:#E9E9E9">
             <p style="margin-top: -8px;margin-bottom: 2px; font-size: 16px;font-weight: normal"> COVID-19 Vaccination Certificate <br>
                <span style="font-weight: normal;font-size: 13px;"> (কোভিড-১৯ ভ্যাকসিন গ্রহণের সার্টিফিকেট)</span>
             </p>
         </div>
         <table width="100%" cellspacing="0" class="InformationTable">
             <tr>
                 <th colspan="2" class="text-start" width="50%" style="font-size: 16px;text-align: left;border-right: none;border-color: #e3dcdc;border-width:1px;">Beneficiary Details (টিকা গ্রহণকারীর বিবরণ)</th>
                 <th colspan="2" class="text-end" width="50%" style="font-size: 16px;text-align: left;font-weight: normal;border-width:1px"><b>Vaccination Details (টিকা প্রদানের বিবরণ) </b></th>
             </tr>
 
             <tr>
                 <td width="25%" class="text-end"  style="border-right: dashed;font-size: 15px;border-color: #e3dcdc;border-width:1px;">Certificate No: <br> সার্টিফিকেট নং-</td>
                 <td width="25%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">BD1{{$submission->certificate_no}}</td>
                 
                 <td width="25%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Date of Vaccination (Dose 1): <br>
                 টিকা প্রদানের তারিখ (ডোজ ১):
                 </td>
                 <td width="25%"> {{!empty($submission->first_dose_date) ? $submission->first_dose_date : "N/A"}}</td>
             </tr>
 
             <tr>
                 
 
 
                 <td width="15%" class="text-end" style="border-right: dashed;font-size: 15px;border-color: #e3dcdc;border-width:1px;">
                     {{!empty($submission->national_id) ? "NID Number:  জাতীয় পরিচয়পত্র নং -" : "Birth Reg. Cert. No: জন্ম নিবন্ধন সনদপত্র নম্বর-"}}
                         </td>
                         
                     <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">{{!empty($submission->national_id) ? $submission->national_id : $submission->birth_certificate}}</td>
 
 
                 
                 <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Name of Vaccine (Dose 1): <br>টিকার নাম (ডোজ ১):</td>
                 <td width="30%"> {{!empty($submission->first_dose_name) ? $submission->first_dose_name : "N/A"}}</td>
             </tr>
 
             <tr>
                 
                 <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Passport No:<br> পার্সপোর্ট নং-</td>
                 <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">  {{!empty($submission->passport_no) ? $submission->passport_no : "N/A"}} </td>
               
                 <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Date of Vaccination (Dose 2): <br>টিকা প্রদানের তারিখ (ডোজ ২): </td>
                 <td width="30%">{{!empty($submission->second_dose_date) ? $submission->second_dose_date: "N/A"}}</td>
             </tr>
 
             <tr>
                 <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Country/Nationality:<br> দেশ/জাতীয়তাঃ</td>
                 <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;"> {{$submission->nationality}}</td>
                 <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Name of Vaccine (Dose 2):<br>টিকার নাম (ডোজ ২):</td>
                 <td width="30%"> {{!empty($submission->second_dose_name) ? $submission->second_dose_name : "N/A"}}</td>
             </tr>
 
           
 
             <tr>
                 <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Name: <br> নামঃ</td>
                 <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">  {{$submission->name}}</td>
                 <td width="35%" class="text-end" rowspan="2" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Vaccination Center: <br>টিকা প্রদানের কেন্দ্রঃ</td>
                 <td width="30%" rowspan="2">@if($submission->vaccine_center == 'other') {{$submission->other_center}}  @else {{!empty($submission->vaccine_center) ? $submission->vaccine_center : "N/A"}} @endif</td>
             </tr>
 
             <tr>
                 <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Date of Birth: <br> জন্ম তারিখঃ</td>
                 <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;"> {{$submission->dob}}</td>
             </tr>
 
             <tr>
                 <td width="15%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Gender: <br> লিঙ্গঃ</td>
                 <td width="20%" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">{{ucfirst($submission->gender)}}</td>
                 <td width="35%" class="text-end" style="border-right: dashed;border-color: #e3dcdc;border-width:1px;">Vaccinated By: <br>টিকা প্রদানকারীঃ </td>
                 <td width="30%"> {{!empty($submission->vaccinated_by) ? $submission->vaccinated_by : "N/A"}}</td>
             </tr>
             @if($submission->total > 2)
             <tr>
                 <td width="100%" class="text-center" colspan="4" style="text-align: center;border-bottom: 1px solid #e3dcdc;border-width:1px">
 
 
                     <table cellspacing="3" style="margin: auto;font-size: 14px;border: 1px solid #e3dcdc;">
                         <tr>
                             <td colspan="3" style="text-align: center;padding: 4px;border: 1px dashed #e3dcdc;"><b>Other Doses(অন্যান্য ডোজসমূহ):</b></td>
                         </tr>
                         <tr style="font-size: 13px;">
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;"><b>Dose:</b></td>
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;"><b>Vaccine Name(টিকার নাম):</b></td>
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;"><b>Date(তারিখ):</b></td>
                         </tr>
                         @if($submission->third_dose_date !== null)
                         <tr style="font-size: 13px;">
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;">Dose-3</td>
                             <td style="text-align: left; padding: 4px;border: 1px dashed #e3dcdc;">
                              
                                 @if($submission->third_dose_name== 'Pfizer (Pfizer-BioNTech)')
                                 {{'Pfizer'}}
                           @elseif($submission->third_dose_name== 'Moderna (Moderna)')
                                   {{'Moderna'}}
                           @elseif($submission->third_dose_name== 'Vero Cell (Sinopharm)')
                                    {{'Vero Cell' }}
                            @elseif($submission->third_dose_name== 'AstraZeneca (AstraZeneca)')
                                    {{'AstraZeneca'  }}
                            @elseif($submission->third_dose_name== 'SINOVAC (SINOVAC)')
                                    {{'SINOVAC'  }}
                            @elseif($submission->third_dose_name== 'COVISHIELD (Astrazeneca)')
                                    {{'COVISHIELD'  }}
                            @elseif($submission->third_dose_name== 'Cominry (Cominry)')
                                    {{'Cominry'}}
                           @else {{$submission->third_dose_name}}
                           @endif
                                   
                                 </td>
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;">{{ $submission->third_dose_date }}</td>
                         </tr>
                         @endif
                         @if($submission->fourth_dose_date !== null)
                         <tr  style="font-size: 13px;">
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;">Dose-4</td>
                             <td style="text-align: left; padding: 4px;border: 1px dashed #e3dcdc;">
                                 
                                 @if($submission->fourth_dose_name== 'Pfizer (Pfizer-BioNTech)')
                                       {{'Pfizer'}}
                                 @elseif($submission->fourth_dose_name== 'Moderna (Moderna)')
                                         {{'Moderna'}}
                                 @elseif($submission->fourth_dose_name== 'Vero Cell (Sinopharm)')
                                          {{'Vero Cell' }}
                                  @elseif($submission->fourth_dose_name== 'AstraZeneca (AstraZeneca)')
                                          {{'AstraZeneca'  }}
                                  @elseif($submission->fourth_dose_name== 'SINOVAC (SINOVAC)')
                                          {{'SINOVAC'  }}
                                  @elseif($submission->fourth_dose_name== 'COVISHIELD (Astrazeneca)')
                                          {{'COVISHIELD'  }}
                                  @elseif($submission->fourth_dose_name== 'Cominry (Cominry)')
                                          {{'Cominry'}}
                                 @else {{$submission->fourth_dose_name}}
                                 @endif
                                 </td>
                             <td style="padding: 4px;border: 1px dashed #e3dcdc;">{{ $submission->fourth_dose_date }}</td>
                         </tr>
                         @endif
                     </table>
 
 
                 </td>
             </tr>
             @endif
 
             <tr>
                 <td width="100%" class="text-center" colspan="4" style="border-bottom: 1px solid #e3dcdc;border-width:1px">
                     To verify this certificate please visit www.surokkha.gov.bd/verify or scan the QR code. <br>
                     (এই সার্টিফিকেটটি যাচাই করার জন্য www.surokkha.gov.bd/verify ভিজিট অথবা QR কোডটি স্ক্যান করুন )
                 </td>
             </tr>
 
             <tr>
                 <td width="100%" class="text-center" colspan="4" style="border-bottom-style: solid;border-top: none">
                     For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd <br>
                     (প্রয়োজনে www.dghs.gov.bd ওয়েবসাইটে ভিজিট করুন অথবা ইমেইল করুনঃ info@dghs.gov.bd)
                 </td>
             </tr>
 
             <tr>
                 <th colspan="4" class="text-center" width="100%" style="border-bottom: none;border-top: none">In cooperation with</th>
             </tr>
         </table>
         <div class="main-footer">
             <img src="{{public_path().'/image/footer.png'}}" alt="" title="">
         </div>
     </main>
 </div>
 </div>
 <div class="">
     <div class="certificate">
         <table  width="70%" style="border: 1px solid green; margin:auto;">
             <tr style="padding:0 !important;">
                 <td style="border-right: 1px solid green;width: 48%; ">
                     <table width="100%"  style="padding: 1px; border: none" class="certificateInnerTable">
                         <tr>
                             <td colspan="2" style="text-align: center">
                                 <img src="{{public_path().'/image/bd_logo.png'}}" style="height: 40px; width: 40px"/>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" style="text-align: center; font-size: 12px;">
                                 Government of the People's Republic of Bangladesh <br>
                                 Ministry of Health and Family Welfare
                             </td>
                         </tr>
                         <tr style="background: green;">
                             <td colspan="2" style="color: white; font-size: 15px; text-align: center">
                                 <span><b>COVID-19</b>
                                     <br>
                                     Vaccination Certificate
                                 </span>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" style="text-align: center; font-size: 12px;">
                                 Certificate No: BD1{{$submission->certificate_no}}
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" style="text-align: center">
                               <img src="{{storage_path('app/public').$submission->qr_code}}" style=" height:60px; width:55px;"/> 
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" style="text-align: center;font-weight: bold; font-size: 14px; color: black; text-transform:capitalize;">
                                 {{$submission->name}}
                             </td>
                         </tr>
                         
                        
                         
                         <tr style="background: green;color: white; ">
                             
                             <td style="text-align: right;color: white; font-size: 11px;" >
                                  {{-- {{empty($submission->national_id) ? "Birth Reg. Cert. No" :"NID No"}} --}}
                                  @if($submission->national_id !==null)  NID No  @else Birth Reg. Cert. No @endif
                             </td>
                             <td style="text-align: left;color: white; font-size: 11px;">
                                 {{-- {{!empty($submission->national_id) ? $submission->national_id : $submission->birth_certificate}} --}}
                                 @if($submission->national_id !==null){{ $submission->national_id }} @else {{$submission->birth_certificate}} @endif
                             </td>
                             
                             
                         </tr>
                          <tr style="background: green;color: white; font-size: 11px;">
                              
                              
                             <td style="text-align: right;color: white; font-size: 11px;">
                                 Passport No
                             </td>
                             
                             <td style="text-align: left;color: white; font-size: 11px;">
                                 {{!empty($submission->passport_no) ? $submission->passport_no : "N/A"}}
                             </td>
                             
                             
                         </tr>
                         
                         
                         <tr style="background: green;color: white; font-size: 11px;">
                             <td style="text-align: right;color: white; font-size: 11px;">
                                 Nationality
                             </td>
                             <td style="text-align: left;color: white; font-size: 11px;">{{$submission->nationality}}</td>
                         </tr>
                         <tr style="background: green;color: white; font-size: 11px;">
                             <td style="text-align: right;color: white; font-size: 11px;">Vaccine Name</td>
                             <td style="text-align: left;color: white; font-size: 11px;">
                                 @if(!empty($submission->first_dose_name))   {{$submission->first_dose_name}} @endif
                                 <!--@if(!empty($submission->second_dose_name	))   {{$submission->second_dose_name	}} @endif-->
                                 <!--@if(!empty($submission->third_dose_name))   {{$submission->third_dose_name}} @endif-->
                                 <!--@if(!empty($submission->fourth_dose_name))   {{$submission->fourth_dose_name}} @endif-->
                             </td>
                         </tr>
                         <tr style="background: green;color: white">
                             <td style="text-align: right;color: white; font-size: 11px;">
                                 Total Doses
                             </td>
                             <td style="text-align: left;color: white; font-size: 11px;">{{$submission->total}}</td>
                         </tr>
                     </table>
                 </td>
                 <td width="3%"></td>
                 <td style="padding:0 !important; border-left: 1px solid green;width: 49%; ">
                     <table width="100%" style="padding:0 !important; border: none" class="certificateInnerTable">
                         <tr>
                             <td colspan="2" style=""></td>
                         </tr>
                         <tr style="border: 5px solid greenyellow;">
                             <td colspan="2">
                                 <hr style="width: 100%; color: green;">
                             </td>
                         </tr>
                         <tr style="border-bottom: 2px solid red;">
 
                         </tr>
                         <tr style="border-top: 1px solid green;">
                             <td colspan="2" style="text-align: center; font-size: 15px;">
                                To Verify this certificate please <br>
                                 visit <b>www.surokkha.gov.bd/verify</b> <br>
                                 <span style="font-size: 12px">Or</span> <br>
                                 <b>Scan the QR code.</b>
                             </td>
                         </tr>
 
                         <tr>
                             <td colspan="2" style="text-align: center">
                                 <hr style="width: 100%; color: green;">
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" style="text-align: center;font-size: 15px">
                                 For any further assistance, please <br>
                                 visit www.dghs.gov.bd or<br>
                                 email: info@dghs.gov.bd
                             </td>
                         </tr>
                         <tr style="border-bottom: 2px solid red;">
                             <td colspan="2">
                                 <hr style="width: 100%; color: green;">
                             </td>
                         </tr>
                         <tr style="border-bottom: 2px solid red;">
                             <td colspan="2" style="text-align: center">
                                 <img src="{{public_path().'/image/certificate_footer.PNG'}}" style="height: 50px; width: 150px;" alt="">
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" ></td>
                         </tr>
                     </table> 
                 </td>
             </tr>
         </table>
     </div>
 </div>
 
 </body>
 </html> 
  







 