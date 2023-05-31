<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.buyer.register.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
        // $request->validate([
        //     'full_name' => 'required',
        //     'user_name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'confirm_password' => 'required',
        // ]);

        // if ($request->password != $request->confirm_password) {
        //     return back()->withErrors('Passwords do not match!');
        // } else {
        //     User::insert([
        //         'full name' => $request->full_name,
        //         'user name' => $request->user_name,
        //         'email' => $request->email,
        //         'password' => bcrypt($request->password),
        //         'role' => 'customer',
        //         'created_at' => Carbon::now()
        //     ]);
        //     return back()->with('success', 'Account created successfully!');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show($r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(r $r)
    {
        //
    }

    public function login_field()
    {
        return view('frontend.buyer.login.create');
    }

    public function login(Request $request)
    {
        $request->validate([
            '*' => 'required'
        ]);
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect('/');
        }
        else{
            return back()->withErrors('Your username or passwords is wrong!');
        }
    }
}
