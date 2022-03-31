<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where("userlevel", "admin")->get();
        return view("admins.admin.index", ["admins" => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admins.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            "userlevel" => "admin",
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->to(route("admins.index"))->with("message", "created account successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // NOT YET IMPLEMENTED SINCE NOT BEING USED
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $authUserId = Auth::user()->id;

        if (!$user)
            return redirect()->to(route("admins.index"))
                ->with("error", "No user found");
        if ($user->id == $authUserId)
            return redirect()->to(route("admins.index"))
                ->with("error", "You cannot edit your own profile");
        
        if ($user->userlevel == "admin")
            return view("admins.admin.edit", ["admin" => $user]);
        
        return redirect()->to(route("admins.index"))
            ->with("error", "No admin available with provided details");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        if ($admin->userlevel != "admin")
            return redirect()->to(route("admins.index"))
                ->with("error", "No admin available with provided details");

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::where(["email"=> $request->email])->first();

        if ($user->id != $admin->id)
            return redirect()->to(route("admins.index"))
                ->with("error", "another with that email already exists");
        
        $admin->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->to(route("admins.index"))
            ->with("message", "Updated details successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $userId = Auth::user()->id;

        if ($userId == $admin->id)
            return redirect()->to(route("admins.index"))
                ->with("error", "You can't delete your own account");

        if ($admin->userlevel != "admin")
            return redirect()->to(route("admins.index"))
                ->with("error", "No admin available with provided details");
        
        $admin->delete();

        return redirect()->to(route("admins.index"))->with("message", "Deleted details successfully");
    }
}
