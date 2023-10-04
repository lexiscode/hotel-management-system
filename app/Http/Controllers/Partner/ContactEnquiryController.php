<?php

namespace App\Http\Controllers\Partner;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\PartnerContactEnquiry;
use App\Http\Requests\PartnerContactEnquiryStoreRequest;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        $contact_enquiries = PartnerContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.contact-enquiries.index', compact('contact_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerContactEnquiryStoreRequest $request)
    {
        // Validation rules for the form fields
        $validatedData = $request->validated();

        // Create a new blog using the validated data
        PartnerContactEnquiry::create($validatedData);

        return redirect()->back()->with('enquiry-success', 'Your enquiry has been sent successfully!');
    }

    public function destroy(PartnerContactEnquiry $contact_enquiry)
    {
        try{
            $contact_enquiry->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
