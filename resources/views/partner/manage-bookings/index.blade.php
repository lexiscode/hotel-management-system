@extends('partner.layouts.master')

@section('index-manage-bookings')
    <section class="section">

        <div class="section-header">
            <h1>Manage Bookings</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Bookings Here!</h4>
                <form class="card-header-form" action="{{ route('partner.booking.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>

                        <!-- This is the create new property button -->
                        <div class="card-header-action">
                            <a href="{{ route('partner.manage-booking.create') }}" class="btn btn-primary">Create New Bookings</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- Display new property creation success message if it exists -->
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
                <!-- Display updated property success message if it exists -->
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

                <!-- The filter field -->
                <div class="mb-3">
                    <label for="statusFilter" class="form-label">Filter by Status:</label>
                    <select class="form-control" id="statusFilter">
                        <option value="All">All</option>
                        <option value="Check-In">Check-In</option>
                        <option value="Check-Out">Check-Out</option>
                    </select>
                </div>

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Room Name</th>
                            <th scope="col">Room Number</th>
                            <th scope="col">Guest Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($bookings->isEmpty())
                            <p>No booking found.</p>
                        @else
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->room_name }}</td>
                                    <td>{{ $booking->room_number }}</td>
                                    <td>{{ $booking->guest_name }}</td>
                                    <td class="check-status">
                                        @if ($booking->status === 'Checked-in')
                                            <div class="badge badge-success">{{ $booking->status }}</div>
                                        @elseif ($booking->status === 'Checked-out')
                                            <div class="badge badge-danger">{{ $booking->status }}</div>
                                        @endif

                                    </td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('partner.manage-booking.show', $booking->id) }}"
                                                class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('partner.manage-booking.edit', $booking->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="far fa-edit"></i></i>
                                            </a>

                                            <a href="{{ route('partner.manage-booking.destroy', $booking->id) }}" class="btn btn-danger delete-item">
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
                    {{ $bookings->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection
