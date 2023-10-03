<?php

namespace App\Http\Controllers\Partner;
use Illuminate\Support\Facades\Auth;

use App\Models\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PartnerController extends Controller
{
    public function index()
    {
        return view('web.frontend.partner-login.index');
    }


    public function login(Request $request)
    {
        if(Auth::guard('partner')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('partner.dashboard.index')->with('success', 'Login is successful');
        }else{
            return back()->with('error', 'Invalid credentials');
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('partner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('partner.login.index');
    }
}
