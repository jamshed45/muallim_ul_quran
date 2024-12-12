<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLocation;
use App\Models\UserCalendar;
use Illuminate\Support\Facades\DB;



class LocationController extends Controller
{
    public function index(Request $request)
    {

        $get_client_id = $request->query('client_id');
        $client = Auth::user();
        $roles = $client->getRoleNames();
        $get_user_role = $roles->first();

        $locations = [];
        $client_id = '';

        if ($get_user_role == 'Client') {
            $locations = UserLocation::where('client_id', $client->id)->get();
        } else {
            if (!$get_client_id) {
                $locations = UserLocation::get();
            } else {
                $locations = UserLocation::where('client_id', $get_client_id)->get();
                $client_id = $get_client_id;
            }
        }

        $clients = User::whereHas('roles', function($query) {
            $query->where('name', 'Client');
        })
        ->whereDoesntHave('roles', function($query) {
            $query->where('name', 'Admin');
        })
        ->get();



        return view('locations.index', compact('locations', 'clients', 'client_id'));
    }

    public function create()
    {
        $clients = User::whereHas('roles', function($query) {
            $query->where('name', 'Client');
        })
        ->whereDoesntHave('roles', function($query) {
            $query->where('name', 'Admin');
        })
        ->get();

        return view('locations.create',  compact( 'clients'));
    }

    public function store(Request $request)
    {

        $location = UserLocation::create([
            'client_id' => $request->client_id,
            'core_location_id' => $request->core_location_id,
            'ghl_location_id' => $request->ghl_location_id,
            'location_name' => $request->location_name,
            'location_address' => $request->location_address,
            'status' => $request->status,
        ]);

        foreach ($request->calender_ids as $calender) {
            UserCalendar::create([
                'client_id' => $request->client_id,
                'location_id' => $location->id,
                'core_calender_id' => $calender['core_calender_id'],
                'ghl_calender_id' => $calender['ghl_calender_id'],
            ]);
        }


        if($request->redirect_client_id)
        {
            return redirect()->route('locations.index', ['client_id' => $request->client_id])
            ->with('success', 'Location created successfully.');

        }
        else
        {
            return redirect()->route('locations.index')
            ->with('success', 'Location created successfully.');
        }



    }

    public function show(UserLocation $UserLocation, $id)
    {
        $location = UserLocation::find($id);

        $clients = User::whereHas('roles', function($query) {
            $query->where('name', 'Client');
        })
        ->whereDoesntHave('roles', function($query) {
            $query->where('name', 'Admin');
        })
        ->get();

        $userCalendar = UserCalendar::where('location_id', $location->id)
        ->where('client_id', $location->client_id)
        ->get();


        return view('locations.show', compact('location', 'clients', 'userCalendar'));
    }

    public function edit(UserLocation $UserLocation, $id)
    {
        $location = UserLocation::find($id);

        $clients = User::whereHas('roles', function($query) {
            $query->where('name', 'Client');
        })
        ->whereDoesntHave('roles', function($query) {
            $query->where('name', 'Admin');
        })
        ->get();

        $userCalendar = UserCalendar::where('location_id', $location->id)
        ->where('client_id', $location->client_id)
        ->get();


        return view('locations.edit', compact('location', 'clients', 'userCalendar'));
    }

    public function update(Request $request, $id)
    {
        echo $client_id      = $request->client_id;
        echo $location_id    =  $id;

        $calenderIds = $request->input('calender_ids');

        $calenderIdsArray = array_filter($calenderIds, function ($item) {
            return !empty($item['calender_id']);
        });



        $existingCalenderIds = DB::table('user_calendars')
        ->where('client_id', $client_id)
        ->where('location_id', $location_id)
        ->pluck('id')
        ->toArray();

        // echo "<pre>";
        // echo "<br>";
        // echo "-----------";
        // echo "<br>";
        // print_r($calenderIds);
        // echo "<br>";
        // echo "-----------";
        // echo "<br>";
        // echo "<br>";
        // print_r($existingCalenderIds);
        // echo "<br>";

        $calenderIdsToDelete = array_diff($existingCalenderIds, array_column($calenderIds, 'calender_id'));

        // print_r($calenderIdsToDelete);

        // echo "</pre>";

        if (!empty($calenderIdsToDelete)) {
            DB::table('user_calendars')
                ->whereIn('id', $calenderIdsToDelete)
                ->delete();
        }



        $userLocation = UserLocation::find($location_id);

        $userLocation->update([
            'client_id' => $request->client_id,
            'core_location_id' => $request->core_location_id,
            'ghl_location_id' => $request->ghl_location_id,
            'location_name' => $request->location_name,
            'location_address' => $request->location_address,
            'status' => $request->status,
        ]);

        // foreach ($request->calender_ids as $calender) {
        //     UserCalendar::create([
        //         'client_id' => $request->client_id,
        //         'location_id' => $location_id,
        //         'core_calender_id' => $calender['core_calender_id'],
        //         'ghl_calender_id' => $calender['ghl_calender_id'],
        //     ]);


        // }

        foreach ($calenderIds as $item) {
            if (!empty($item['calender_id'])) {
                // Check if calendar_id exists
                $userCalendar = UserCalendar::where('id', $item['calender_id'])->first();

                if ($userCalendar) {
                    // Update the record if it exists
                    $userCalendar->update([

                        'core_calender_id' => $item['core_calender_id'],
                        'ghl_calender_id' => $item['ghl_calender_id'],
                    ]);
                }
            } else {
                // Create a new record if calender_id is null or empty
                UserCalendar::create([
                    'client_id' => $client_id,
                    'location_id' => $location_id,
                    'core_calender_id' => $item['core_calender_id'],
                    'ghl_calender_id' => $item['ghl_calender_id'],
                    // Generate a new calendar_id if needed
                ]);
            }
        }

        if($request->redirect_client_id)
        {
            return redirect()->route('locations.index', ['client_id' => $request->client_id])
            ->with('success', 'Location updated successfully.');

        }
        else
        {
            return redirect()->route('locations.index')
            ->with('success', 'Location updated successfully.');
        }

    }

    public function destroy(UserLocation $UserLocation, $id)
    {
        $UserLocation = UserLocation::find($id);
        try {

            $UserLocation->delete();

            return redirect()->route('locations.index')
                             ->with('success', 'Location deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('locations.index')
                             ->with('error', 'An error occurred while deleting the user.');
        }
    }

    public function updateStatus(Request $request, $id)
    {

        $location = UserLocation::find($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        $location->status = $request->status;
        $location->save();

        return response()->json(['message' => 'Status updated successfully']);
    }




}
