<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use App\Models\ContactEnquiry;

use Illuminate\Http\Request;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->simplePaginate(5);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.testimonials.index', compact('testimonials', 'contact_enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.testimonials.create', compact('contact_enquiries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Validation rules for the form fields
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:testimonials,title'],
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'message' => ['required', 'string'],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/testimonials/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/testimonials'), $imageName);

            // Save the image name to the database
            $validatedData['image'] = $imageName;
        }

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['featured'] = $request->has('featured');

        // Create a new blog using the validated data
        Testimonial::create($validatedData);

        return redirect()->route('admin.testimonials.index')->with('creation-success', 'Testimonial created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.blogs.show', compact('testimonial', 'contact_enquiries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $contact_enquiries = ContactEnquiry::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.testimonials.update', compact('testimonial', 'contact_enquiries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the Testimonial model by ID
        $testimonial = Testimonial::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'message' => ['required', 'string'],
        ]);

        // Add checkbox values to $validatedData (1 or 0)
        $validatedData['featured'] = $request->has('featured');

        // Update the Blog attributes
        $testimonial->update($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/testimonials/' . $imageName;

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/testimonials'), $imageName);

            // Save the new image name to the database
            $testimonial->image = $imagePath;
            $testimonial->save();

        }else{
            $testimonial->save();
        }

        return redirect()->route('admin.testimonials.index')->with('update-success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        try{
            $testimonial->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
