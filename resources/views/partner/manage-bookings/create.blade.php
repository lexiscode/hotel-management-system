@extends('partner.layouts.master')

@section('create-manage-bookings')
    <section class="section">

        <div class="section-header">
            <h1>Manage Booking</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Create New Booking Here!</h4>
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

                <!-- This is a form to create new property-->
                <form method="POST" action="{{ route('partner.manage-booking.store') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="check-in">Check-in</label>
                                <input type="datetime-local" name="check_in" required class="form-control" id="check-in">
                                <div class="invalid-feedback">
                                    Select specified date and time
                                </div>
                                @error('check_in')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="check-out">Check-out</label>
                                <input type="datetime-local" name="check_out" required class="form-control" id="check-out">
                                <div class="invalid-feedback">
                                    Select specified date and time
                                </div>
                                @error('check_out')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="room-name">Room Name</label>
                                <input type="text" name="room_name" required class="form-control" id="room-name">
                                <div class="invalid-feedback">
                                    Enter the room name
                                </div>
                                @error('room_name')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="room-number">Room Number</label>
                                <input type="number" name="room_number" required class="form-control" id="room-number">
                                <div class="invalid-feedback">
                                    Enter the room number
                                </div>
                                @error('room_number')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="adults">Number of Adults</label>
                                <input type="number" name="adults" crequired lass="form-control" id="adults">
                                <div class="invalid-feedback">
                                    Please input the number of adults
                                </div>
                                @error('adults')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-5">
                                    <label for="children">Number of Children</label>
                                    <input type="number" name="children" required class="form-control" id="children">
                                    <div class="invalid-feedback">
                                        Please input the number of children
                                    </div>
                                    @error('children')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="price">Price (₦)</label>
                                <input type="number" name="price" required class="form-control" id="price">
                                <div class="invalid-feedback">
                                    Enter the price
                                </div>
                                @error('price')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="guest-name">Guest Full Name</label>
                                <input type="text" name="guest_name" required class="form-control" id="guest-name">
                                <div class="invalid-feedback">
                                    Please input the full name of guest
                                </div>
                                @error('guest_name')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-5">
                                    <label for="phone-number">Phone Number</label>
                                    <input type="number" name="phone_number" required class="form-control" id="phone-number">
                                    <div class="invalid-feedback">
                                        Please input the guest phone number
                                    </div>
                                    @error('phone_number')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputStatus">Status</label>
                                <select class="form-control form-control-sm" name="status" required>
                                    <option>Checked-in</option>
                                    <option>Checked-out</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="email">Email (Optional)</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <div class="invalid-feedback">
                                    Enter the guest email address
                                </div>
                                @error('email')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="notes">Extra Notes (Optional)</label>
                                <textarea class="form-control" name="notes" id="notes"></textarea>
                                <div class="invalid-feedback">
                                    Please input any extra notes if need be.
                                </div>
                                @error('notes')
                                    <p class='text-danger'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Book Now!</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
