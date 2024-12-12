<?php

namespace App\Http\Controllers\ApiController\MergeApiGhlToCore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GetAppointment;
use Illuminate\Support\Facades\DB;
use App\Models\Api\GetTokenMod;
use Carbon\Carbon;
use App\Models\Api\GetAppointmentModel;

class AppointmentGhlToCore extends Controller
{

    public function  AppointGhlToCor()
    {

        // $exampleDate = '2024-07-03 03:00:00';
             // $exampleDate = strtotime($exampleDate);
             // $newDate = date('Y-m-d\Th:i:s', $exampleDate);

              //dd( $ghlappoint);

         $ghlappoint =  DB::table('gohighlevel_appointments')->select('*')->where('mergestatus','=',0)->whereDate('created_at', Carbon::today())->get();



        $tokekn = GetTokenMod::get()->first();

        $accesstoken = $tokekn->access_token;
        $locationIdCore = $tokekn->locationId;
        $calendarIdCoreCore = $tokekn->calendarId;
        $providerIdCore = $tokekn->providerId;
        $url = $tokekn->liveurl;
        $status = $tokekn->livestatus;

        $urlold = config('app.urlc');



       if($status == 0 && $ghlappoint)
       {


        foreach($ghlappoint as $alldata)
        {

            $exampleDate11 = explode(' ',$alldata->startTime);
            $ghlstartime =$exampleDate11[0].'T'.$exampleDate11[1];


           $ghlpatint = DB::table('gohighlevel_allcontacts')->select('email')->where('contactId' ,'=', $alldata->contactId)->first();

          if( $ghlpatint)
          {

              $ghlpatintemail =$ghlpatint->email;


             $apotmenttopatintdetail_core = DB::table('patients_get')->select('contactId','email')->where('email' ,'=', $ghlpatintemail)->first();

          }
          else{
               $apotmenttopatintdetail_core ='';

          }



          $checkcoreappointment = DB::table('booking_get_appointment')->select('contactId')->where('startTime' ,'=', $ghlstartime)->where('AppointmentType' ,'!=', 2)->where('calendarId' ,'=', $calendarIdCoreCore)->count();

         if($apotmenttopatintdetail_core && $checkcoreappointment == 0)
         {

            $contactId =  $apotmenttopatintdetail_core->contactId;


           /*
             $locationId ='xm8F-ELfy0CgMQlh7RGgPg';
             $calendarId ='XcKoZsJRFEmWxfFUa6UtgQ';
             $ProviderId ='ua0U3JE2dUaK4aWZILQW9w';

           */

            $locationId = $locationIdCore;
            $calendarId = $calendarIdCoreCore;
            $ProviderId = $providerIdCore;

              $appointmentId = $alldata->appointmentId;
              $title = $alldata->title;
              $notes = $alldata->notes;


              $exampleDate = $alldata->startTime;
              $exampleDate = strtotime($exampleDate);
              $newDate = date('Y-m-d\TH:i:s', $exampleDate);

              $exampleDate1 = $alldata->endTime;
              $exampleDate1 = strtotime($exampleDate1);
              $newDate1 = date('Y-m-d\TH:i:s', $exampleDate1);


              $startTime = $newDate;
              $endTime = $newDate1;


          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/appointments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "Start": "'.$startTime.'",
              "End": "'.$endTime.'",
              "CalendarId": "'.$calendarId.'",
              "PatientId": "'.$contactId.'",
              "LocationId": "'.$locationId.'",
              "ProviderId": "'.$ProviderId.'",

          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              "Authorization: Bearer $accesstoken",
              'x-cpapi-version: v2'
            ),
          ));
          // $response = curl_exec($curl);



          $err = curl_error($curl);
          curl_close($curl);

           if ($err) {

                 $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
                    array(

                            'skipdAppointment' => 1,
                            'skipdAppointment_reson' =>$err ,
                         )
                    );
            } else {
                 $data = json_decode($response,true);

                 if(!isset($data['Message']) && $data !='')
                {
                $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
                    array(
                            'mergestatus' => 1,
                            'skipdAppointment' => 0,
                         )
                    );

                    $EventClass = [];
                    $Patient = [];
                    $Location = [];
                    $Provider = [];
                    $Calendar = [];
                    $EventTags = [];
                    $Treatments = [];
                    $Messages = [];
                    $Envelopes = [];

                $Appointmen = new GetAppointmentModel();

                $Patient = $data['Patient'];
                $email =  $Patient['Email'];
                $Calendar = $data['Calendar'];
                $CalendarId = $Calendar['Identifier'];

                $Appointmen->mergestatus = 1;
                $Appointmen->skipdAppointment = 0;
                $Appointmen->updatestatus = 0;
                $Appointmen->calendarId = $CalendarId;
                $Appointmen->email = $email;
                $Appointmen->skipstatusname = 'Core-Prectice';
                $Appointmen->skipdAppointreson = '';

                $Appointmen->appointmentId = $data['Identifier'];
                $Appointmen->title = $data['Title'];
                $Appointmen->Description = $data['Description'];
                $Appointmen->notes = $data['Note'];
                $Appointmen->startTime = $data['Start'];
                $Appointmen->endTime = $data['End'];
                $Appointmen->EventClass = json_encode($data['EventClass']);
                $Appointmen->AppointmentType = $data['AppointmentType'];
                $Appointmen->Attendance = $data['Attendance'];
                $Appointmen->Source = $data['Source'];
                $Appointmen->EnableNotification = $data['EnableNotification'];
                $Appointmen->EnableReminder = $data['EnableReminder'];
                $Appointmen->Sequence = $data['Sequence'];
                $Appointmen->NotificationCount = $data['NotificationCount'];
                $Appointmen->LastNotificationDateUtc = $data['LastNotificationDateUtc'];
                $Appointmen->ReminderCount = $data['ReminderCount'];
                $Appointmen->LastReminderDateUtc = $data['LastReminderDateUtc'];
                $Appointmen->ArrivedTime = $data['ArrivedTime'];
                $Appointmen->WorkBeginTime = $data['WorkBeginTime'];
                $Appointmen->WorkEndTime = $data['WorkEndTime'];
                $Appointmen->ConfirmDate = $data['ConfirmDate'];
                $Appointmen->CancelDate = $data['CancelDate'];
                $Appointmen->TimezoneKey = $data['TimezoneKey'];
                // $Appointmen->HasPrepayment = $data['HasPrepayment'];
                $Appointmen->Patient = json_encode($data['Patient']);
                $Appointmen->Location = json_encode($data['Location']);
                $Appointmen->Provider = json_encode($data['Provider']);
                $Appointmen->EventTags = json_encode($data['EventTags']);
                // $Appointmen->Treatments = json_encode($data['Treatments']);
                // $Appointmen->Messages = json_encode($data['Messages']);
                // $Appointmen->Envelopes = json_encode($data['Envelopes']);

                $Appointmen->save();

                }
                else{

                    $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
                    array(

                            'skipdAppointment' => 1,
                            'skipdAppointment_reson' =>$response ,
                         )
                    );

                }
            }
        }
        // else{
        //   //cunsult 2 calander
        //   $calendarIdCoreCore='wRGLe50MO0Ko1MtiB2-QcQ';

        //      if(isset($apotmenttopatintdetail_core))
        //      {
        //         $email =  $apotmenttopatintdetail_core->email;
        //      }
        //      else{
        //         $email = '';
        //      }
        //     $checkcoreappointment = DB::table('booking_get_appointment')->select('contactId')->where('startTime' ,'=', $ghlstartime)->where('AppointmentType' ,'!=', 2)->where('email' ,'!=', $email)->count();



        //          if($apotmenttopatintdetail_core && $checkcoreappointment == 0)
        //          {
        //           $contactId =  $apotmenttopatintdetail_core->contactId;

        //           /*
        //              $locationId ='xm8F-ELfy0CgMQlh7RGgPg';
        //              $calendarId ='XcKoZsJRFEmWxfFUa6UtgQ';
        //              $ProviderId ='ua0U3JE2dUaK4aWZILQW9w';
        //           */

        //             $locationId = $locationIdCore;
        //             $calendarId = $calendarIdCoreCore;
        //             $ProviderId = $providerIdCore;

        //           $appointmentId = $alldata->appointmentId;
        //           $title = $alldata->title;
        //           $notes = $alldata->notes;


        //               $exampleDate = $alldata->startTime;
        //               $exampleDate = strtotime($exampleDate);
        //               $newDate = date('Y-m-d\TH:i:s', $exampleDate);

        //               $exampleDate1 = $alldata->endTime;
        //               $exampleDate1 = strtotime($exampleDate1);
        //               $newDate1 = date('Y-m-d\TH:i:s', $exampleDate1);


        //               $startTime = $newDate;
        //               $endTime = $newDate1;


        //           $curl = curl_init();

        //           curl_setopt_array($curl, array(
        //             CURLOPT_URL => "$url/appointments",
        //             CURLOPT_RETURNTRANSFER => true,
        //             CURLOPT_ENCODING => '',
        //             CURLOPT_MAXREDIRS => 10,
        //             CURLOPT_TIMEOUT => 0,
        //             CURLOPT_FOLLOWLOCATION => true,
        //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //             CURLOPT_CUSTOMREQUEST => 'POST',
        //             CURLOPT_POSTFIELDS =>'{
        //               "Start": "'.$startTime.'",
        //               "End": "'.$endTime.'",
        //               "CalendarId": "'.$calendarId.'",
        //               "PatientId": "'.$contactId.'",
        //               "LocationId": "'.$locationId.'",
        //               "ProviderId": "'.$ProviderId.'",

        //           }',
        //             CURLOPT_HTTPHEADER => array(
        //               'Content-Type: application/json',
        //               "Authorization: Bearer $accesstoken",
        //               'x-cpapi-version: v2'
        //             ),
        //           ));
        //           // $response = curl_exec($curl);

        //           $err = curl_error($curl);
        //           curl_close($curl);

        //           if ($err) {
        //                  $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
        //                     array(

        //                             'skipdAppointment' => 1,
        //                             'skipdAppointment_reson' =>$err ,
        //                          )
        //                     );
        //             } else {
        //                  $data = json_decode($response,true);
        //                  if(!isset($data['Message']) && $data !='')
        //                 {
        //                 $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
        //                     array(
        //                             'mergestatus' => 1,
        //                             'skipdAppointment' => 0,
        //                          )
        //                     );
        //                 }
        //                 else{

        //                     $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
        //                     array(

        //                              'skipdAppointment' => 1,
        //                              'skipdAppointment_reson' =>$response ,
        //                          )
        //                     );

        //                 }
        //             }
        //         }

        // }

        }
       }else{
          echo 'Go Live Api';
       }


    }

    public function MergeSkipAppointment(Request $request,$id)
    {

       $alldata = GetAppointment::find($id);


        if($alldata){

        $tokekn = GetTokenMod::get()->first();


        if($tokekn)
        {
        $accesstoken = $tokekn->access_token;
        $locationIdCore = $tokekn->locationId;
        $calendarIdCoreCore = $tokekn->calendarId;
        $providerIdCore = $tokekn->providerId;
        $url = $tokekn->liveurl;
        }

        $urlold = config('app.urlc');



            $exampleDate11 = explode(' ',$alldata->startTime);
            $ghlstartime =$exampleDate11[0].'T'.$exampleDate11[1];


           $ghlpatint = DB::table('gohighlevel_allcontacts')->select('email')->where('contactId' ,'=', $alldata->contactId)->first();



          if( $ghlpatint)
          {
              $ghlpatintemail =$ghlpatint->email;


             $apotmenttopatintdetail_core = DB::table('patients_get')->select('contactId')->where('email' ,'=', $ghlpatintemail)->first();
          }
          else{
               $apotmenttopatintdetail_core ='';

          }


           $checkcoreappointment = DB::table('booking_get_appointment')->select('contactId')->where('startTime' ,'=', $ghlstartime)->count();


         if($apotmenttopatintdetail_core && $checkcoreappointment == 0)
         {
            $contactId =  $apotmenttopatintdetail_core->contactId;

           /*
             $locationId ='xm8F-ELfy0CgMQlh7RGgPg';
             $calendarId ='XcKoZsJRFEmWxfFUa6UtgQ';
             $ProviderId ='ua0U3JE2dUaK4aWZILQW9w';

           */

            $locationId = $locationIdCore;
            $calendarId = $calendarIdCoreCore;
            $ProviderId = $providerIdCore;

          $appointmentId = $alldata->appointmentId;
          $title = $alldata->title;
          $notes = $alldata->notes;


              $exampleDate = $alldata->startTime;
              $exampleDate = strtotime($exampleDate);
              $newDate = date('Y-m-d\TH:i:s', $exampleDate);

              $exampleDate1 = $alldata->endTime;
              $exampleDate1 = strtotime($exampleDate1);
              $newDate1 = date('Y-m-d\TH:i:s', $exampleDate1);


              $startTime = $newDate;
              $endTime = $newDate1;


          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/appointments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "Start": "'.$startTime.'",
              "End": "'.$endTime.'",
              "CalendarId": "'.$calendarId.'",
              "PatientId": "'.$contactId.'",
              "LocationId": "'.$locationId.'",
              "ProviderId": "'.$ProviderId.'",

          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              "Authorization: Bearer $accesstoken",
              'x-cpapi-version: v2'
            ),
          ));
          // $response = curl_exec($curl);



          $err = curl_error($curl);
          curl_close($curl);

           if ($err) {
                 $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
                    array(

                            'skipdAppointment' => 1,
                            'skipdAppointment_reson' =>$err ,
                         )
                    );
            } else {
               $data = json_decode($response,true);
                 if(!isset($data['Message']))
                {
                    $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
                        array(
                                'mergestatus' => 1,
                                'skipdAppointment' => 0,
                             )
                        );
                }
                else{

                     $savedata = DB::table('gohighlevel_appointments')->where('id',$alldata->id)->update(
                    array(

                            'skipdAppointment' => 1,
                            'skipdAppointment_reson' =>$response ,
                         )
                    );
                }
            }
        }

        }

    }

}
