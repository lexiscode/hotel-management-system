<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Http\Requests\SendAdminResetLinkRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Models\Admin;
use App\Mail\AdminSendResetLinkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PasswordResetController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('web.frontend.forgot-password.index');
    }


    public function sendResetLink(SendAdminResetLinkRequest $request)
    {
        $token = Str::random(64);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'A mail has been sent to your email.');

    }


    public function resetPassword($token)
    {
        // Retrieve the email from the query string in the browser
        $email = request('email');

        return view('web.frontend.reset-password.index', compact('email', 'token'));
    }


    public function handleResetPassword(AdminResetPasswordRequest $request)
    {
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if(!$admin){
            return back()->with('error', 'Invalid token');
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login.index')->with('success', 'Password reset successful. Try login now.');
    }

}
