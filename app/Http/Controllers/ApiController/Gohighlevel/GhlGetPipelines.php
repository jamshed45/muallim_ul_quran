<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\CompanyGetGhl;
use App\Models\Api\Gohilevelmodel\Authoriz;
use App\Models\Api\Gohilevelmodel\GetPipeline;
use Illuminate\Support\Facades\Validator;


class GhlGetPipelines extends Controller
{
    public function GetPipelines()
    {

        $tokekn = Authoriz::get()->first();
        $accesstoken = $tokekn->access_token;
        $locationId = $tokekn->locationId;
        $url = $tokekn->liveurl;

        $urlenv = config('app.urls');
            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "$url/opportunities/pipelines?locationId=$locationId",
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


                foreach($decode['pipelines'] as $pipelin)
                {
                   $stages = $pipelin['stages'];
                   $dateAdded = $pipelin['dateAdded'];
                   $dateUpdated = $pipelin['dateUpdated'];
                   $name = $pipelin['name'];
                   $originId = $pipelin['originId'];
                   $id = $pipelin['id'];

                   $validator = Validator::make($pipelin,[
                        'id' => 'required|unique:gohighlevel_pipelines,pipeline_id',
                       ]);

                       if ($validator->fails()) {
                        $errors = $validator->errors();

                    } else {

                   $pipelinadd = new GetPipeline();

                   $pipelinadd->stages = json_encode($stages);
                   $pipelinadd->dateAdded = $dateAdded;
                   $pipelinadd->dateUpdated = $dateUpdated;
                   $pipelinadd->name = $name;
                   $pipelinadd->originId = $originId;
                   $pipelinadd->pipeline_id = $id;
                    $pipelinadd->save();
                    }

                }
            }
    }
}
