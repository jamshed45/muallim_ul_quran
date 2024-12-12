<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\GetPatientModel;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\GetTokenMod;
use DB;

class PatientController extends Controller
{
    public function GetPatient(Request $request)
    {
      $tokekn = GetTokenMod::get()->first();
      $accesstoken = $tokekn->access_token;
      $locationIdCore = $tokekn->locationId;
      $url = $tokekn->liveurl;
      $status = $tokekn->livestatus;

       if($status == 0)
       {
      $urlenv = config('app.urlc');


        $startdate1 = date('Y-m-d\T00:00');
        $startdate = date('Y-m-d\T00:00',strtotime($startdate1. '  -10 day'));
        $enddate = date('Y-m-d\T00:00',strtotime($startdate1. '  +1 day'));



      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "$url/reports/patients/referral?locationId=$locationIdCore&start=$startdate&end=$enddate&labelId=all&page=1&PageSize=100",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          "Authorization: Bearer $accesstoken",
          'x-cpapi-version: v2'
      ),
      ));

      // $response = curl_exec($curl);
      curl_close($curl);
      $alldatareport = json_decode($response,true);



   if($alldatareport){
       foreach($alldatareport['Data'] as $datareport)
        {

            $patientNoArray =array();
            $cardno = $datareport['Rows'][2]['Value'];

           $patientNoArray['Value'] = $cardno;

            $validator = Validator::make($patientNoArray,[
            'Value' => 'required|unique:patients_get,PatientNo',

         ]);

         if ($validator->fails()) {
             $errors = $validator->errors();
         } else{

                     $curl2 = curl_init();

                      curl_setopt_array($curl2, array(
                      CURLOPT_URL => "$url/patients/search?cardno=$cardno",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'GET',
                      CURLOPT_HTTPHEADER => array(
                          'Content-Type: application/json',
                          "Authorization: Bearer $accesstoken",
                          'x-cpapi-version: v2'
                      ),
                      ));

                      $responseall = curl_exec($curl2);

                      curl_close($curl2);
                     $alldata = json_decode($responseall,true);


    if(!isset($alldata['Message']))
      {
        foreach($alldata as $data)
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



   $updateContact = DB::table('patients_get')
            ->where('email','=',$Email)
            ->update([
              'contactId' => $Identifier,
              'PatientNo' => $PatientNo,
              'firstname' => $Firstname,
              'lastname' => $Lastname,
              'Middlename' => $Middlename,
              'PreferredName' => $PreferredName,
              'DateOfBirth' => $DateOfBirth,
              'Title' => $Title,
              'Sex' => $Sex,
              'email' =>  $Email,
              'HomePhone' => $HomePhone,
              'phone' => $Mobile,
              'WorkPhone' => $WorkPhone,
              'Fax' => $Fax,
              'Occupation' => $Occupation,
              'CompanyName' => $CompanyName,
              'JoinDate' => $JoinDate,
              'Description' => $Description,
              'MedicareNo' => $MedicareNo,
              'address1' => $AddressLine1,
              'AddressLine2' => $AddressLine2,
              'Suburb' => $Suburb,
              'Postcode' => $Postcode,
              'State' => $State,
              'AddressLine1Ext' => $AddressLine1Ext,
              'AddressLine2Ext' => $AddressLine2Ext,
              'SuburbExt' => $SuburbExt,
              'PostcodeExt' => $PostcodeExt,
              'StateExt' => $StateExt,
              'ContactName' => $ContactName,
              'ContactPhone' => $ContactPhone,
              'ContactMobile' => $ContactMobile,
              'ContactRelationship' => $ContactRelationship,
              'Messages' =>  json_encode($Messages),
              'PatientLogin' => $PatientLogin,
              'FamilyRole' => $FamilyRole,
              'ReferralNotes' => $ReferralNotes,
              'ReceiveMarketing' => $ReceiveMarketing,
              'ReceiveRecall' => $ReceiveRecall,
              'IsApproved' => $IsApproved,
              'IsActive' => $IsActive,
              'IsDeleted' => $IsDeleted,
              'AllowLogin' => $AllowLogin,
              'ReferralSource' => $ReferralSource,
              'FeeLevel' => $FeeLevel,
              'CurrentHistory' => $CurrentHistory,
              'DefaultInsurance' => $DefaultInsurance,
              'ProfileMedia' => $ProfileMedia,
              'CategoryLabel' => $CategoryLabel,
              'MedicalFormSubmitDateUtc' => $MedicalFormSubmitDateUtc,
              'MedicalFormCompleteDateUtc' => $MedicalFormCompleteDateUtc,
              'MessageResponseDateUtc' => $MessageResponseDateUtc,
              'MessageReadDateUtc' => $MessageReadDateUtc,
              'HasNewMessages' => $HasNewMessages
                ]);

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

        }

   }
       }else{
          echo 'Go Live Api';
       }

       }



  }
