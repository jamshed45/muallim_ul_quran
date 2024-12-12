<?php

namespace App\Http\Controllers\ApiController\MergeApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GetContactModel;
use App\Models\Api\GetPatientModel;
use App\Models\Api\Gohilevelmodel\Authoriz;
use Illuminate\Support\Facades\DB;
use App\Models\Api\Gohilevelmodel\LocationGet;
use Carbon\Carbon;
class ContactController extends Controller
{

    public function MergePatientContect()
    {
             $GetPatient = DB::table('patients_get')->select('*')->where('created_at','>=', Carbon::now()->subDays(30)->toDateTimeString())->get();
            //$GetPatient = GetPatientModel::get();
              $Authoriz =  Authoriz::get();
              $accesstoken = $Authoriz[0];
              $tokenBearer = $accesstoken->access_token;
              $locationId = $accesstoken->locationId;
              $url = $accesstoken->liveurl;
              $status = $accesstoken->livestatus;


       if($status == 0)
       {

              foreach($GetPatient as $patient)
              {

             $checkemailinghl = DB::table('gohighlevel_allcontacts')->where('email','=',$patient->email)->count();



               if($checkemailinghl == 0)
               {
                   //echo $patient->email.''.$checkemailinghl;die;

                $firstName = $patient->firstname;
                $lastName = $patient->lastname;
                $phone = $patient->phone;
                $email = $patient->email;
                $dateOfBirth = $patient->DateOfBirth;
                $address1 = $patient->address1;
                $State = $patient->State;
                $Postcode = $patient->Postcode;
                $Sex = $patient->Sex;
                $CompanyName = $patient->CompanyName;
              if($dateOfBirth)
              {
                list($y, $m, $d) = explode('-', $dateOfBirth);
              }else{
                $y ='';
                $m ='';
                $d ='';
              }
               $name = $firstName;
               $urlold = config('app.urls');
               $LocationGet = LocationGet::get();

                $curl = curl_init();
                curl_setopt_array($curl, [
                  CURLOPT_URL => "$url/contacts/",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'name' => $name,
                    'email' => $email,
                    'locationId' =>  $locationId,
                    'gender' => $Sex,
                    'phone' =>  $phone,
                    'address1' => $address1,
                    'state' => $State,
                    'postalCode' => $Postcode,
                    'dateOfBirth' => $dateOfBirth,
                    'companyName' => $CompanyName,
                  ]),

                  CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Authorization: Bearer $tokenBearer",
                    "Content-Type: application/json",
                    "Version: 2021-07-28"
                  ],
                ]);
                // $response = curl_exec($curl);


                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  $respons = json_decode($response);

                }
              }

            }
       }else{
          echo 'Go Live Api';
       }


    }
}
