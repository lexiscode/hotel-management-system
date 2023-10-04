<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class SearchBookingController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $booking_search = Booking::where('guest_name', 'like', "%$query%")
            ->orWhere('phone_number', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.manage-bookings.search', compact('booking_search', 'post_enquiries'));
    }
}
