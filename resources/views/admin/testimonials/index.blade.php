@extends('admin.layouts.master')

@section('index-testimonials')
    <section class="section">

        <div class="section-header">
            <h1>Manage Testimonials</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Testimonials Here!</h4>
                <form class="card-header-form" action="{{ route('admin.testimonial.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">Create New Testimonial</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- Display new blog creation success message if it exists -->
                @if (session('creation-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('creation-success') }}
                        </div>
                    </div>
                @endif
                <!-- Display updated blog success message if it exists -->
                @if (session('update-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('update-success') }}
                        </div>
                    </div>
                @endif

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
                        @if ($testimonials->isEmpty())
                            <p>No testimonial found.</p>
                        @else
                            @foreach ($testimonials as $testimonial)
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


                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $testimonials->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>
@endsection
