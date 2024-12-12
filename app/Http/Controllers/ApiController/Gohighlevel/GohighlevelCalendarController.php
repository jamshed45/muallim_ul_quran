<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GoHighLevelCalendarGet;
use App\Models\Api\Gohilevelmodel\Authoriz;
use App\Models\Api\Gohilevelmodel\LocationGet;
use Illuminate\Support\Facades\Validator;

class GohighlevelCalendarController extends Controller
{

    public function GetCalender(Request $request)
    {
        $tokekn = Authoriz::get()->first();
        $accesstoken = $tokekn->access_token;
        $locationId = $tokekn->locationId;
        $url = $tokekn->liveurl;
        $data = LocationGet::get();
        $urlenv = config('app.urls');

            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "$url/calendars/?locationId=$locationId",
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

               $aary = json_decode($response,true);

                // $notifications =[];
                // $teamMembers = [];
                $eventTitle = [];
                $openHours = [];
                // $recurring = [];
                $availabilities = [];
                foreach($aary['calendars'] as $respon)
                {

                    $calendar_id = $respon['id'];
                    $locationId = $respon['locationId'];
                    $name = $respon['name'];
                    $description = $respon['description'];
                    $widgetSlug = $respon['widgetSlug'];
                    $calendarType = $respon['calendarType'];
                    $eventTitle = $respon['eventTitle'];
                    $eventColor = $respon['eventColor'];
                    $meetingLocation = $respon['meetingLocation'];
                    $slotDuration = $respon['slotDuration'];
                    $slotInterval = $respon['slotInterval'];
                    $appoinmentPerSlot = $respon['appoinmentPerSlot'];
                    $openHours = $respon['openHours'];
                    $autoConfirm = $respon['autoConfirm'];
                    $googleInvitationEmails = $respon['googleInvitationEmails'];
                    $allowReschedule = $respon['allowReschedule'];
                    $allowCancellation = $respon['allowCancellation'];
                    $formSubmitType = $respon['formSubmitType'];
                    $formSubmitThanksMessage = $respon['formSubmitThanksMessage'];
                    $availabilities = $respon['availabilities'];
                    $consentLabel = $respon['consentLabel'];
                    // $enableRecurring = $respon['enableRecurring'];
                     // $appoinmentPerDay = $respon['appoinmentPerDay'];
                    // $slotBuffer = $respon['slotBuffer'];
                    // $notifications[] = json_encode($respon['notifications']);
                    // $groupId = $respon['groupId'];
                    // $teamMembers = $respon['teamMembers'];
                    // $eventType = $respon['eventType'];
                    // $slug = $respon['slug'];
                    // $widgetType = $respon['widgetType'];
                    // $recurring = $respon['recurring'];
                    // $formId = $respon['formId'];
                    // $stickyContact = $respon['stickyContact'];
                    // $isLivePaymentMode = $respon['isLivePaymentMode'];
                    // $shouldSendAlertEmailsToAssignedMember = $respon['shouldSendAlertEmailsToAssignedMember'];
                    // $alertEmail = $respon['alertEmail'];
                    // $shouldAssignContactToTeamMember = $respon['shouldAssignContactToTeamMember'];
                    // $shouldSkipAssigningContactForExisting = $respon['shouldSkipAssigningContactForExisting'];
                    // $notes = $respon['notes'];
                    // $pixelId = $respon['pixelId'];
                    // $formSubmitRedirectURL = $respon['formSubmitRedirectURL'];
                    // $availabilityType = $respon['availabilityType'];
                    // $guestType = $respon['guestType'];
                    // $calendarCoverImage = $respon['calendarCoverImage'];

                       $validator = Validator::make($respon,[
                        'id' => 'required|unique:gohighlevel_calendars_get,calendar_id',
                       ]);

                       if ($validator->fails()) {
                        $errors = $validator->errors();

                    } else {
                    $data = new GoHighLevelCalendarGet;
                    $data->calendar_id = $calendar_id;
                    $data->locationId = $locationId;
                    $data->name = $name;
                    $data->description = $description;
                    $data->widgetSlug = $widgetSlug;
                    $data->calendarType = $calendarType;
                    $data->eventTitle = json_encode($eventTitle);
                    $data->eventColor = $eventColor;
                    $data->meetingLocation = $meetingLocation;
                    $data->slotDuration = $slotDuration;
                    $data->slotInterval = $slotInterval;
                    $data->appoinmentPerSlot = $appoinmentPerSlot;
                    $data->openHours = json_encode($openHours);
                    $data->autoConfirm = $autoConfirm;
                    $data->googleInvitationEmails = $googleInvitationEmails;
                    $data->allowReschedule = $allowReschedule;
                    $data->allowCancellation = $allowCancellation;
                    $data->formSubmitType = $formSubmitType;
                    $data->formSubmitThanksMessage = $formSubmitThanksMessage;
                    $data->availabilities = json_encode($availabilities);
                    $data->consentLabel = $consentLabel;
                    // $data->teamMembers = json_encode($teamMembers);
                     // $data->appoinmentPerDay = $appoinmentPerDay;
                     // $data->notifications = json_encode($notifications);
                    // $data->slotBuffer = $slotBuffer;
                    // $data->enableRecurring = $enableRecurring;
                    // $data->recurring = json_encode($recurring);
                    // $data->eventType = $eventType;
                    // $data->groupId = $groupId;
                    // $data->widgetType = $widgetType;
                    // $data->slug = $slug;
                    // $data->formId = $formId;
                    // $data->stickyContact = $stickyContact;
                    // $data->isLivePaymentMode = $isLivePaymentMode;
                    // $data->shouldSendAlertEmailsToAssignedMember = $shouldSendAlertEmailsToAssignedMember;
                    // $data->alertEmail = $alertEmail;
                    // $data->shouldAssignContactToTeamMember = $shouldAssignContactToTeamMember;
                    // $data->shouldSkipAssigningContactForExisting = $shouldSkipAssigningContactForExisting;
                    // $data->notes = $notes;
                    // $data->pixelId = $pixelId;
                    // $data->formSubmitRedirectURL = $formSubmitRedirectURL;
                    // $data->availabilityType = $availabilityType;
                    // $data->calendarCoverImage = $calendarCoverImage;
                    // $data->guestType = $guestType;
                    $data->save();
                    }

            }


        }
     }


}
