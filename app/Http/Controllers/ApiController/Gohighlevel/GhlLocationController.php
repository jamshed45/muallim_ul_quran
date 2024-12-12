<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\LocationGet;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\Gohilevelmodel\Authoriz;



class GhlLocationController extends Controller
{
    public function GetLocation()
    {

      $tokekn = Authoriz::get()->first();
      $accesstoken = $tokekn->access_token;
      $locationId = $tokekn->locationId;
      $url = $tokekn->liveurl;

      $urlenv = config('app.urls');

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "$url/locations/search?companyId=S7yLvs6RYXhzDCRvst68",
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

        $respo = json_decode($response,true);



         $result = $respo['location'];
        //  dd($result);
              $locationid = $result['id'];
              $companyId = $result['companyId'];
              $name = $result['name'];
              $firstName = $result['firstName'];
              $lastName = $result['lastName'];
              $email = $result['email'];
              $phone = $result['phone'];
              $address = $result['address'];
              $city = $result['city'];
              $state = $result['state'];
              $country = $result['country'];
              $postalCode = $result['postalCode'];
              $domain = $result['domain'];
              $timezone = $result['timezone'];
              $social = $result['social'];
              $settings = $result['settings'];
              $dateAdded = $result['dateAdded'];
              $automaticMobileAppInvite = $result['automaticMobileAppInvite'];

                 $validator = Validator::make($result,[
                'id' => 'required|unique:gohighlevel__location,locationid',

            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();

            } else {

              $data = new LocationGet();
              $data->locationid = $locationid;
              $data->companyId = $companyId;
              $data->name = $name;
              $data->firstName = $firstName;
              $data->lastName = $lastName;
              $data->address = $address;
              $data->city = $city;
              $data->state = $state;
              $data->country = $country;
              $data->postalCode = $postalCode;
              $data->domain = $domain;
              $data->timezone = $timezone;
              $data->email = $email;
              $data->phone = $phone;
              $data->automaticMobileAppInvite = $automaticMobileAppInvite;
              $data->social = json_encode($social);
              $data->settings = json_encode($settings);
              $data->save();

            }

        }

    }

}
