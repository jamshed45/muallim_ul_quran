<?php

namespace App\Http\Controllers\ApiController\MergeApiGhlToCore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GetContactModel;
use App\Models\Api\GetTokenMod;
use App\Models\Api\GetPatientModel;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PatientGhlToCore extends Controller
{
    public function  PatientGhlToCor()
    {

        $ghldata = GetContactModel::select('contactId','firstName','lastName','phone','email','dateOfBirth','address1','created_at')->where('created_at','>=', Carbon::now()->subDays(30)->toDateTimeString())->get();



        $tokekn = GetTokenMod::get()->first();
        $accesstoken = $tokekn->access_token;
        $url = $tokekn->liveurl;
        $urlold = config('app.urlc');
        $status = $tokekn->livestatus;




       if($status == 0)
       {
        $corepatient = GetPatientModel::get();

        if(!Empty($ghldata))
        {

         foreach($ghldata as $alldata)
        {

                   $checkemailincore = DB::table('patients_get')->where('email','=',$alldata->email)->count();

                   $checkappointmentcount = DB::table('gohighlevel_appointments')->where('contactId','=',$alldata->contactId)->count();


                    if( $checkemailincore == 0 && $checkappointmentcount > 0 )
                    {


                            $contactId = $alldata->contactId;
                            $firstName = $alldata->firstName;
                            $lastName = $alldata->lastName;



                            if (str_contains( $alldata->phone, '+61')) {
                             $phone =  substr($alldata->phone, 3);
                             $phone = '0'.$phone;
                            }
                            else{
                              $phone =  $alldata->phone;
                            }
                            $email = $alldata->email;
                            $dateOfCirth = $alldata->dateOfBirth;
                            $address = $alldata->address1;


                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                            CURLOPT_URL => "$url/patients",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS =>'{
                                "Firstname": "'.$firstName.'",
                                "Lastname": "'.$lastName.'",
                                "Email": "'.$email.'",
                                "HomePhone": "'.$phone.'",
                                "Mobile": "'.$phone.'",
                                "Dob": "'.$dateOfCirth.'",
                                "Tittle": "null",
                                "WorkPhone": null,
                                "Fax": null,
                                "Occupation": null,
                                "CompanyName": null,
                                "JoinDate": null,
                                "Description": null,
                                "AddressLine1": "'.$address.'",
                                "AddressLine1Ext": null,
                                "AddressLine2Ext": null,
                                "SuburbExt": null,
                                "PostcodeExt": null,
                                "StateExt": null,
                                "ContactName": null,
                                "ContactPhone": null,
                                "ContactMobile": null,
                                "ContactRelationship": null
                            }',
                            CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json',
                                "Authorization: Bearer $accesstoken",
                                'x-cpapi-version: v2'
                            ),
                            ));

                            // $response = curl_exec($curl);

                            curl_close($curl);
                            $data = json_decode($response,true);
        if(!isset($data['Message']))
        {

                                  $Messages = [];
                                  $Identifier = $data['Identifier'];
                                  $PatientNo = $data['PatientNo'];
                                  $Firstname = $data['Firstname'];
                                  $Lastname = $data['Lastname'];
                                  $Middlename = $data['Middlename'];
                                  $PreferredName = $data['PreferredName'];
                                  $DateOfBirth = $data['DateOfBirth'];
                                  $Title = $data['Title'];
                                  $Sex = $data['Sex'];
                                  $Email = $data['Email'];
                                  $HomePhone = $data['HomePhone'];
                                  $Mobile = $data['Mobile'];
                                  $WorkPhone = $data['WorkPhone'];
                                  $Fax = $data['Fax'];
                                  $Occupation = $data['Occupation'];
                                  $CompanyName = $data['CompanyName'];
                                  $JoinDate = $data['JoinDate'];
                                  $Description = $data['Description'];
                                  $MedicareNo = $data['MedicareNo'];
                                  $AddressLine1 = $data['AddressLine1'];
                                  $AddressLine2 = $data['AddressLine2'];
                                  $Suburb = $data['Suburb'];
                                  $Postcode = $data['Postcode'];
                                  $State = $data['State'];
                                  $AddressLine1Ext = $data['AddressLine1Ext'];
                                  $AddressLine2Ext = $data['AddressLine2Ext'];
                                  $SuburbExt = $data['SuburbExt'];
                                  $PostcodeExt = $data['PostcodeExt'];
                                  $StateExt = $data['StateExt'];
                                  $ContactName = $data['ContactName'];
                                  $ContactPhone = $data['ContactPhone'];
                                  $ContactMobile = $data['ContactMobile'];
                                  $ContactRelationship = $data['ContactRelationship'];
                                  $Messages = $data['Messages'];
                                  $PatientLogin = $data['PatientLogin'];
                                  $FamilyRole = $data['FamilyRole'];
                                  $ReferralNotes = $data['ReferralNotes'];
                                  $ReceiveMarketing = $data['ReceiveMarketing'];
                                  $ReceiveRecall = $data['ReceiveRecall'];
                                  $IsApproved = $data['IsApproved'];
                                  $IsActive = $data['IsActive'];
                                  $IsDeleted = $data['IsDeleted'];
                                  $AllowLogin = $data['AllowLogin'];
                                  $ReferralSource = $data['ReferralSource'];
                                  $FeeLevel = $data['FeeLevel'];
                                  $CurrentHistory = $data['CurrentHistory'];
                                  $DefaultInsurance = $data['DefaultInsurance'];
                                  $ProfileMedia = $data['ProfileMedia'];
                                  $CategoryLabel = $data['CategoryLabel'];
                                  $MedicalFormSubmitDateUtc = $data['MedicalFormSubmitDateUtc'];
                                  $MedicalFormCompleteDateUtc = $data['MedicalFormCompleteDateUtc'];
                                  $MessageResponseDateUtc = $data['MessageResponseDateUtc'];
                                  $MessageReadDateUtc = $data['MessageReadDateUtc'];
                                  $HasNewMessages = $data['HasNewMessages'];
                                  $HasProfileMedia = $data['HasProfileMedia'];
                                  $LastUpdateDate = $data['LastUpdateDate'];
                                  $ProfilePath = $data['ProfilePath'];
                                  $ImageUrl = $data['ImageUrl'];
                                  $ThumbUrl = $data['ThumbUrl'];

                                   $validator = Validator::make($data,[
                                    'Email' => 'required|unique:patients_get,email',

                                 ]);

                                 if ($validator->fails()) {
                                     $errors = $validator->errors();
                                 } else {

                                  $indata = new GetPatientModel();
                                  $indata->contactId =$Identifier;
                                  $indata->PatientNo =$PatientNo;
                                  $indata->firstname =$Firstname;
                                  $indata->lastname =$Lastname;
                                  $indata->Middlename =$Middlename;
                                  $indata->PreferredName =$PreferredName;
                                  $indata->DateOfBirth =$DateOfBirth;
                                  $indata->Title =$Title;
                                  $indata->Sex =$Sex;
                                  $indata->email = $Email;
                                  $indata->HomePhone =$HomePhone;
                                  $indata->phone =$Mobile;
                                  $indata->WorkPhone =$WorkPhone;
                                  $indata->Fax =$Fax;
                                  $indata->Occupation =$Occupation;
                                  $indata->CompanyName =$CompanyName;
                                  $indata->JoinDate =$JoinDate;
                                  $indata->Description =$Description;
                                  $indata->MedicareNo =$MedicareNo;
                                  $indata->address1 =$AddressLine1;
                                  $indata->AddressLine2 =$AddressLine2;
                                  $indata->Suburb =$Suburb;
                                  $indata->Postcode =$Postcode;
                                  $indata->State =$State;
                                  $indata->AddressLine1Ext =$AddressLine1Ext;
                                  $indata->AddressLine2Ext =$AddressLine2Ext;
                                  $indata->SuburbExt =$SuburbExt;
                                  $indata->PostcodeExt =$PostcodeExt;
                                  $indata->StateExt =$StateExt;
                                  $indata->ContactName =$ContactName;
                                  $indata->ContactPhone =$ContactPhone;
                                  $indata->ContactMobile =$ContactMobile;
                                  $indata->ContactRelationship =$ContactRelationship;
                                  $indata->Messages =json_encode($Messages);
                                  $indata->PatientLogin =$PatientLogin;
                                  $indata->FamilyRole =$FamilyRole;
                                  $indata->ReferralNotes =$ReferralNotes;
                                  $indata->ReceiveMarketing =$ReceiveMarketing;
                                  $indata->ReceiveRecall =$ReceiveRecall;
                                  $indata->IsApproved =$IsApproved;
                                  $indata->IsActive =$IsActive;
                                  $indata->IsDeleted =$IsDeleted;
                                  $indata->AllowLogin =$AllowLogin;
                                  $indata->ReferralSource =$ReferralSource;
                                  $indata->FeeLevel =$FeeLevel;
                                  $indata->CurrentHistory =$CurrentHistory;
                                  $indata->DefaultInsurance =$DefaultInsurance;
                                  $indata->ProfileMedia =$ProfileMedia;
                                  $indata->CategoryLabel =$CategoryLabel;
                                  $indata->MedicalFormSubmitDateUtc =$MedicalFormSubmitDateUtc;
                                  $indata->MedicalFormCompleteDateUtc =$MedicalFormCompleteDateUtc;
                                  $indata->MessageResponseDateUtc =$MessageResponseDateUtc;
                                  $indata->MessageReadDateUtc =$MessageReadDateUtc;
                                  $indata->HasNewMessages =$HasNewMessages;


                                  $indata->save();
                                 }
               }
                        }
                 }
            }else{
                return redirect()->back()->with('mesaage', 'Data  Not Found');
            }
     }else{
          echo 'Go Live Api';
       }
    }

}
