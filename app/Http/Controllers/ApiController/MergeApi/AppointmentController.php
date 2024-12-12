<?php

namespace App\Http\Controllers\ApiController\MergeApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GetAppointment;
use Illuminate\Support\Facades\DB;
use App\Models\Api\GetAppointmentModel;
use App\Models\Api\Gohilevelmodel\Authoriz;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function MergeAppointment()
    {

      $calendar_idGhl = DB::table('gohighlevel_calendars_get')->select('*')->get();

      $appoint = GetAppointmentModel::where('mergestatus','=',0)->whereDate('created_at', Carbon::today())->get();

       $Authoriz =  Authoriz::get();
       $accesstoken = $Authoriz[0];
       $tokenBearer = $accesstoken['access_token'];
       $url = $accesstoken['liveurl'];
       $status = $accesstoken['livestatus'];


       if($status == 0)
       {

       $urlold = config('app.urls');


        foreach($appoint as $alldata)
        {

            $exampleDate11 = explode('T',$alldata->startTime);
            $coretsartime =$exampleDate11[0].' '.$exampleDate11[1];

           $corepracticepatint =  json_decode($alldata->Patient);
           $corepatiantemail =     $corepracticepatint->Email;

           $patiant_Ghl = DB::table('gohighlevel_allcontacts')->select('contactId','locationId')->where('email' ,'=', $corepatiantemail)->first();

           $checkghlappointment = DB::table('gohighlevel_appointments')->select('contactId')->where('appoinmentStatus','!=','cancelled')->where('startTime' ,'=', $coretsartime)->count();

           $eventidghlappointment = DB::table('gohighlevel_appointments')->select('appointmentId')->where('appoinmentStatus','!=','cancelled')->where('startTime' ,'=', $coretsartime)->first();


            if($checkghlappointment > 0 && $alldata->updatestatus == 1){

                $appointmentId=$eventidghlappointment->appointmentId;
                $calenderId = $calendar_idGhl[0]->calendar_id;

             $exampleDate = $alldata->startTime;
              $exampleDate = strtotime($exampleDate);
              $newDate = date('Y-m-d\Th:i:s', $exampleDate);

              $exampleDate1 = $alldata->endTime;
              $exampleDate1 = strtotime($exampleDate1);
              $newDate1 = date('Y-m-d\Th:i:s', $exampleDate1);


              $startTime =  $alldata->startTime.'+10:00';
              $endTime = $alldata->endTime.'+10:00';

              $AppointmentType = $alldata->AppointmentType;
              $Attendance = $alldata->Attendance;
               if($AppointmentType == 0 || $AppointmentType == 1){
              $appointmentStatus = 'Confirmed';
              }
              else if($Attendance == 3 || $Attendance == 4 ){
              $appointmentStatus = 'No Show';
              }else if($Attendance == 5 || $AppointmentType == 2){
              $appointmentStatus = 'Cancelled';
              }


                   $curl = curl_init();

                        curl_setopt_array($curl, [
                          CURLOPT_URL => "$url/calendars/events/appointments/$appointmentId",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "PUT",
                          CURLOPT_POSTFIELDS => json_encode([
                            'calendarId' => $calenderId,
                            'startTime' => $startTime,
                            'endTime' => $endTime,
                            'appointmentStatus' => $appointmentStatus

                          ]),
                          CURLOPT_HTTPHEADER => [
                            "Accept: application/json",
                            "Authorization: Bearer $tokenBearer",
                            "Content-Type: application/json",
                            "Version: 2021-04-15"
                          ],
                        ]);

                        // $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                            array(
                                    'updatestatus' => 0,
                                     'mergestatus'=>1,
                                 )
                            );


            }

           if($patiant_Ghl && $checkghlappointment == 0 )
           {


              $title = $alldata->title;


              $exampleDate = $alldata->startTime;
              $exampleDate = strtotime($exampleDate);
              $newDate = date('Y-m-d\Th:i:s', $exampleDate);

              $exampleDate1 = $alldata->endTime;
              $exampleDate1 = strtotime($exampleDate1);
              $newDate1 = date('Y-m-d\Th:i:s', $exampleDate1);

              $startTime =  $alldata->startTime.'+10:00';
              $endTime = $alldata->endTime.'+10:00';


              $calenderId = $calendar_idGhl[0]->calendar_id;
              $LocationtId = $patiant_Ghl->locationId;
              $contactId = $patiant_Ghl->contactId;

              $AppointmentType = $alldata->AppointmentType;

              $Attendance = $alldata->Attendance;
               if($AppointmentType == 0 || $AppointmentType == 1 ){
              $appointmentStatus = 'Confirmed';
              }
              else if($Attendance == 3 || $Attendance == 4 ){
              $appointmentStatus = 'No Show';
              }else if($Attendance == 5 || $AppointmentType == 2){
              $appointmentStatus = 'Cancelled';
              }


                $curl = curl_init();
                curl_setopt_array($curl, [
                  CURLOPT_URL => "$url/calendars/events/appointments",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode([
                    'calendarId' =>  $calenderId,
                    'locationId' => $LocationtId,
                    'contactId' => $contactId,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'title' =>  $title,
                    'appointmentStatus' => $appointmentStatus,
                    // 'assignedUserId' => 'cMnqfHiukVskU6MWywSG',
                    // 'address' => 'BMT',
                    // 'ignoreDateRange' => null,
                    // 'toNotify' => null
                  ]),
                  CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $tokenBearer",
                    "Content-Type: application/json",
                    "Version: 2021-04-15"
                  ],
                ]);

                // $response = curl_exec($curl);

                $err = curl_error($curl);
                curl_close($curl);


                if ($err) {

                   $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                        array(
                                'skipdAppointment' => 1,
                                'skipdAppointreson' =>$err ,
                             )
                        );


                } else {

                     $data = json_decode($response,true);


                         if(isset($data['calendarId'])  && $data !='' )
                         {


                            $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                                array(
                                        'mergestatus' => 1,
                                     )
                                );

                          $database = new GetAppointment();
                          $database->appointmentId = $data['id'];
                          $database->calendarId = $data['calendarId'];
                          $database->locationId = $LocationtId;
                          $database->mergestatus = 1;
                           $database->skipdAppointment = 0;
                           $database->skipstatusname = 'Dentalflo';
                          $database->contactId = $data['contactId'];
                          $database->title = $data['title'];
                          $database->appoinmentStatus = $data['appoinmentStatus'];
                          $database->address = $data['address'];
                          $database->startTime = $alldata->startTime;
                          $database->endTime = $alldata->endTime;
                          $database->save();


                         }
                         else{

                            $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                            array(
                                    'skipdAppointment' => 1,
                                    'skipdAppointreson' =>$response ,
                                 )
                            );

                         }

                }
            }
        }//foreach

       }else{

       }


    }

    public function MergeSkipappointCore($id)
    {

          $alldata = GetAppointmentModel::find($id);

            $calendar_idGhl = DB::table('gohighlevel_calendars_get')->select('*')->get();


       $Authoriz =  Authoriz::get();
       $accesstoken = $Authoriz[0];
       $tokenBearer = $accesstoken['access_token'];
       $url = $accesstoken['liveurl'];
        $status = $accesstoken['livestatus'];


       if($status == 0)
       {

       $urlold = config('app.urls');

            $exampleDate11 = explode('T',$alldata->startTime);

            $coretsartime =$exampleDate11[0].' '.$exampleDate11[1];

           $corepracticepatint =  json_decode($alldata->Patient);
           $corepatiantemail =     $corepracticepatint->Email;

           $patiant_Ghl = DB::table('gohighlevel_allcontacts')->select('contactId','locationId')->where('email' ,'=', $corepatiantemail)->first();

           $checkghlappointment = DB::table('gohighlevel_appointments')->select('contactId')->where('startTime' ,'=', $coretsartime)->count();


           if($patiant_Ghl && $checkghlappointment == 0 )
           {
              $title = $alldata->title;


              $exampleDate = $alldata->startTime;
              $exampleDate = strtotime($exampleDate);
              $newDate = date('Y-m-d\Th:i:s', $exampleDate);

              $exampleDate1 = $alldata->endTime;
              $exampleDate1 = strtotime($exampleDate1);
              $newDate1 = date('Y-m-d\Th:i:s', $exampleDate1);


              $startTime =  $alldata->startTime.'+10:00';
              $endTime = $alldata->endTime.'+10:00';


              $calenderId = $calendar_idGhl[0]->calendar_id;
              $LocationtId = $patiant_Ghl->locationId;
              $contactId = $patiant_Ghl->contactId;

              $AppointmentType = $alldata->AppointmentType;
              $Attendance = $alldata->Attendance;
               if($AppointmentType == 0 || $AppointmentType == 1){
              $appointmentStatus = 'Confirmed';
              }
              else if($Attendance == 3 || $Attendance == 4 ){
              $appointmentStatus = 'No Show';
              }else if($Attendance == 5 || $AppointmentType == 2){
              $appointmentStatus = 'Cancelled';
              }


                $curl = curl_init();
                curl_setopt_array($curl, [
                  CURLOPT_URL => "$url/calendars/events/appointments",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode([
                    'calendarId' =>  $calenderId,
                    'locationId' => $LocationtId,
                    'contactId' => $contactId,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'title' =>  $title,
                    'appointmentStatus' =>  $appointmentStatus,
                    // 'assignedUserId' => 'cMnqfHiukVskU6MWywSG',
                    // 'address' => 'BMT',
                    // 'ignoreDateRange' => null,
                    // 'toNotify' => null
                  ]),
                  CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $tokenBearer",
                    "Content-Type: application/json",
                    "Version: 2021-04-15"
                  ],
                ]);
                 // $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                   $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                        array(
                                'skipdAppointment' => 1,
                                 'skipdAppointreson' =>$err ,
                             )
                        );

                } else {

                     $data = json_decode($response,true);
                         if(isset($data['calendarId']))
                         {
                            $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                                array(
                                        'mergestatus' => 1,
                                        'skipdAppointment' => 0,
                                     )
                                );
                            $responsall = json_decode($response, true);
                         }
                         else{
                            $savedata = GetAppointmentModel::where('id',$alldata->id)->update(
                            array(
                                    'skipdAppointment' => 1,
                                    'skipdAppointreson' =>$response ,
                                 )
                            );

                         }




                }
            }

       }else{
          echo 'Go Live Api';
       }

    }
}
