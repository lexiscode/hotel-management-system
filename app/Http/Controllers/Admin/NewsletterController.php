<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Newsletter;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->simplePaginate(5);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.newsletters.index', compact('newsletters', 'contact_enquiries'));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        try{
            $newsletter->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
