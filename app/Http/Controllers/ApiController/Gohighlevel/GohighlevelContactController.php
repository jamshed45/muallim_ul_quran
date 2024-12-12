<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GetContactModel;
use App\Models\Api\Gohilevelmodel\GetAppointment;
use App\Models\Api\Gohilevelmodel\Authoriz;
use App\Models\Api\Gohilevelmodel\LocationGet;
use App\Models\Api\Gohilevelmodel\AllContactsGetGhl;
use Illuminate\Support\Facades\Validator;
use DB;

class GohighlevelContactController extends Controller
{


   public function GetContacts()
    {
        $tokekn = Authoriz::get()->first();
        $accesstoken = $tokekn->access_token;
        $locationId = $tokekn->locationId;
        $url = $tokekn->liveurl;
        $status = $tokekn->livestatus;


       if($status == 0)
       {
        $urlenv = config('app.urls');
        $LocationGet = LocationGet::get();

         $alloldpatint = AllContactsGetGhl::orderBy('id','asc')->select('startAfterId','startAfter')->first();


         if($alloldpatint)
         {
            $startAfterId =$alloldpatint->startAfterId;
            $startAfter =$alloldpatint->startAfter;
         }
         else{
              $startAfterId ='';
              $startAfter ='';
         }



            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_URL => "$url/contacts/?locationId=$locationId&limit=100",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: Bearer $accesstoken",
                "Version: 2021-07-28"
            ],
            ]);

            // $response = curl_exec($curl);
            $err = curl_error($curl);



            curl_close($curl);
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
                // $respons = json_decode($response);
                $responsall = json_decode($response, true);

                $resp = $responsall['contacts'];
                $meta = $responsall['meta'];
                foreach($resp as $respons)
                {

                    $tags = [];
                    $attributions=[];
                    $website=[];

                    $contactId = $respons['id'];
                    $locationId = $respons['locationId'];
                    $businessId = $respons['businessId'];
                    if(isset($respons['country'])){
                    $country = $respons['country'];
                    }
                    else{
                     $country = '';
                    }

                    $email = $respons['email'];
                    $source = $respons['source'];
                    $dateAdded = $respons['dateAdded'];
                    $followers = $respons['followers'];
                    $tags = $respons['tags'];
                    $customFields = $respons['customFields'];
                    $contactName = $respons['contactName'];
                    $firstName = $respons['firstName'];
                    $lastName = $respons['lastName'];
                    $companyName = $respons['companyName'];
                    $phone = $respons['phone'];
                    $dnd = $respons['dnd'];
                    $type = $respons['type'];
                    $assignedTo = $respons['assignedTo'];
                    $city = $respons['city'];
                    $state = $respons['state'];
                    $postalCode = $respons['postalCode'];
                    $address1 = $respons['address1'];
                    $dateUpdated = $respons['dateUpdated'];
                    $dateOfBirth = $respons['dateOfBirth'];
                    $additionalEmails = $respons['additionalEmails'];
                    // $attributions = $respons['attributions'];
                    // $website = $respons['website'];

      $validator = Validator::make($respons,[
                        'email' => 'required|email|unique:gohighlevel_allcontacts,email',
                       ]);

                       if ($validator->fails()) {


     $updateContact =   DB::table('gohighlevel_allcontacts')
                    ->where('email','=',$email)
                    ->update([
                        'contactId' => $contactId,
                        'locationId' => $locationId,
                        'country' => $country,
                        'email' => $email,
                        'dateAdded' => $dateAdded,
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'phone' => $phone,
                        'type' => $type,
                        'dateUpdated' => $dateUpdated,
                        'dateOfBirth' => $dateOfBirth,
                        'additionalEmails' => json_encode($additionalEmails),
                        'tags' => json_encode($tags),
                        'customFields' => json_encode($customFields),
                        'businessId' => $businessId,
                        'source' => $source,
                        'contactName' => $contactName,
                        'companyName' => $companyName,
                        'dnd' => $dnd,
                        'city' => $city,
                        'state' => $state,
                        'postalCode' => $postalCode,
                        'address1' => $address1,
                        'followers' => $followers,
                        'startAfterId' => $meta['startAfterId'],
                        'startAfter' => $meta['startAfter']
                        ]);

                    } else {
                    $data = new AllContactsGetGhl();
                    $data->contactId = $contactId;
                    $data->locationId = $locationId;
                    $data->businessId = $businessId;
                    $data->country = $country;
                    $data->email = $email;
                    $data->source = $source;
                    $data->dateAdded = $dateAdded;
                    $data->contactName = $contactName;
                    $data->firstName = $firstName;
                    $data->lastName = $lastName;
                    $data->companyName = $companyName;
                    $data->phone = $phone;
                    $data->dnd = $dnd;
                    $data->type = $type;
                    $data->assignedTo = $assignedTo;
                    $data->city = $city;
                    $data->state = $state;
                    $data->postalCode = $postalCode;
                    $data->address1 = $address1;
                    $data->dateUpdated = $dateUpdated;
                    $data->dateOfBirth = $dateOfBirth;
                    $data->additionalEmails = json_encode($additionalEmails);
                    // $data->attributions = json_encode($attributions);
                    // $data->website = $website;
                    $data->followers = json_encode($followers);
                    $data->tags = json_encode($tags);
                    $data->customFields = json_encode($customFields);
                    $data->startAfterId = $meta['startAfterId'];
                    $data->startAfter = $meta['startAfter'];
                    $data->save();
                    }
                  }
               }
       }else{
          echo 'Go Live Api';
       }

         }


     public function GetAppointmentGhl()
     {


        $tokekn = Authoriz::get()->first();
        $accesstoken = $tokekn->access_token;
        $locationId = $tokekn->locationId;
        $calendarId = $tokekn->calendarId;
        $url = $tokekn->liveurl;
        $urlenv = config('app.urls');
        $status = $tokekn->livestatus;


       if($status == 0)
       {
            $datetoday =date('Y-m-d');
            $starttimeone = date('Y-m-d', strtotime('-1 months', strtotime($datetoday)));

            $starttime = strtotime($starttimeone);
            $newstarttime = $starttime * 1000;

            $endyeardate =date('Y-m-d', strtotime('+1 year', strtotime($starttimeone)) );

            $endtime =  strtotime($endyeardate);
            $newendtime = $endtime * 1000;

            $curl = curl_init();

            curl_setopt_array($curl, [
              CURLOPT_URL => "$url/calendars/events?locationId=$locationId&calendarId=$calendarId&startTime=$newstarttime&endTime=$newendtime",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: Bearer $accesstoken",
                "Version: 2021-04-15"
              ],
            ]);
            // $response = curl_exec($curl);


            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {


            $respe = json_decode($response,true);


            if(isset($respe['events']))
            {
                $results = $respe['events'];


                foreach($results as $result)
                {

                $appointmentId = $result['id'];
                $calendarId = $result['calendarId'];
                $locationId = $result['locationId'];
                $contactId = $result['contactId'];
                $title = $result['title'];
                $appoinmentStatus = $result['appointmentStatus'];
                if(isset($result['notes']))
                {
                   $notes = $result['notes'];
                }
                else{
                  $notes ='';
                }
                $address = $result['address'];





                $startTime = date('Y-m-d H:i:s', strtotime('+10 Hours', strtotime($result['startTime'])));

                $endTime = date('Y-m-d H:i:s', strtotime('+10 Hours', strtotime($result['endTime'])));

              // $startTime = date('Y-m-d h:i:s', strtotime($result['startTime']));
              // $endTime = date('Y-m-d h:i:s',strtotime($result['endTime']));

                $dateAdded = $result['dateAdded'];
                $dateUpdated = $result['dateUpdated'];


                         $validator = Validator::make($result,[
                        'id' => 'required|unique:gohighlevel_appointments,appointmentId',

                     ]);

                     if ($validator->fails()) {

                       $updateappointments =   DB::table('gohighlevel_appointments')
                    ->where('appointmentId','=',$appointmentId)
                    ->update([
                        'appointmentId' => $appointmentId,
                        'calendarId' => $calendarId,
                        'locationId' => $locationId,
                        'contactId' => $contactId,
                        'title' => $title,
                        'appoinmentStatus' => $appoinmentStatus,
                        'notes'=>  $notes,
                        'address'=> $address,
                        'startTime' => $startTime,
                        'endTime' => $endTime,
                        'dateAdded' => $dateAdded,
                        'dateUpdated' => $dateUpdated,
                        'created_at'=>date('Y-m-d H:i:s'),

                        ]);

                     } else {
                          $data = new GetAppointment();
                          $data->appointmentId = $appointmentId;
                          $data->calendarId = $calendarId;
                          $data->locationId = $locationId;
                          $data->contactId = $contactId;
                          $data->title = $title;
                          $data->appoinmentStatus = $appoinmentStatus;
                          $data->notes = $notes;
                          $data->address = $address;
                          $data->startTime = $startTime;
                          $data->endTime = $endTime;
                          $data->dateAdded = $dateAdded;
                          $data->dateUpdated = $dateUpdated;
                          $data->save();
                     }


              }

             }
        }
       }else{
          echo 'Go Live Api';
       }


          }


}
