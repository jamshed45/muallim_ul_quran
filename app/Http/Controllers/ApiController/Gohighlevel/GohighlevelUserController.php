<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\GoHighLevelUserGet;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\Gohilevelmodel\Authoriz;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class GohighlevelUserController extends Controller
{
    public function GetUser()
    {

      $tokekn = Authoriz::get()->first();
       $accesstoken = $tokekn->access_token;
       $locationId = $tokekn->locationId;
       $url = $tokekn->liveurl;
       $status = $tokekn->livestatus;


       if($status == 0)
       {

       $urlold = config('app.urls');

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "$url/users/?locationId=$locationId",
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
            $result=[];
            $result = json_decode($response,true);

            foreach($result['users'] as $respon)
            {
            $permissions = [];
            $roles = [];

                   $userId = $respon['id'];
                   $name = $respon['name'];
                   $firstName = $respon['firstName'];
                   $lastName = $respon['lastName'];
                   $email = $respon['email'];
                   if(isset($respon['phone'])){
                    $phone = $respon['phone'];
                   }else{
                    $phone = '';
                   }
                   if(isset($respon['extension'])){
                    $extension = $respon['extension'];
                   }else{
                    $extension = '';
                   }
                  //  $extension = $respon['extension'];
                   $permissions = $respon['permissions'];
                   $roles = $respon['roles'];
                  $type = $roles['type'];
                  $role = $roles['role'];
                  $locationIds = $roles['locationIds'][0];

                  $validator = Validator::make($respon,[
                  'email' => 'required|email|unique:gohighlevel_user_get,email',
                 ]);

                 if ($validator->fails()) {
                  $errors = $validator->errors();
              } else {
                    $data = new GoHighLevelUserGet();
                    $data->userId = $userId;
                    $data->name = $name;
                    $data->firstName = $firstName;
                    $data->lastName = $lastName;
                    $data->email = $email;
                    $data->phone = $phone;
                    $data->extension = $extension;
                    $data->permissions = json_encode($permissions);
                    $data->type = $type;
                    $data->role = $role;
                    $data->locationIdsRole = $locationIds;
                    $data->roles = json_encode($roles);
                    $password = Str::random(10);
                    $data->passwordShow = $password;
                    $data->password = Hash::make($password);
                    $data->save();
                  }
           } //data save?
          }
       }else{
          echo 'Go Live Api';
       }

    }

}
