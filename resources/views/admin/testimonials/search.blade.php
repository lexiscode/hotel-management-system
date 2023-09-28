@extends('admin.layouts.master')

@section('search-testimonials')
    <section class="section">

        <div class="section-header">
            <h1>Manage Testimonials</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Testimonials Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">Create New Testimonial</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Posted On</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($testimonial_search->isEmpty())
                            <p>No testimonial found.</p>
                        @else
                            @foreach ($testimonial_search as $testimonial)
                                <tr>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->title }}</td>
                                    <td>{{ $testimonial->created_at }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.testimonial.show', $testimonial->id) }}"
                                                class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('admin.testimonial.destroy', $testimonial->id) }}" class="btn btn-danger delete-item">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>

    </section>
@endsection
