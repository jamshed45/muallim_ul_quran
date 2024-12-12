<?php

namespace App\Http\Controllers\ApiController\Gohighlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Gohilevelmodel\CompanyGetGhl;
use App\Models\Api\Gohilevelmodel\Authoriz;

class GhlCompanyControler extends Controller
{
    public function getCompany()
    {

        $tokekn = Authoriz::get()->first();
        $accesstoken = $tokekn->access_token;
        $companyId = $tokekn->companyId;
        $url = $tokekn->liveurl;

        $urlold = config('app.urls');

            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "$url/companies/$companyId",
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

                $decode = json_decode($response);
                foreach($decode as $company)
                {
                    dd($company);
                    $companyId = $company->id;
                    $name = $company->name;
                    $email = $company->email;
                    $logoUrl = $company->logoUrl;
                    $phone = $company->phone;
                    $website = $company->website;
                    $domain = $company->domain;
                    $spareDomain = $company->spareDomain;
                    $privacyPolicy = $company->privacyPolicy;
                    $termsConditions = $company->termsConditions;
                    $theme = $company->theme;
                    $address = $company->address;
                    $city = $company->city;
                    $postalCode = $company->postalCode;
                    $country = $company->country;
                    $state = $company->state;
                    $timezone = $company->timezone;
                    $relationshipNumber = $company->relationshipNumber;
                    $faviconUrl = $company->faviconUrl;
                    $subdomain = $company->subdomain;
                    $currency = $company->currency;
                    $plan = $company->plan;
                    $customerType = $company->customerType;
                    $termsOfServiceVersion = $company->termsOfServiceVersion;
                    $termsOfServiceAcceptedBy = $company->termsOfServiceAcceptedBy;
                    $twilioTrialMode = $company->twilioTrialMode;
                    $twilioFreeCredits = $company->twilioFreeCredits;
                    $termsOfServiceAcceptedDate = $company->termsOfServiceAcceptedDate;
                    $privacyPolicyVersion = $company->privacyPolicyVersion;
                    $privacyPolicyAcceptedBy = $company->privacyPolicyAcceptedBy;
                    $privacyPolicyAcceptedDate = $company->privacyPolicyAcceptedDate;
                    $affiliatePolicyVersion = $company->affiliatePolicyVersion;
                    $affiliatePolicyAcceptedBy = $company->affiliatePolicyAcceptedBy;
                    $affiliatePolicyAcceptedDate = $company->affiliatePolicyAcceptedDate;
                    $isReselling = $company->isReselling;
                    $onboardingInfo = $company->onboardingInfo;
                    $stripeId = $company->stripeId;
                    $upgradeEnabledForClients = $company->upgradeEnabledForClients;
                    $cancelEnabledForClients = $company->cancelEnabledForClients;
                    $autoSuspendEnabled = $company->autoSuspendEnabled;
                    $saasSettings = $company->saasSettings;
                    $stripeActivePlan = $company->stripeActivePlan;
                    $stripeConnectId = $company->stripeConnectId;
                    $enableDepreciatedFeatures = $company->enableDepreciatedFeatures;
                    $premiumUpgraded = $company->premiumUpgraded;
                    $status = $company->status;
                    $locationCount = $company->locationCount;
                    $disableEmailService = $company->disableEmailService;
                    $billingInfo = $company->billingInfo;

                    $companies = new CompanyGetGhl();

                    $companies->companyId = $companyId;
                    $companies->name = $name;
                    $companies->email = $email;
                    $companies->logoUrl = $logoUrl;
                    $companies->phone = $phone;
                    $companies->website = $website;
                    $companies->domain = $domain;
                    $companies->spareDomain = $spareDomain;
                    $companies->privacyPolicy = $privacyPolicy;
                    $companies->termsConditions = $termsConditions;
                    $companies->theme = $theme;
                    $companies->address = $address;
                    $companies->city = $city;
                    $companies->postalCode = $postalCode;
                    $companies->country = $country;
                    $companies->state = $state;
                    $companies->timezone = $timezone;
                    $companies->relationshipNumber = $relationshipNumber;
                    $companies->faviconUrl = $faviconUrl;
                    $companies->subdomain = $subdomain;
                    $companies->plan = $plan;
                    $companies->currency = $currency;
                    $companies->customerType =$customerType;
                    $companies->termsOfServiceVersion = $termsOfServiceVersion;
                    $companies->termsOfServiceAcceptedBy = $termsOfServiceAcceptedBy;
                    $companies->twilioTrialMode = $twilioTrialMode;
                    $companies->twilioFreeCredits = $twilioFreeCredits;
                    $companies->termsOfServiceAcceptedDate = $termsOfServiceAcceptedDate;
                    $companies->privacyPolicyVersion = $privacyPolicyVersion;
                    $companies->privacyPolicyAcceptedBy = $privacyPolicyAcceptedBy;
                    $companies->privacyPolicyAcceptedDate = $privacyPolicyAcceptedDate;
                    $companies->affiliatePolicyVersion =$affiliatePolicyVersion;
                    $companies->affiliatePolicyAcceptedBy =$affiliatePolicyAcceptedBy;
                    $companies->affiliatePolicyAcceptedDate =$affiliatePolicyAcceptedDate;
                    $companies->isReselling = $isReselling;
                    $companies->onboardingInfo = json_encode($onboardingInfo);
                    $companies->stripeId =$stripeId;
                    $companies->upgradeEnabledForClients =$upgradeEnabledForClients;
                    $companies->cancelEnabledForClients =$cancelEnabledForClients;
                    $companies->autoSuspendEnabled =$autoSuspendEnabled;
                    $companies->saasSettings = json_encode($saasSettings);
                    $companies->stripeActivePlan =$stripeActivePlan;
                    $companies->stripeConnectId =$stripeConnectId;
                    $companies->enableDepreciatedFeatures =$enableDepreciatedFeatures;
                    $companies->premiumUpgraded =$premiumUpgraded;
                    $companies->status =$status;
                    $companies->locationCount =$locationCount;
                    $companies->disableEmailService = $disableEmailService;
                    $companies->billingInfo = json_encode($billingInfo);
                    $companies->save();
                    return response()->json([
                        'message'=>'Data Inserted Successfully..',
                        'status'=>'1'
                     ]);

                }
            }
    }
}
