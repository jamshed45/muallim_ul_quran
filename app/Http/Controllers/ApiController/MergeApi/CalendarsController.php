<?php

namespace App\Http\Controllers\ApiController\MergeApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\UserCalendarModel;
use App\Models\Api\Gohilevelmodel\GoHighLevelCalendarGet;
use Illuminate\Support\Facades\DB;
use App\Models\Api\Gohilevelmodel\Authoriz;

class CalendarsController extends Controller
{
    public function MergeCalendar()
    {
        // $ghldata = GoHighLevelCalendarGet::select('locationId','calendarType','description','name','created_at')->get();
        $usercalen = UserCalendarModel::select('calendarid','calendarType','description','name','created_at')->get();

        $Authoriz =  Authoriz::get();
        $accesstoken = $Authoriz[0];
        $tokenBearer = $accesstoken->access_token;
        $url = $accesstoken->liveurl;

        $urlold = config('app.urls');

        // foreach($usercalen as $alldata)
        // {
        //     echo '<pre>';
        //     print_r($alldata);
        // }

                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "$url/39582850/calendars/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'notifications' => [
                        [
                                'type' => 'email',
                                'shouldSendToContact' => null,
                                'shouldSendToGuest' => null,
                                'shouldSendToUser' => null,
                                'shouldSendToSelectedUsers' => null,
                                'selectedUsers' => 'avi@email.com,user2@testemail.com'
                        ]
                    ],
                    'locationId' => 'ocQHyuzHvysMo5N5Vs',
                    'groupId' => 'BqTwX8QFwXzpegMve9EQ',
                    'teamMembers' => [
                        [
                                'userId' => 'ocQHyuzHvysMo5N5VsXc',
                                'priority' => 0.5,
                                'meetingLocationType' => 'custom',
                                'meetingLocation' => 'string'
                        ]
                    ],
                    'eventType' => 'RoundRobin_OptimizeForAvailability',
                    'name' => 'test calendar',
                    'description' => 'this is used for testing',
                    'slug' => 'test1',
                    'widgetSlug' => 'test1',
                    'calendarType' => 'round_robin',
                    'widgetType' => 'classic',
                    'eventTitle' => '{{contact.name}}',
                    'eventColor' => '#039be5',
                    'meetingLocation' => 'string',
                    'slotDuration' => 30,
                    'slotInterval' => 30,
                    'slotBuffer' => 0,
                    'appoinmentPerSlot' => 1,
                    'appoinmentPerDay' => 0,
                    'openHours' => [
                        [
                                'daysOfTheWeek' => [
                                                0
                                ],
                                'hours' => [
                                                [
                                             'openHour' => 0,
                                             'openMinute' => 0,
                                             'closeHour' => 0,
                                              'closeMinute' => 0
                                                ]
                                ]
                        ]
                    ],
                    'enableRecurring' => null,
                    'recurring' => [

                    ],
                    'formId' => 'string',
                    'stickyContact' => null,
                    'isLivePaymentMode' => null,
                    'autoConfirm' => null,
                    'shouldSendAlertEmailsToAssignedMember' => null,
                    'alertEmail' => 'string',
                    'googleInvitationEmails' => null,
                    'allowReschedule' => null,
                    'allowCancellation' => null,
                    'shouldAssignContactToTeamMember' => null,
                    'shouldSkipAssigningContactForExisting' => null,
                    'notes' => 'string',
                    'pixelId' => 'string',
                    'formSubmitType' => 'ThankYouMessage',
                    'formSubmitRedirectURL' => 'string',
                    'formSubmitThanksMessage' => 'string',
                    'availabilityType' => 0,
                    'availabilities' => [
                        [
                                'id' => 'string',
                                'date' => '2023-09-24T00:00:00.000Z',
                                'hours' => [
                                                [
                                              'openHour' => 0,
                                              'openMinute' => 0,
                                              'closeHour' => 0,
                                              'closeMinute' => 0
                                                ]
                                ],
                                'deleted' => null
                        ]
                    ],
                    'guestType' => 'count_only',
                    'consentLabel' => 'string',
                    'calendarCoverImage' => 'https://path-to-image.com'
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
                dd($response);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                    $respons = json_decode($response);

                }

    }
}
