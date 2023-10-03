<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class SearchPartnerController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');

        $partner_search = Partner::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.manage-partners.search', compact('partner_search', 'contact_enquiries'));
    }
}
