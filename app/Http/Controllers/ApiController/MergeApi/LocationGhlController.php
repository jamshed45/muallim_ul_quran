<?php

namespace App\Http\Controllers\ApiController\MergeApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\UserLocationsModel;
use App\Models\Api\Gohilevelmodel\LocationGet;
use App\Models\Api\Gohilevelmodel\Authoriz;

class LocationGhlController extends Controller
{
    public function MergeLocation()
    {
      // $ghllocation = LocationGet::select('state','phone','name','email','address','country','website','logoUrl')->get();
         $userlocation = UserLocationsModel::select('state','phone','email','name','address','country','website','logoUrl')->get();

        $Authoriz =  Authoriz::get();
        $accesstoken = $Authoriz[0];
        $tokenBearer = $accesstoken->access_token;
        $url = $accesstoken->liveurl;
        $urlold = config('app.urls');

        foreach($userlocation as $alldata)
        {
            $state = $alldata->state;
            $phone = $alldata->phone;
            $email = $alldata->email;
            $name = $alldata->name;
            $address = $alldata->address;
            $country = $alldata->country;
            $website = $alldata->website;
            $logoUrl = $alldata->logoUrl;
            $LocationGet = LocationGet::get();
            foreach($LocationGet as $location)
            {
              $locationGhl = $location->locationid;
                $curl = curl_init();

                curl_setopt_array($curl, [
                CURLOPT_URL => "$url/39582857/locations/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'name' => $name,
                    'phone' => $phone,
                    'companyId' => 'hunny.professional+1@gmail.com',
                    // 'address' => '4th fleet street',
                    // 'city' => 'indore',
                    // 'state' => 'mp',
                    // 'country' => 'india',
                    // 'postalCode' => '567635',
                    // 'website' => 'https://yourwebsite.com',
                    // 'timezone' => 'US/Central',
                    'prospectInfo' => [
                        'firstName' => 'manish',
                        'lastName' => 'farkya',
                        'email' => 'farkyamanish@gmail.com'
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
                $err = curl_error($curl);

                print_r($response); die;
                curl_close($curl);

                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                dd($response);
                }
            }
            }

    }
}
