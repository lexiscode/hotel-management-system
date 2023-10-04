<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\ContactEnquiry;

use App\Http\Requests\ManageBookingStoreRequest;
use App\Http\Requests\ManageBookingUpdateRequest;

use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->simplePaginate(5);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.manage-bookings.index', compact('bookings', 'contact_enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.manage-bookings.create', compact('contact_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManageBookingStoreRequest $request)
    {
        // Validation rules are handled by the request class
        $validatedData = $request->validated();

        // Create a new Booking using the validated data
        Booking::create($validatedData);

        return redirect()->route('partner.manage-bookings.index')->with('creation-success', 'Booking created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.manage-bookings.show', compact('blog', 'contact_enquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.manage-bookings.update', compact('booking', 'contact_enquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManageBookingUpdateRequest $request, string $id)
    {
        // Find the Booking model by ID
        $booking = Booking::findOrFail($id);

        // Validation rules are handled by the request class
        $validatedData = $request->validated();

        // Update the Booking attributes
        $booking->update($validatedData);

        return redirect()->route('partner.manage-bookings.index')->with('update-success', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        try{
            $booking->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}

