<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\CompanyGetGhl;
use App\Models\Api\Gohilevelmodel\Authoriz;
use App\Models\Api\Gohilevelmodel\getOpportunity;
use Illuminate\Support\Facades\Validator;


class GhlOpportunity extends Controller
{
    public function GetOpportunity()
    {

        $tokekn = Authoriz::get()->first();
        $accesstoken = $tokekn->access_token;
        $locationId = $tokekn->locationId;
        $url = $tokekn->liveurl;

        $urlenv = config('app.urls');
            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "$url/opportunities/search?location_id=$locationId",
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

                $decode = json_decode($response,true);

                foreach($decode['opportunities'] as $opportuniti)
                {

                    $id = $opportuniti['id'];
                    $name = $opportuniti['name'];
                    $monetaryValue = $opportuniti['monetaryValue'];
                    $pipelineId = $opportuniti['pipelineId'];
                    $pipelineStageId = $opportuniti['pipelineStageId'];
                    $pipelineStageUId = $opportuniti['pipelineStageUId'];
                    $status = $opportuniti['status'];
                    $source = $opportuniti['source'];
                    $lastStatusChangeAt = $opportuniti['lastStatusChangeAt'];
                    $lastStageChangeAt = $opportuniti['lastStageChangeAt'];
                    $createdAt = $opportuniti['createdAt'];
                    $updatedAt = $opportuniti['updatedAt'];
                    $contactId = $opportuniti['contactId'];
                    $locationId = $opportuniti['locationId'];
                    $customFields = $opportuniti['customFields'];
                    $lostReasonId = $opportuniti['lostReasonId'];
                    $followers = $opportuniti['followers'];
                    $contact = $opportuniti['contact'];

                   $validator = Validator::make($opportuniti,[
                        'id' => 'required|unique:gohighlevel_opportunity,opportunitie_id',
                       ]);

                       if ($validator->fails()) {
                        $errors = $validator->errors();

                    } else {

                   $opportunityGet = new getOpportunity();
                    $opportunityGet->opportunitie_id = $id;
                    $opportunityGet->name = $name;
                    $opportunityGet->monetaryValue = $monetaryValue;
                    $opportunityGet->pipelineId = $pipelineId;
                    $opportunityGet->pipelineStageId = $pipelineStageId;
                    $opportunityGet->pipelineStageUId = $pipelineStageUId;
                    $opportunityGet->status = $status;
                    $opportunityGet->source = $source;
                    $opportunityGet->lastStatusChangeAt = $lastStatusChangeAt;
                    $opportunityGet->lastStageChangeAt = $lastStageChangeAt;
                    $opportunityGet->createdAt = $createdAt;
                    $opportunityGet->updatedAt = $updatedAt;
                    $opportunityGet->contactId = $contactId;
                    $opportunityGet->locationId = $locationId;
                    $opportunityGet->lostReasonId = $lostReasonId;
                    $opportunityGet->customFields = json_encode($customFields);
                    $opportunityGet->followers = json_encode($followers);
                    $opportunityGet->contact = json_encode($contact);
                    $opportunityGet->save();
                    }

                }
            }
    }
}
