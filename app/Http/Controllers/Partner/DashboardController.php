<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;
use App\Models\PartnerContactEnquiry;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_enquiries = PartnerContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.dashboard.index', compact('contact_enquiries'));
    }
}
