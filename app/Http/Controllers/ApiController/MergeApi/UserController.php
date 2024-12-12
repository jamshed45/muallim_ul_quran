<?php

namespace App\Http\Controllers\ApiController\MergeApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\UserModel;
use App\Models\Api\Gohilevelmodel\GoHighLevelUserGet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Api\Gohilevelmodel\Authoriz;

class UserController extends Controller
{
    public function MergeUser()
    {
         $userco =  DB::table('users')->select('userId','name','firstname','lastname','email','phone','roles','permissions','extension','created_at')->get();
        //  $ghluser[] = DB::table('gohighlevel_user_get')->select('userId','name','firstName','lastName','email','permissions','extension','phone','roles','created_at')->get();

           $urlold = config('app.urls');
             $UserModel = UserModel::get();
             foreach($UserModel as $coreuser)
             {
                $userId = $coreuser->userId;
                $name  = $coreuser->name ;
                $firstname = $coreuser->firstname;
                $lastname = $coreuser->lastname;
                $email = $coreuser->email;
                $phone = $coreuser->phone;
                $mobile = $coreuser->mobile;
                $roles = $coreuser->roles;
                $rol = json_decode($roles);
                $GroupName = $rol[0]->GroupName;

                // $location = $coreuser->location;
                // $locat = json_decode($location);
                // dd($locat);
                // $locatIdentifier = $locat->Identifier;

                $calendars = $coreuser->calendars;
             }

        // $output = array_merge($userco, $ghluser);

        $Authoriz =  Authoriz::get();
        $accesstoken = $Authoriz[0];
        $tokenBearer = $accesstoken->access_token;
        $url = $accesstoken->liveurl;

        // foreach($output as $data)
        // {
        //   echo '<pre>';
        //   print_r($data);
        // }

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "$url/39582858/users/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode([
            'companyId' => 'l1C08ntBrFjLS0elLIYU',
            'firstName' => $firstname,
            'lastName' => $lastname,
            'email' => $email,
            'password' => '123456dfg525',
            'phone' => $phone,
            'type' => 'account',
            'role' => $GroupName,
            'locationIds' => [
                'l1C08ntBrFjLS0elLIYU'
            ],
            'permissions' => [
                'campaignsEnabled' => null,
                'campaignsReadOnly' => null,
                'contactsEnabled' => null,
                'workflowsEnabled' => null,
                'workflowsReadOnly' => null,
                'triggersEnabled' => null,
                'funnelsEnabled' => null,
                'websitesEnabled' => null,
                'opportunitiesEnabled' => null,
                'dashboardStatsEnabled' => null,
                'bulkRequestsEnabled' => null,
                'appointmentsEnabled' => null,
                'reviewsEnabled' => null,
                'onlineListingsEnabled' => null,
                'phoneCallEnabled' => null,
                'conversationsEnabled' => null,
                'assignedDataOnly' => null,
                'adwordsReportingEnabled' => null,
                'membershipEnabled' => null,
                'facebookAdsReportingEnabled' => null,
                'attributionsReportingEnabled' => null,
                'settingsEnabled' => null,
                'tagsEnabled' => null,
                'leadValueEnabled' => null,
                'marketingEnabled' => null,
                'agentReportingEnabled' => null,
                'botService' => null,
                'socialPlanner' => null,
                'bloggingEnabled' => null,
                'invoiceEnabled' => null,
                'affiliateManagerEnabled' => null,
                'contentAiEnabled' => null,
                'refundsEnabled' => null,
                'recordPaymentEnabled' => null,
                'cancelSubscriptionEnabled' => null,
                'paymentsEnabled' => null
            ],

          ]),
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Bearer $tokenBearer",
            "Content-Type: application/json",
            "Version: 2021-07-28"
          ],
        ]);

        // $response = curl_exec($curl);
        print_r($response); die();
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}
