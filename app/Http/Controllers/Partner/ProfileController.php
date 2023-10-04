<?php

namespace App\Http\Controllers\Partner;

use App\Models\Partner;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\PartnerProfileUpdateRequest;
use App\Http\Requests\PartnerPasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('partner')->user(); // gets specific admin user login information

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.profile.index', compact('contact_enquiries', 'user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerProfileUpdateRequest $request, string $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->save();

        toast('Updated Successfully!','success')->width('400');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage for password.
     */
    public function passwordUpdate(PartnerPasswordUpdateRequest $request, string $id)
    {

        $partner = Partner::findOrFail($id);
        $partner->password = bcrypt($request->password);
        $partner->save();

        toast('Updated Successfully!','success')->width('400');
        return redirect()->back();
    }

}
