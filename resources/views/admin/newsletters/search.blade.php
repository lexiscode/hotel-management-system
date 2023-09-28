@extends('admin.layouts.master')

@section('search-newsletter')
    <section class="section">

        <div class="section-header">
            <h1>Manage Newsletters</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Newsletters Here!</h4>
            </div>
            <div class="card-body">

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created On</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($newsletter_search->isEmpty())
                            <p>No newletter found.</p>
                        @else
                            @foreach ($newsletter_search as $newsletter)
                                <tr>
                                    <td>{{ $newsletter->id }}</td>
                                    <td>{{ $newsletter->email }}</td>
                                    <td>{{ $newsletter->created_at }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.blog.destroy', $newsletter->id) }}" class="btn btn-danger delete-item">
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
