@extends('admin.layouts.master')

@section('show-manage-booking-details')
    <section class="section">

        <div class="section-header">
            <h1>Manage Bookings</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Booking Details Of A Guest!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('partner.manage-booking.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $booking->check_in }}</h2>

                <p style="color: black;"><b>Check Out:</b> {{ $booking->check_out }}</p>
                <p style="color: black;"><b>Room Name:</b> {{ $booking->room_name }}</p>
                <p style="color: black;"><b>Room Number:</b> {{ $booking->room_number }}</p>
                <p style="color: black;"><b>Adults:</b> {{ $booking->adults }}</p>
                <p style="color: black;"><b>Children:</b> {{ $booking->children }}</p>
                <p style="color: black;"><b>Price:</b> {{ $booking->price }}</p>
                <p style="color: black;"><b>Guest Name:</b> {{ $booking->guest_name }}</p>
                <p style="color: black;"><b>Phone Number:</b> {{ $booking->phone_number }}</p>
                <p style="color: black;"><b>Status:</b> {{ $booking->status }}</p>
                <p style="color: black;"><b>Email:</b> {{ $booking->email }}</p>
                <p style="color: black;"><b>Notes:</b> {{ $booking->notes }}</p>

                <br><br>
                <p style="color: black;"><b>Date Created:</b> {{ $booking->created_at }}</p>
                <p style="color: black;"><b>Last Updated:</b> {{ $booking->updated_at }}</p>
            </div>
        </div>

    </section>
@endsection
