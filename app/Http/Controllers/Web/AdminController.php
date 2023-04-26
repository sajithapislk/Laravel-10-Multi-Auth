<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login()
    {
        return view('admin.login');
    }
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);

        $adminRequest = $request->only(['email','password']);

        if(Auth::guard('admin')->attempt($adminRequest)){
            return redirect('admin/home');
        }else{
            return redirect()->back()->with(['fail'=>'password is wrong']);
        }

        return "check";
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
