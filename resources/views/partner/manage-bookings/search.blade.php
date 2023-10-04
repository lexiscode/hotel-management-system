@extends('partner.layouts.master')

@section('search-manage-bookings')
    <section class="section">

        <div class="section-header">
            <h1>Manage Bookings</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Bookings Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
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
                        @if ($booking_search->isEmpty())
                            <p>No booking found.</p>
                        @else
                            @foreach ($booking_search as $booking)
                                <tr>
                                    <td>{{ $booking->room_name }}</td>
                                    <td>{{ $booking->room_number }}</td>
                                    <td>{{ $booking->guest_name }}</td>
                                    <td>
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

            </div>
        </div>

    </section>

@endsection
