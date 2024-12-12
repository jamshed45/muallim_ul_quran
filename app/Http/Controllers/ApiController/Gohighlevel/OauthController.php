<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Http;
use Illuminate\Support\facades\DB;
use App\Models\Api\GetTokenMod;
use App\Models\Api\Gohilevelmodel\Authoriz;

class OauthController extends Controller
{

    public function GhlToken()
    {
        $tokekn = Authoriz::get();
        $refreshtoken = $tokekn[0]['refresh_token'];
        $url = $tokekn[0]['liveurl'];
        $status = $tokekn[0]['livestatus'];

        $urlenv = config('app.urls');
        $clientId = config('app.clientidghl');
        $clientsecreat = config('app.clientsecreatghl');


            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "client_id=$clientId&client_secret=$clientsecreat&grant_type=refresh_token&refresh_token=$refreshtoken&user_type=Company",

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer',
            ),
            ));

            // $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $datavalue = json_decode($response);

           $access_token = $datavalue->access_token;
           $refresh_token = $datavalue->refresh_token;
           $locationId = $datavalue->locationId;
           $companyId = $datavalue->companyId;
           $userId = $datavalue->userId;

          $savedata = Authoriz::where('id',1)->update(
            array(
                    'access_token' => $access_token,
                    'refresh_token' => $refresh_token,
                    'locationId' => $locationId,
                    'companyId' => $companyId,
                    'userId' => $userId,
                    'updated_at'=> date('Y-m-d H:i:s'),
                 )
            );

    }

     public function apiLiveDataupdate(Request $request,$id)
    {
        $liveData = Authoriz::find($id);
        $liveData->userId = $request->userId;
        $liveData->companyId = $request->companyId;
        $liveData->locationId = $request->locationId;
        $liveData->liveurl = $request->liveurl;
        $liveData->save();

      return redirect()->route('GhlApiSetting')->with('message','Data Edit Successfully');

    }

    public function ApiStatus($id)
    {

       $liveData = Authoriz::find($id);
       $status = $liveData->livestatus;

       if($status == 0)
       {
         $liveData->livestatus = 1;
        //  $liveData->liveurl = 'https://stoplight.io/mocks/highlevel/integrations/39582856';
       }else{
        $liveData->livestatus = 0;
        // $liveData->liveurl = 'https://services.leadconnectorhq.com';

       }
       $liveData->save();
       return redirect()->route('GhlApiSetting');

    }

    public function AllApiDeactive()
    {
            $liveDatas = Authoriz::get();
            $liveData = $liveDatas[0];
            $status = $liveData->livestatus;

           if($status == 0)
           {
             $liveData->livestatus = 1;
            //  $liveData->liveurl = 'https://stoplight.io/mocks/highlevel/integrations/39582856';

           }else{
            $liveData->livestatus = 0;
            // $liveData->liveurl = 'https://services.leadconnectorhq.com';
           }
            $liveData->save();

               $liveDataCore = GetTokenMod::get();
               $CoreliveData = $liveDataCore[0];
               $statusId = $CoreliveData->livestatus;

               if($statusId == 0)
               {
                $CoreliveData->livestatus = 1;
                // $CoreliveData->liveurl = 'https://sandbox.corepractice.is/api';
               }else{
                $CoreliveData->livestatus = 0;
                // $CoreliveData->liveurl = 'https://tso.corepractice.is/api';
               }
               $CoreliveData->save();
               return redirect()->back()->with('message','Api Updated Successfully..');
    }


}
