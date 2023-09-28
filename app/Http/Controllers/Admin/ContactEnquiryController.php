<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{

    public function index()
    {
        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.contact-enquiries.index', compact('contact_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'subject' => ['string', 'max:255', 'nullable'],
            'message' => ['required', 'string'],
        ]);

        // Create a new blog using the validated data
        ContactEnquiry::create($validatedData);

        return redirect()->back()->with('enquiry-success', 'Your message has been sent successfully!');
    }

    public function destroy(ContactEnquiry $contact_enquiry)
    {
        try{
            $contact_enquiry->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
