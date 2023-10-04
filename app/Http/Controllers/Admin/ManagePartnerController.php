<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\ManagePartnerStoreRequest;
use App\Http\Requests\ManagePartnerUpdateRequest;
use App\Mail\ManagePartnerCreateMail;
use App\Models\Partner;
use App\Models\ContactEnquiry;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ManagePartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::simplePaginate(5);
        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.manage-partners.index', compact('contact_enquiries', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.manage-partners.create', compact('contact_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagePartnerStoreRequest $request)
    {
        try {

            // just chose to try using instance method style here lolz
            $user = new Partner();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            /** send mail to the new role user */
            Mail::to($request->email)->send(new ManagePartnerCreateMail($request->email, $request->password));

            return redirect()->route('admin.manage-partner.index')
                ->with('success', 'New user and their role has been added successfully!');

        } catch (\Throwable $th) {
            throw $th;
        }

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.manage-partners.update', compact('contact_enquiries', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManagePartnerUpdateRequest $request, string $id)
    {
        // only when admin wants to also edit user password, then this will validate
        if($request->has('password') && !empty($request->password)){
            $request->validate(['password' => ['confirmed', 'min:6']]);
        }

        $user = Partner::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->has('password') && !empty($request->password)){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // assigns the role to user
        $user->syncRoles($request->role);

        return redirect()->route('admin.manage-partners.index')
        ->with('success', 'Updated the user and their role successfully!');
    }


    public function destroy(string $id)
    {
        try{

            $partner = Partner::findOrFail($id);

            $partner->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }

}
