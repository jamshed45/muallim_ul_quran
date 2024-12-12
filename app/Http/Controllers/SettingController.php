<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    function index()
    {
        return view('setting.index');
    }

    function sitesetting()
    {
        $user = Auth::user();

        if($user->roles->contains('name', 'Client'))
        {
            $settings = Setting::where('user_id', $user->id)
                ->pluck('val', 'key')
                ->toArray();

            return view('setting.client-site-settting', compact('settings'));
        }
        else
        {
            $settings = Setting::whereNull('user_id')
                ->where(function ($query) {
                    $query->whereNull('user_id')
                        ->orWhere('user_id', '');
                })
                ->pluck('val', 'key')
                ->toArray();

            return view('setting.site-settting', compact('settings'));
        }

    }

    function dflosetting()
    {
        $user = Auth::user();

        if($user->roles->contains('name', 'Client'))
        {
            $settings = Setting::where('user_id', $user->id)
                ->pluck('val', 'key')
                ->toArray();

            return view('setting.client-d-flo-settting', compact('settings'));
        }
        else
        {
            $settings = Setting::whereNull('user_id')
                ->where(function ($query) {
                    $query->whereNull('user_id')
                        ->orWhere('user_id', '');
                })
                ->pluck('val', 'key')
                ->toArray();

            return view('setting.d-flo-settting', compact('settings'));
        }


    }

    function corepracticesetting()
    {
        $user = Auth::user();

        if($user->roles->contains('name', 'Client'))
        {
            $settings = Setting::where('user_id', $user->id)
                ->pluck('val', 'key')
                ->toArray();

            return view('setting.client-core-practice-settting', compact('settings'));
        }
        else
        {
            $settings = Setting::whereNull('user_id')
                ->where(function ($query) {
                    $query->whereNull('user_id')
                        ->orWhere('user_id', '');
                })
                ->pluck('val', 'key')
                ->toArray();

            return view('setting.core-practice-settting', compact('settings'));
        }


    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $roles = $user->getRoleNames();

        $get_user_role = $roles->first();




        // print_r($_POST);

        // $request->validate([
        //     'site_name' => 'required|string|max:255',
        //     'site_email' => 'required|string|email|max:255',
        //     'site_phone' => 'required|string|max:255',
        // ]);

        if(isset($request->corepractice_setting))
        {

            $settings = $request->except(['_token', '_method', 'corepractice_setting', 'admin_core_practice_live_mode_toggle', 'admin_core_practice_sandbox_mode_toggle', 'admin_core_practice_trigger_request_toggle']);

            $admin_core_practice_live_mode_toggle = $request->has('admin_core_practice_live_mode_toggle') ? 1 : 0;
            Setting::updateOrCreate(['key' => 'admin_core_practice_live_mode_toggle'], ['val' => $admin_core_practice_live_mode_toggle]);

            $admin_core_practice_sandbox_mode_toggle = $request->has('admin_core_practice_sandbox_mode_toggle') ? 1 : 0;
            Setting::updateOrCreate(['key' => 'admin_core_practice_sandbox_mode_toggle'], ['val' => $admin_core_practice_sandbox_mode_toggle]);

            $admin_core_practice_trigger_request_toggle = $request->has('admin_core_practice_trigger_request_toggle') ? 1 : 0;
            Setting::updateOrCreate(['key' => 'admin_core_practice_trigger_request_toggle'], ['val' => $admin_core_practice_trigger_request_toggle]);

            foreach ($settings as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['val' => $value]);
            }

        }

        if(isset($request->client_corepractice_setting))
        {

            $settings = $request->except(['_token', '_method', 'client_core_practice_live_mode_toggle', 'client_core_practice_trigger_request_toggle']);

            $client_core_practice_live_mode_toggle = $request->has('client_core_practice_live_mode_toggle') ? 1 : 0;
            Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'client_core_practice_live_mode_toggle'], ['val' => $client_core_practice_live_mode_toggle]);

            $client_core_practice_trigger_request_toggle = $request->has('client_core_practice_trigger_request_toggle') ? 1 : 0;
            Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'client_core_practice_trigger_request_toggle'], ['val' => $client_core_practice_trigger_request_toggle]);

            foreach ($settings as $key => $value) {
                Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => $key], ['val' => $value]);
            }

        }



        if(isset($request->dflo_setting))
        {
            $settings = $request->except(['_token', '_method', 'dflo_setting', 'd_flo_practice_live_mode_toggle', 'admin_d_flo_sandbox_mode_toggle', 'admin_d_flo_trigger_request_toggle']);

            $admin_d_flo_live_mode_toggle = $request->has('admin_d_flo_live_mode_toggle') ? 1 : 0;
            Setting::updateOrCreate(['key' => 'admin_d_flo_live_mode_toggle'], ['val' => $admin_d_flo_live_mode_toggle]);

            $admin_d_flo_sandbox_mode_toggle = $request->has('admin_d_flo_sandbox_mode_toggle') ? 1 : 0;
            Setting::updateOrCreate(['key' => 'admin_d_flo_sandbox_mode_toggle'], ['val' => $admin_d_flo_sandbox_mode_toggle]);

            $admin_d_flo_trigger_request_toggle = $request->has('admin_d_flo_trigger_request_toggle') ? 1 : 0;
            Setting::updateOrCreate(['key' => 'admin_d_flo_trigger_request_toggle'], ['val' => $admin_d_flo_trigger_request_toggle]);

            foreach ($settings as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['val' => $value]);
            }


        }


        if(isset($request->client_dflo_setting))
        {

            $settings = $request->except(['_token', '_method', 'client_d_flo_live_mode_toggle', 'client_core_practice_trigger_request_toggle']);

            $client_d_flo_live_mode_toggle = $request->has('client_d_flo_live_mode_toggle') ? 1 : 0;
            Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'client_d_flo_live_mode_toggle'], ['val' => $client_d_flo_live_mode_toggle]);

            $client_d_flo_trigger_request_toggle = $request->has('client_d_flo_trigger_request_toggle') ? 1 : 0;
            Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'client_d_flo_trigger_request_toggle'], ['val' => $client_d_flo_trigger_request_toggle]);

            foreach ($settings as $key => $value) {
                Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => $key], ['val' => $value]);
            }

        }


        if(isset($request->site_smtp_setting))
        {


            $settings = $request->except(['_token', '_method']);


            foreach ($settings as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['val' => $value]);
            }
        }





        if(isset($request->site_general_setting))
        {

            $settings = $request->except(['_token', '_method', 'site_logo', 'site_favicon', 'email_otp', 'site_general_setting']);

            if($get_user_role == 'Client')
            {
                foreach ($settings as $key => $value) {
                    Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => $key], ['val' => $value]);
                }

            }
            else
            {
                $emailOtp = $request->has('email_otp') ? 1 : 0;
                Setting::updateOrCreate(['key' => 'email_otp'], ['val' => $emailOtp]);

                foreach ($settings as $key => $value) {
                    Setting::updateOrCreate(['key' => $key], ['val' => $value]);
                }
            }


            if ($request->hasFile('site_logo_desktop')) {


                $site_logo_desktop = Setting::where('key', 'site_logo_desktop')->first();

                if ($site_logo_desktop->val && Storage::exists('public/' . $site_logo_desktop->val)) {
                    Storage::delete('public/' . $site_logo_desktop->val);
                }

                $site_logo_desktop = $request->file('site_logo_desktop')->store('uploads/settings', 'public');



                if($get_user_role == 'Client')
                {
                    Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'site_logo_desktop'], ['val' => $site_logo_desktop]);
                }
                else
                {
                    Setting::updateOrCreate(['user_id' =>  null, 'key' => 'site_logo_desktop'], ['val' => $site_logo_desktop]);
                }

            }



            if ($request->hasFile('site_logo_mobile')) {

                $site_logo_mobile = Setting::where('key', 'site_logo_mobile')->first();

                if ($site_logo_mobile->val && Storage::exists('public/' . $site_logo_mobile->val)) {
                    Storage::delete('public/' . $site_logo_mobile->val);
                }

                $site_logo_mobile = $request->file('site_logo_mobile')->store('uploads/settings', 'public');

                Setting::updateOrCreate(['key' => 'site_logo_mobile'], ['val' => $site_logo_mobile]);

                if($get_user_role == 'Client')
                {
                    Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'site_logo_mobile'], ['val' => $site_logo_mobile]);
                }
                else
                {
                    Setting::updateOrCreate(['user_id' =>  null, 'key' => 'site_logo_mobile'], ['val' => $site_logo_mobile]);
                }
            }

            if ($request->hasFile('site_logo_icon')) {

                $site_logo_icon = Setting::where('key', 'site_logo_icon')->first();

                if ($site_logo_icon->val && Storage::exists('public/' . $site_logo_icon->val)) {
                    Storage::delete('public/' . $site_logo_icon->val);
                }

                $site_logo_icon = $request->file('site_logo_icon')->store('uploads/settings', 'public');

                Setting::updateOrCreate(['key' => 'site_logo_icon'], ['val' => $site_logo_icon]);

                if($get_user_role == 'Client')
                {
                    Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'site_logo_icon'], ['val' => $site_logo_icon]);
                }
                else
                {
                    Setting::updateOrCreate(['user_id' =>  null, 'key' => 'site_logo_icon'], ['val' => $site_logo_icon]);
                }
            }

            if ($request->hasFile('site_favicon')) {

                $site_favicon = Setting::where('key', 'site_favicon')->first();

                if ($site_favicon->val && Storage::exists('public/' . $site_favicon->val)) {
                    Storage::delete('public/' . $site_favicon->val);
                }

                $site_favicon = $request->file('site_favicon')->store('uploads/settings', 'public');


                if($get_user_role == 'Client')
                {
                    Setting::updateOrCreate(['user_id' =>  $user->id, 'key' => 'site_favicon'], ['val' => $site_favicon]);
                }
                else
                {
                    Setting::updateOrCreate(['user_id' =>  null, 'key' => 'site_favicon'], ['val' => $site_favicon]);
                }
            }



        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }



    function createClient()
    {
        return view('extention.create-client');
    }

    function createList()
    {
        return view('extention.create-list');
    }

    function clientLocation()
    {
        return view('extention.client-locations');
    }

    function clientAllLocation()
    {
        return view('extention.client-all-locations');
    }

    function AdminClientSetting()
    {
        return view('extention.admin-client-settings');
    }

    function ClientSetting()
    {
        return view('extention.only-client-setting');
    }

}
