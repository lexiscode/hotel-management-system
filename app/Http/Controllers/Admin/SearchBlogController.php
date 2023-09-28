<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;

class SearchBlogController extends Controller
{
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        $blog_search = Blog::where('title', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->get();

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blog.search', compact('blog_search', 'contact_enquiries'));
    }
}
