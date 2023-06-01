<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    function add_user(){
        $roles = Role::all();
        return view('admin.user.add_user',compact('roles'));
    }
    function add_user_store(Request $request){
        $request->validate([
            '*' => 'required',
            'email' =>'email:rfc,dns|unique:App\Models\User,email',
        ]);

        $random_password = Str::random(8);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt($random_password),
            'role' => $request->role,
        ]);
        // Mail::to($request->email)->send(new SubadminMail($request->name,$request->email,$random_password));
        return back()->with('success','Successfully added a new user');
    }
}
