<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->simplePaginate(5);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.index', compact('blogs', 'contact_enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.create', compact('contact_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:blogs,title'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'content' => ['required', 'string'],
            'featured' => ['nullable', 'string'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/blogs/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/blogs'), $imageName);

            // Save the image name to the database
            $validatedData['image'] = $imagePath;
        }

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['featured'] = $request->has('featured');

        // Create a new blog using the validated data
        Blog::create($validatedData);

        return redirect()->route('admin.blog.index')->with('creation-success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.show', compact('blog', 'contact_enquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.update', compact('blog', 'contact_enquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Blog model by ID
        $blog = Blog::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'content' => ['required', 'string'],
        ]);

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['featured'] = $request->has('featured');

        // Update the Blog attributes
        $blog->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/blogs/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/blogs'), $imageName);

            // Save the new image name to the database
            $blog->image = $imagePath;
            $blog->save();

        }else{
            $blog->save();
        }

        return redirect()->route('admin.blog.index')->with('update-success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try{
            $blog->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
