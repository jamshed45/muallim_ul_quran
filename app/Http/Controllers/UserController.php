<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();

        // $users = User::where('id', '!=', $currentUserId)
        // ->whereDoesntHave('roles', function($query) {
        //     $query->where('name', 'Admin');
        // })
        // ->get();

        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        // $user = Auth::user();
        // $get_user_role = $user->roles;
        // $firstRole = $get_user_role->first();

        // if($firstRole->name == 'Admin')
        // {
        //     $roles = Role::get();
        // }
        // else
        // {
        //     $roles = Role::where('name', '!=', 'Admin')->get();
        // }

        $roles = Role::where('name', '!=', 'Super Admin')->get();


        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'default_role_id' => $request->default_role_id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->roles);

        return redirect()->route('users.index')
                         ->with('success', 'User created successfully.');

    }

    public function show(User $user)
    {

        $roles = Role::where('name', '!=', 'Super Admin')->get();

        $userRoles = $user->roles->pluck('name')->toArray();

        return view('users.show', compact('user', 'roles', 'userRoles'));
    }

    public function edit(User $user)
    {

        $roles = Role::where('name', '!=', 'Super Admin')->get();

        $userRoles = $user->roles->pluck('name')->toArray();
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'required|array',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'default_role_id' => $request->default_role_id,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')
                             ->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                             ->with('error', 'An error occurred while deleting the user.');
        }
    }
}
