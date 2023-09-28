@extends('admin.layouts.master')

@section('index-newsletter')
    <section class="section">

        <div class="section-header">
            <h1>Manage Newsletters</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Newsletters Data!</h4>
                <form class="card-header-form" action="{{ route('admin.newsletter.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
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
                        @if ($newsletters->isEmpty())
                            <p>No newsletter found.</p>
                        @else
                            @foreach ($newsletters as $newsletter)
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


                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $newsletters->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>
@endsection
