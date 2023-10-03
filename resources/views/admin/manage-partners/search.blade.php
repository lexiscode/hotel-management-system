@extends('admin.layouts.master')

@section('search-partners')
    <section class="section">

        <div class="section-header">
            <h1>{{ __('Manage Partners') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Manage Your Partners Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <!-- This is the create new property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.manage-partner.create') }}" class="btn btn-primary">Create New Partner</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th>
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($partner_search->isEmpty())
                            <div class="card-body">
                                <div class="empty-state" data-height="400" style="height: 400px;">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>Oops! We couldn't find any data</h2>
                                    <p class="lead">
                                        Note: Ensure that there are no unnecessary space in-between the data name you are searching
                                        for, if still yes, then sorry your search request isn't in available in your database.
                                    </p>
                                    <a href="{{ route('admin.manage-partner.index') }}" class="btn btn-primary mt-4">Go Back</a>
                                </div>
                            </div>
                        @else
                            @foreach ($partner_search as $partner)
                                <tr class="text-center">
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td>{{ $partner->email }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.manage-partner.edit', $partner->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="far fa-edit"></i></i>
                                            </a>

                                            <a href="{{ route('admin.manage-partner.destroy', $partner->id) }}" class="btn btn-danger delete-item">
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
                    {{ $admins->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection
