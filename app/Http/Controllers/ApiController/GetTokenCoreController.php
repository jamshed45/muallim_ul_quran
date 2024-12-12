<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\GetTokenMod;


class GetTokenCoreController extends Controller
{
    public function GetCoreToken()
    {
        $tokekn = GetTokenMod::get()->first();
        $refreshtoken = $tokekn->refresh_token;
        $url = $tokekn->liveurl;
        $status = $tokekn->livestatus;


        $urlenv = config('app.urlc');


        $clientId = config('app.clientidcore');
        $clientsecreat = config('app.clientsecreat');


            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/v2/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "grant_type=refresh_token&client_id=$clientId&client_secret=$clientsecreat&refresh_token=$refreshtoken",
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            // $response = curl_exec($curl);


            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
              }
              $datavalue = json_decode($response,true);


              if(!isset($data['error']))
              {
                $access_token = $datavalue['access_token'];
                $refresh_token = $datavalue['refresh_token'];
                $savedata = GetTokenMod::where('id',1)->get()->first();
                            $savedata->access_token = $access_token;
                            $savedata->refresh_token = $refresh_token;
                            $savedata->updated_at = date('Y-m-d H:i:s');
                            $savedata->save();

              }else{
                return response()->json([
                    'message'=>'Token Not Getting..',
                    'status'=>'0'
                ]);
              }


    }

     public function apiLiveupdate(Request $request,$id)
     {
        $liveData = GetTokenMod::find($id);
        $liveData->calendarId = $request->calendarId;
        $liveData->locationId = $request->locationId;
        $liveData->providerId = $request->providerId;
        $liveData->liveurl = $request->liveurl;
        $liveData->save();

      return redirect()->route('CoreApiSetting')->with('message','Data Edit Successfully');
     }

      public function ApiStatus($id)
    {

       $liveData = GetTokenMod::find($id);
       $status = $liveData->livestatus;

       if($status == 0)
       {
         $liveData->livestatus = 1;
        //  $liveData->liveurl = 'https://sandbox.corepractice.is/api';
       }else{
        $liveData->livestatus = 0;
        // $liveData->liveurl = 'https://tso.corepractice.is/api';

       }
       $liveData->save();
       return redirect()->route('CoreApiSetting');

    }




}
