<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class SearchNewsletterController extends Controller
{
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        $newsletter_search = Newsletter::where('email', 'like', "%$query%")->get();

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.newsletters.search', compact('newsletter_search', 'contact_enquiries'));
    }
}
