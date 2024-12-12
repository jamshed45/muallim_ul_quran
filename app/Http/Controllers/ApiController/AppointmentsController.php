<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\GetAppointmentModel;
use App\Models\Api\UserLocationsModel;
use App\Models\Api\GetTokenMod;
use App\Models\Api\CoreLocationAppointments;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Validator;
use DB;

class AppointmentsController extends Controller
{
    public function GetAppointment()
    {
        $tokekn = GetTokenMod::get()->first();
        $accesstoken = $tokekn->access_token;
        $corlocationId = $tokekn->locationId;
        $calendarId = $tokekn->calendarId;
        $url = $tokekn->liveurl;
        $status = $tokekn->livestatus;
        $urlenv = config('app.urlc');

         if($status == 0)
       {

      //$allcalendarscore = DB::table('authorization_token_core')->select('*')->get();


         $allIdcalenders =$calendarId;

        $urlenv = config('app.urlc');

        $GetAppoin = UserLocationsModel::get();


          $startdate = date('Y-m-d');
          $enddate=date('Y-m-d', strtotime('+1 year', strtotime($startdate)));


        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "$url/appointments/book/$allIdcalenders/?start=$startdate&end=$enddate",
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


        $datavalues = json_decode($response,true);



        if($datavalues){

        foreach($datavalues as $data )
        {
            $EventClass = [];
            $Patient = [];
            $Location = [];
            $Provider = [];
            $Calendar = [];
            $EventTags = [];
            $Treatments = [];
            $Messages = [];
            $Envelopes = [];

        $appointmentId = $data['Identifier'];
        $Title = $data['Title'];
        $Description = $data['Description'];
        $Note = $data['Note'];
        $Start = $data['Start'];
        $End = $data['End'];
        $EventClass = $data['EventClass'];
        $AppointmentType = $data['AppointmentType'];
        $Attendance = $data['Attendance'];
        $Source = $data['Source'];
        $EnableNotification = $data['EnableNotification'];
        $EnableReminder = $data['EnableReminder'];
        $Sequence = $data['Sequence'];
        $NotificationCount = $data['NotificationCount'];
        $LastNotificationDateUtc = $data['LastNotificationDateUtc'];
        $ReminderCount = $data['ReminderCount'];
        $LastReminderDateUtc = $data['LastReminderDateUtc'];
        $ArrivedTime = $data['ArrivedTime'];
        $WorkBeginTime = $data['WorkBeginTime'];
        $WorkEndTime = $data['WorkEndTime'];
        $ConfirmDate = $data['ConfirmDate'];
        $CancelDate = $data['CancelDate'];
        $TimezoneKey = $data['TimezoneKey'];
        // $HasPrepayment = $data['HasPrepayment'];
        $Patient = $data['Patient'];
        $Location = $data['Location'];
        $Provider = $data['Provider'];
        $Calendar = $data['Calendar'];
        $OnlineAppointment = $data['OnlineAppointment'];
        $EventTags = $data['EventTags'];
        // $Treatments = $data['Treatments'];
        // $Messages = $data['Messages'];
        // $Envelopes = $data['Envelopes'];


         $email =  $Patient['Email'];

           $validator = Validator::make($data,[
                        'Identifier' => 'required|unique:booking_get_appointment,appointmentId',

                     ]);


                     if ($validator->fails()) {

                          $getappointmentcore = DB::table('booking_get_appointment')->select('appointmentId','AppointmentType','Attendance','startTime','endTime')->where('appointmentId' ,'=', $appointmentId)->first();



                          $AppointmentTypedb=$getappointmentcore->AppointmentType;
                          $Attendancedb=$getappointmentcore->Attendance;
                          $Startdb=$getappointmentcore->startTime;
                          $Enddb=$getappointmentcore->endTime;


                          if($AppointmentTypedb != $AppointmentType || $Attendancedb != $Attendance || $Startdb != $Start || $Enddb != $End)
                          {

                                 $updateContact = DB::table('booking_get_appointment')->where('appointmentId','=',$appointmentId)
                                    ->update([
                                      'startTime' => $Start,
                                      'endTime' => $End,
                                      'AppointmentType' => $AppointmentType,
                                      'Attendance' => $Attendance,
                                      'Source' => $Source,
                                      'mergestatus'=>0,
                                      'updatestatus'=>1,
                                      'created_at'=>date('Y-m-d H:i:s'),

                                        ]);


                           }

                     } else {

       $Appointmen = new GetAppointmentModel();

       $Appointmen->appointmentId = $appointmentId;
       $Appointmen->Title = $Title;
       $Appointmen->email = $email;
       $Appointmen->Description = $Description;
       $Appointmen->notes = $Note;
       $Appointmen->startTime = $Start;
       $Appointmen->endTime = $End;
       $Appointmen->EventClass = json_encode($EventClass);
       $Appointmen->AppointmentType = $AppointmentType;
       $Appointmen->Attendance = $Attendance;
       $Appointmen->Source = $Source;
       $Appointmen->EnableNotification = $EnableNotification;
       $Appointmen->EnableReminder = $EnableReminder;
       $Appointmen->Sequence = $Sequence;
       $Appointmen->NotificationCount = $NotificationCount;
       $Appointmen->LastNotificationDateUtc = $LastNotificationDateUtc;
       $Appointmen->ReminderCount = $ReminderCount;
       $Appointmen->LastReminderDateUtc = $LastReminderDateUtc;
       $Appointmen->ArrivedTime = $ArrivedTime;
       $Appointmen->WorkBeginTime = $WorkBeginTime;
       $Appointmen->WorkEndTime = $WorkEndTime;
       $Appointmen->ConfirmDate = $ConfirmDate;
       $Appointmen->CancelDate = $CancelDate;
       $Appointmen->TimezoneKey = $TimezoneKey;
    //    $Appointmen->HasPrepayment = $HasPrepayment;
       $Appointmen->Patient = json_encode($Patient);
       $Appointmen->Location = json_encode($Location);
       $Appointmen->Provider = json_encode($Provider);
       $Appointmen->calendarId = $allIdcalenders;
    //    $Appointmen->OnlineAppointment = $OnlineAppointment;
       $Appointmen->EventTags = json_encode($EventTags);
    //    $Appointmen->Treatments = json_encode($Treatments);
    //    $Appointmen->Messages = json_encode($Messages);
    //    $Appointmen->Envelopes = json_encode($Envelopes);
       $Appointmen->save();
       }
       }

     }


       }else{
          echo 'Go Live Api';
       }

    }


}
