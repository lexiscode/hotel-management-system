<?php

namespace App\Http\Controllers\Partner;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\ContactEnquiry;

use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class GenerateStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_room_name = Booking::distinct('room_name')->pluck('room_name');
        $all_room_number = Booking::distinct('room_number')->pluck('room_number');

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.generate-statements.index', compact('contact_enquiries', 'all_room_name', 'all_room_number'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //dd($request->all());
        // Get the selected tenant name and apartment from the form submission
        $selectedRoomNames = $request->input('name_of_room');
        $selectedRoomNumbers = $request->input('room_number');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Booking::query();

        // Filter records based on selected room name and number
        if (!empty($selectedRoomNames)) {
            if (is_array($selectedRoomNames)) {
                $query->whereIn('room_name', $selectedRoomNames);
            } else {
                $query->where('room_name', $selectedRoomNames);
            }
        }

        if (!empty($selectedRoomNumbers)) {
            if (is_array($selectedRoomNumbers)) {
                $query->whereIn('room_number', $selectedRoomNumbers);
            } else {
                $query->where('room_number', $selectedRoomNumbers);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('check_in', [$startDate, $endDate]);
        }

        // Get the filtered records
        $filteredRecords = $query->orderBy('created_at', 'asc')->simplePaginate(10);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('partner.generate-statements.create', compact('filteredRecords', 'contact_enquiries', 'selectedRoomNames', 'selectedRoomNumbers'));
    }

    /**
     * Generates PDF
     */
    public function generatePDF(Request $request)
    {
        // Retrieve the selected tenant names and apartments
        $selectedRoomNames = $request->input('name_of_room');
        $selectedRoomNumbers = $request->input('room_number');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Booking::query();

        // Filter records based on selected room name and number
        if (!empty($selectedRoomNames)) {
            if (is_array($selectedRoomNames)) {
                $query->whereIn('room_name', $selectedRoomNames);
            } else {
                $query->where('room_name', $selectedRoomNames);
            }
        }

        if (!empty($selectedRoomNumbers)) {
            if (is_array($selectedRoomNumbers)) {
                $query->whereIn('room_number', $selectedRoomNumbers);
            } else {
                $query->where('room_number', $selectedRoomNumbers);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('check_in', [$startDate, $endDate]);
        }

        // Get the filtered records
        $filteredRecords = $query->orderBy('created_at', 'asc')->get();

        // Calculate the totals for Amount Paid
        $totalAmountPaid = $filteredRecords->sum('price');


        // Generate the PDF using the PDF facade
        $pdf = PDF::loadView('partner.manage-statements.exports.pdf_view', compact('filteredRecords', 'selectedRoomNames',
        'selectedRoomNumbers', 'totalAmountPaid'));

        // Download the PDF file with a specific filename
        return $pdf->download("$selectedRoomNames-BookingStatements.pdf");
    }

}

