<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;


class ClientController extends Controller
{
    public function index(Request $request)
    {
        $currentUserId = Auth::id();

        $get_role_list = $request->query('get_role_list', []);

        if (is_array($get_role_list) && count($get_role_list) > 0) {
            $roleNames = explode(',', $get_role_list[0]);
        } else {
            $roleNames = ['Client'];
        }


        if (!in_array('Client', $roleNames)) {
            $roleNames[] = 'Client';
        }

        $users = User::where('id', '!=', $currentUserId)
            ->whereHas('roles', function ($query) use ($roleNames) {

                $query->whereIn('name', $roleNames);
            })
            ->whereHas('roles', function ($query) {

                $query->where('name', 'Client');
            })
            ->whereDoesntHave('roles', function ($query) {

                $query->where('name', 'Admin');
            })
            ->get();

        $roles = Role::where('name', '!=', 'Super Admin')->get();

        return view('clients.index', compact('users', 'roles', 'roleNames'));

    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'unique_login_url_name' => [
                'required',
                'string',
                'min:3',
                'max:15',
                'unique:users',
            ],
        ]);

        $roleName = 'Client';
        $roleId = Role::where('name', $roleName)->first()->id;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'unique_login_url_name' => $request->unique_login_url_name,
            'password' => Hash::make($request->password),
            'default_role_id' => $roleId,
            'mobile' => $request->mobile,
            'status'   => $request->mobile,
        ]);

        $user->assignRole('client');

        return redirect()->route('clients.index')
                         ->with('success', 'Client created successfully.');

    }

    public function show(User $client)
    {
        $client_api_setting = Setting::where('user_id', $client->id)
        ->pluck('val', 'key')
        ->toArray();

        return view('clients.show', compact('client', 'client_api_setting'));
    }

    public function edit(User $client)
    {
        $client_api_setting = Setting::where('user_id', $client->id)
            ->pluck('val', 'key')
            ->toArray();

        return view('clients.edit', compact('client', 'client_api_setting'));
    }

    public function update(Request $request, User $client)
    {


        if($request->client_setting)
            {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email,' . $client->id,
                    'password' => 'nullable|string|min:8|confirmed',

                ]);

                if ($request->hasFile('profile_image')) {

                    $oldProfileImage = $client->profile_image;

                    if ($oldProfileImage && Storage::exists('public/' . $oldProfileImage)) {
                        Storage::delete('public/' . $oldProfileImage);
                    }

                    $profileImage = $request->file('profile_image')->store('uploads/profile_images', 'public');

                    $client->profile_image = $profileImage;
                }

                $client->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'unique_login_url_name' => $request->unique_login_url_name,
                    'mobile' => $request->mobile,
                    'password' => $request->password ? Hash::make($request->password) : $client->password,
                    'profile_image' => $profileImage ?? $client->profile_image,
                    'status'   => $request->status,
                ]);



            }

        if($request->client_api_live_settings)
            {

                $settings = $request->except(['_token', '_method', 'client_api_live_settings']);

                foreach ($settings as $key => $value) {
                    Setting::updateOrCreate(['user_id' =>  $client->id, 'key' => $key], ['val' => $value]);
                }

                return redirect()->back()
                ->with('api_tab', 'active')
                ->with('success', 'Live API setting updated successfully.');

            }

        // if($request->core_practice_client_api_sandbox_setting)
        //     {
        //         $settings = $request->except(['_token', '_method', 'core_practice_client_api_sandbox_setting']);

        //         foreach ($settings as $key => $value) {
        //             Setting::updateOrCreate(['user_id' =>  $client->id, 'key' => $key], ['val' => $value]);
        //         }

        //         return redirect()->back()
        //         ->with('api_tab', 'active')
        //         ->with('success', 'SandBox API setting updated successfully.');
        //     }


        // if($request->ghl_client_api_live_setting)
        //     {

        //         $settings = $request->except(['_token', '_method', 'ghl_client_api_live_setting']);

        //         foreach ($settings as $key => $value) {
        //             Setting::updateOrCreate(['user_id' =>  $client->id, 'key' => $key], ['val' => $value]);
        //         }

        //         return redirect()->back()
        //         ->with('api_tab', 'active')
        //         ->with('success', 'Live API setting updated successfully.');

        //     }

        // if($request->ghl_client_api_sandbox_setting)
        //     {
        //         $settings = $request->except(['_token', '_method', 'ghl_client_api_sandbox_setting']);

        //         foreach ($settings as $key => $value) {
        //             Setting::updateOrCreate(['user_id' =>  $client->id, 'key' => $key], ['val' => $value]);
        //         }

        //         return redirect()->back()
        //         ->with('api_tab', 'active')
        //         ->with('success', 'SandBox API setting updated successfully.');
        //     }



        return redirect()->route('clients.index')
                         ->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {

        try {

            $client = User::findOrFail($id);

            if ($client->profile_image && Storage::exists('public/' . $client->profile_image)) {
                Storage::delete('public/' . $client->profile_image);
            }


            Setting::where('user_id', $id)->delete();

            $client->delete();

            return redirect()->route('clients.index')
                             ->with('success', 'Client deleted successfully.');

        } catch (\Exception $e) {

            return redirect()->route('clients.index')
                             ->with('error', 'An error occurred while deleting the user.');

        }
    }
}
