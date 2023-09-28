<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class SearchTestimonialController extends Controller
{
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        $testimonial_search = Testimonial::where('name', 'like', "%$query%")
            ->orWhere('title', 'like', "%$query%")
            ->get();

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.testimonials.search', compact('testimonial_search', 'contact_enquiries'));
    }
}