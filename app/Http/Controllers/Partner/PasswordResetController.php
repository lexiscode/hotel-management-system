<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Http\Requests\SendPartnerResetLinkRequest;
use App\Http\Requests\PartnerResetPasswordRequest;
use App\Models\Partner;
use App\Mail\PartnerSendResetLinkMail;
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


    public function sendResetLink(SendPartnerResetLinkRequest $request)
    {
        $token = Str::random(64);

        $admin = Partner::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new PartnerSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'A mail has been sent to your email.');

    }


    public function resetPassword($token)
    {
        // Retrieve the email from the query string in the browser
        $email = request('email');

        return view('web.frontend.reset-password.index', compact('email', 'token'));
    }


    public function handleResetPassword(PartnerResetPasswordRequest $request)
    {
        $partner = Partner::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if(!$partner){
            return back()->with('error', 'Invalid token');
        }

        $partner->password = bcrypt($request->password);
        $partner->remember_token = null;
        $partner->save();

        return redirect()->route('partner.login.index')->with('success', 'Password reset successful. Try login now.');
    }

}
