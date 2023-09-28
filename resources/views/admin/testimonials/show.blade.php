@extends('admin.layouts.master')

@section('show-testimonial-details')
    <section class="section">

        <div class="section-header">
            <h1>Manage Testimonials</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Testimonial Details!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $testimonial->name }}</h2>
                <p style="color: black;">{{ $testimonial->title }}</p>

                <img src="{{ $testimonial->image) }}" alt="Testimonial Image">

                <p style="color: black;">{{ $testimonial->message }}</p>

            </div>
        </div>

    </section>
@endsection
