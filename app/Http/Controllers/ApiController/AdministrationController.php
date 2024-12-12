<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\UserModel;
use App\Models\Api\UserCalendarModel;
use App\Models\Api\UserProviderModel;
use App\Models\Api\UserLocationsModel;
use App\Models\Api\GetTokenMod;
use Illuminate\Support\Facades\Validator;

class AdministrationController extends Controller
{
    public function storeCalendar(Request $request)
    {

        $tokekn = GetTokenMod::get()->first();
         $accesstoken = $tokekn->access_token;
         $url = $tokekn->liveurl;
         $status = $tokekn->livestatus;

         if($status == 0)
       {
         $urlenv = config('app.urlc');
         $curl = curl_init();

         curl_setopt_array($curl, array(
           CURLOPT_URL => "$url/calendars",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => '',
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => 'GET',
           CURLOPT_HTTPHEADER => array(
             'Accept: application/json',
             "Authorization: Bearer $accesstoken",
             'x-cpapi-version: v2',
             'Cookie: _device=qK04WZVRrUC3P9pggZhErg'
           ),
         ));

         // $response = curl_exec($curl);

         curl_close($curl);

        $responsearray = json_decode($response);



        if($responsearray)
        {
        foreach($responsearray as $rows)
        {

            $identifier =  $rows->Identifier;
            $Description =  $rows->Description;
            $CalendarKey =  $rows->CalendarKey;
            $DisplayName =  $rows->DisplayName;
            $TimezoneKey =  $rows->TimezoneKey;
            $ProfileText =  $rows->ProfileText;
            $CalendarPolicy =  $rows->CalendarPolicy;
            $OpenDay =  $rows->OpenDay;
            $SlotLimit =  $rows->SlotLimit;
            $TimeAdvance =  $rows->TimeAdvance;
            $TimeCancel =  $rows->TimeCancel;
            $IsEmailNotification =  $rows->IsEmailNotification;
            $PublishDateUtc =  $rows->PublishDateUtc;
            $EnableReminderSms =  $rows->EnableReminderSms;
            $EnableCreateEmail =  $rows->EnableCreateEmail;
            $EnableUpdateEmail =  $rows->EnableUpdateEmail;
            $EnableCancelEmail =  $rows->EnableCancelEmail;
            $EnableCompleteEmail =  $rows->EnableCompleteEmail;
            $PromptCompleteEmail =  $rows->PromptCompleteEmail;
            $CustomFeedbackUrl =  $rows->CustomFeedbackUrl;
            $EnableSendForm =  $rows->EnableSendForm;
            $Order =  $rows->Order;
            $Type =  $rows->Type;
            $StartDateUtc =  $rows->StartDateUtc;
            $EndDateUtc =  $rows->EndDateUtc;
            $IsOnlineBooking =  $rows->IsOnlineBooking;
            $IsActive =  $rows->IsActive;
            $IsDeleted =  $rows->IsDeleted;
            $ProfilePicturePath =  $rows->ProfilePicturePath;
            $Label =  $rows->Label;
            $Reminder1Schedule =  $rows->Reminder1Schedule;
            $Reminder2Schedule =  $rows->Reminder2Schedule;
            $LastReminder1RunDateTimeUtc =  $rows->LastReminder1RunDateTimeUtc;
            $LastReminder2RunDateTimeUtc =  $rows->LastReminder2RunDateTimeUtc;
            $Owner =  $rows->Owner;
            $ProfileUrl =  $rows->ProfileUrl;


            $data = new UserCalendarModel();

            $data->calendarid = $identifier;
            $data->description = $Description;
            $data->CalendarKey = $CalendarKey;
            $data->name = $DisplayName;
            $data->TimezoneKey = $TimezoneKey;
            $data->ProfileText = $ProfileText;
            $data->CalendarPolicy = $CalendarPolicy;
            $data->OpenDay = $OpenDay;
            $data->SlotLimit = $SlotLimit;
            $data->TimeAdvance = $TimeAdvance;
            $data->TimeCancel = $TimeCancel;
            $data->IsEmailNotification = $IsEmailNotification;
            $data->PublishDateUtc = $PublishDateUtc;
            $data->EnableReminderSms = $EnableReminderSms;
            $data->EnableCreateEmail = $EnableCreateEmail;
            $data->EnableUpdateEmail = $EnableUpdateEmail;
            $data->EnableCancelEmail = $EnableCancelEmail;
            $data->EnableCompleteEmail = $EnableCompleteEmail;
            $data->PromptCompleteEmail = $PromptCompleteEmail;
            $data->CustomFeedbackUrl = $CustomFeedbackUrl;
            $data->EnableSendForm = $EnableSendForm;
            $data->Order = $Order;
            $data->calendarType = $Type;
            $data->StartDateUtc = $StartDateUtc;
            $data->EndDateUtc = $EndDateUtc;
            $data->IsOnlineBooking = $IsOnlineBooking;
            $data->IsActive = $IsActive;
            $data->IsDeleted = $IsDeleted;
            $data->ProfilePicturePath = $ProfilePicturePath;
            $data->Label = $Label;
            $data->Reminder1Schedule =  json_encode($Reminder1Schedule);
            $data->Reminder2Schedule = json_encode( $Reminder2Schedule);
            $data->LastReminder1RunDateTimeUtc = $LastReminder1RunDateTimeUtc;
            $data->LastReminder2RunDateTimeUtc = $LastReminder2RunDateTimeUtc;
            $data->Owner = json_encode($Owner);
         // $data->CalendarClasses = $CalendarClasses;
            $data->ProfileUrl = $ProfileUrl;
            $data->save();

        }
    }
       }else{
          echo 'Go Live Api';
       }

}

    public function storeProvider(Request $request)
     {

                $tokekn = GetTokenMod::get()->first();
                $accesstoken = $tokekn->access_token;
                $url = $tokekn->liveurl;

                $urlenv = config('app.urlc');
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/locations/AhOF6hpkOUKtI789Iqpsmg/providers",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    "Authorization: Bearer $accesstoken",
                    'x-cpapi-version: v2',
                    'Cookie: _device=qK04WZVRrUC3P9pggZhErg'
                ),
                ));

                // $response = curl_exec($curl);

                curl_close($curl);
                $jsonrespons = json_decode($response);

                if($jsonrespons)
                {
                 foreach($jsonrespons as $rowdata)
                 {
                    $Identifier = $rowdata->Identifier;
                    $ProviderName = $rowdata->ProviderName;
                    $Title = $rowdata->Title;
                    $Firstname = $rowdata->Firstname;
                    $ProviderNumber = $rowdata->ProviderNumber;
                    $PayeeProviderNumber = $rowdata->PayeeProviderNumber;
                    $Status = $rowdata->Status;
                    $ReportCode = $rowdata->ReportCode;
                    $Description = $rowdata->Description;
                    $MerchantId = $rowdata->MerchantId;
                    $TaxFileNumber = $rowdata->TaxFileNumber;
                    $GstNumber = $rowdata->GstNumber;
                    $JobCode = $rowdata->JobCode;
                    $IncomeReportCode = $rowdata->IncomeReportCode;
                    $ExpenseReportCode = $rowdata->ExpenseReportCode;
                    $IsDeleted = $rowdata->IsDeleted;
                    $LetterHead = $rowdata->LetterHead;
                    $JobTitle = $rowdata->JobTitle;

                       $object = new UserProviderModel();
                       $object->Identifier = $Identifier;
                       $object->ProviderName = $ProviderName;
                       $object->Title = $Title;
                       $object->Firstname = $Firstname;
                       $object->ProviderNumber = $ProviderNumber;
                       $object->PayeeProviderNumber = $PayeeProviderNumber;
                       $object->Status = $Status;
                       $object->ReportCode = $ReportCode;
                       $object->Description= $Description;
                       $object->MerchantId = $MerchantId;
                       $object->TaxFileNumber = $TaxFileNumber;
                       $object->GstNumber = $GstNumber;
                       $object->JobCode = $JobCode;
                       $object->IncomeReportCode = $IncomeReportCode;
                       $object->IncomeReportCode = $IncomeReportCode;
                       $object->ExpenseReportCode = $ExpenseReportCode;
                       $object->IsDeleted = $IsDeleted;
                       $object->LetterHead = $LetterHead;
                       $object->JobTitle = $JobTitle;
                       $object->save();

                       return response()->json([
                        'message' => 'Data Inserted Successfully..',
                        'status' => '1'
                       ]);

                 }
                }else{
                    return response()->json([
                        'message'=>'Data Not Found..',
                        'status'=>'0'
                     ]);
                }

            }

        public function storeLocation(Request $request)
        {

            $tokekn = GetTokenMod::get()->first();
            $accesstoken = $tokekn->access_token;
            $url = $tokekn->liveurl;

            $urlenv = config('app.urlc');
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "$url/locations",
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
            $requestjson = json_decode($response,true);

       if($requestjson)
       {
        foreach($requestjson as $jsonreq)
        {
             $Identifier = $jsonreq['Identifier'];
            $LocationName = $jsonreq['LocationName'];
            $DisplayName = $jsonreq['DisplayName'];
            $Description = $jsonreq['Description'];
            $CompanyName = $jsonreq['CompanyName'];
            $Abn = $jsonreq['Abn'];
            $Email = $jsonreq['Email'];
            $MapUrl = $jsonreq['MapUrl'];
            $Phone1 = $jsonreq['Phone1'];
            $Phone2 = $jsonreq['Phone2'];
            $Mobile = $jsonreq['Mobile'];
            $Fax = $jsonreq['Fax'];
            $Latitude = $jsonreq['Latitude'];
            $Longitude = $jsonreq['Longitude'];
            $IsDeleted = $jsonreq['IsDeleted'];
            $IsOnlineBooking = $jsonreq['IsOnlineBooking'];
            $IsOnlinePayment = $jsonreq['IsOnlinePayment'];
            $AddressLine1 = $jsonreq['AddressLine1'];
            $AddressLine2 = $jsonreq['AddressLine2'];
            $Suburb = $jsonreq['Suburb'];
            $Postcode = $jsonreq['Postcode'];
            $State = $jsonreq['State'];
            $Country = $jsonreq['Country'];
            $LocationKey = $jsonreq['LocationKey'];
            $TimezoneKey = $jsonreq['TimezoneKey'];
            $CancellationPolicy = $jsonreq['CancellationPolicy'];
            $PaymentPolicy = $jsonreq['PaymentPolicy'];
            $OtherPolicy = $jsonreq['OtherPolicy'];
            $DirectionNote = $jsonreq['DirectionNote'];
            $DisabledMsg = $jsonreq['DisabledMsg'];
            $DisabledTitle = $jsonreq['DisabledTitle'];
            $IpAddress = $jsonreq['IpAddress'];
            $NotificationEmail = $jsonreq['NotificationEmail'];
            $LocationSetting = $jsonreq['LocationSetting'];
            $LogoUrl = $jsonreq['LogoUrl'];
            $WebAddress = $jsonreq['WebAddress'];
            $ReviewUrl = $jsonreq['ReviewUrl'];
            $IsOnlinePaymentEnabled = $jsonreq['IsOnlinePaymentEnabled'];


             $validator = Validator::make($jsonreq,[
            'Identifier' => 'required|unique:user_locations,locationid',

             ]);

             if ($validator->fails()) {
                 $errors = $validator->errors();
             } else {

            $userlocation = new UserLocationsModel();

            $userlocation->locationid = $Identifier;
            $userlocation->name = $LocationName;
            $userlocation->DisplayName = $DisplayName;
            $userlocation->CompanyName = $CompanyName;
            $userlocation->Description = $Description;
            $userlocation->Abn = $Abn;
            $userlocation->email = $Email;
            $userlocation->MapUrl = $MapUrl;
            $userlocation->phone = $Phone1;
            $userlocation->phone = $Phone2;
            $userlocation->Mobile = $Mobile;
            $userlocation->Fax = $Fax;
            $userlocation->Latitude = $Latitude;
            $userlocation->Longitude = $Longitude;
            $userlocation->IsDeleted = $IsDeleted;
            $userlocation->IsOnlineBooking = $IsOnlineBooking;
            $userlocation->IsOnlinePayment = $IsOnlinePayment;
            $userlocation->address = $AddressLine1;
            $userlocation->AddressLine2 = $AddressLine2;
            $userlocation->Suburb = $Suburb;
            $userlocation->Postcode = $Postcode;
            $userlocation->state = $State;
            $userlocation->country = $Country;
            $userlocation->LocationKey = $LocationKey;
            $userlocation->TimezoneKey = $TimezoneKey;
            $userlocation->CancellationPolicy = $CancellationPolicy;
            $userlocation->PaymentPolicy = $PaymentPolicy;
            $userlocation->OtherPolicy = $OtherPolicy;
            $userlocation->DirectionNote = $DirectionNote;
            $userlocation->DisabledMsg = $DisabledMsg;
            $userlocation->DisabledTitle = $DisabledTitle;
            $userlocation->IpAddress = $IpAddress;
            $userlocation->NotificationEmail = $NotificationEmail;
            $userlocation->LocationSetting = $LocationSetting;
            $userlocation->LogoUrl = $LogoUrl;
            $userlocation->address = $WebAddress;
            $userlocation->ReviewUrl = $ReviewUrl;
            $userlocation->IsOnlinePaymentEnabled = $IsOnlinePaymentEnabled;
            $userlocation->save();

            }

        }
    }else{

    }

        }

        public function storeUser(Request $request)
        {
            $tokekn = GetTokenMod::get()->first();
            $accesstoken = $tokekn->access_token;
            $url = $tokekn->liveurl;

            $urlenv = config('app.urlc');
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/account",
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

                $jsonres = json_decode($response);

                if($jsonres)
                {
                  $Identifier = $jsonres->Identifier;
                  $Username = $jsonres->Username;
                  $Firstname = $jsonres->Firstname;
                  $Lastname = $jsonres->Lastname;
                  $Email = $jsonres->Email;
                  $Phone = $jsonres->Phone;
                  $Mobile = $jsonres->Mobile;
                  $Dob = $jsonres->Dob;
                  $HasPinSet = $jsonres->HasPinSet;
                  $TwoFactorEnabled = $jsonres->TwoFactorEnabled;
                  $TwoFactorEnforced = $jsonres->TwoFactorEnforced;
                  $TwoFactorStatus = $jsonres->TwoFactorStatus;
                  $EnableSecurityEmail = $jsonres->EnableSecurityEmail;
                  $MyIpAddress = $jsonres->MyIpAddress;
                  $Addresses = $jsonres->Addresses;
                  $Groups = $jsonres->Groups;
                  $Locations = $jsonres->Locations;
                  $Calendars = $jsonres->Calendars;

                  $data = new UserModel();

                  $data->userId = $Identifier;
                  $data->name = $Username;
                  $data->firstname = $Firstname;
                  $data->lastname = $Lastname;
                  $data->email = $Email;
                  $data->phone = $Phone;
                  $data->mobile = $Mobile;
                  $data->dob = $Dob;
                  $data->hasPinSet = $HasPinSet;
                  $data->twoFactorEnabled = $TwoFactorEnabled;
                  $data->twoFactorEnforced = $TwoFactorEnforced;
                  $data->twoFactorStatus =$TwoFactorStatus;
                  $data->enableSecurityEmail = $EnableSecurityEmail;
                  $data->myIpAddress = $MyIpAddress;
                  $data->addresses = json_encode($Addresses);
                  $data->roles = json_encode($Groups);
                  $data->locations = json_encode($Locations);
                  $data->calendars = json_encode($Calendars);
                  $data->save();
                  return response()->json([
                    'message' => 'Data Inserted Successfully..',
                    'status' => '1'
                   ]);
                }else{
                    return response()->json([
                        'message'=>'Data Not Found..',
                        'status'=>'0'
                     ]);
                }

        }


}
