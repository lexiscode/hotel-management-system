@extends('partner.layouts.master')

@section('index-generate-statements')
    <section class="section">

        <div class="section-header">
            <h1>Manage Booking Records</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>View or Download Your Bookings History!</h4>

                <form class="card-header-form" action="" method="GET">
                    <div class="input-group">

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('partner.manage-booking.create') }}" class="btn btn-primary">Add New Bookings</a>
                        </div>

                    </div>
                </form>

            </div>
            <div class="card-body">
                <h2 style="text-align: center;">View Statement in Here</h2>
                <!-- This is a form to view a specifc tenant account history directly from the webpage-->
                <form method="GET" action="{{ route('partner.generate-statement.create') }}">

                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Find A Room By Name (Optional):</label>
                                <select class="form-control select2" name="name_of_room" required>
                                    @foreach ($all_room_name as $room_name)
                                        <option>{{ $room_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                <label>Find The Room Number (Optional):</label>
                                <select class="form-control select2" name="room_number" required>
                                    @foreach ($all_room_number as $room_number)
                                        <option>{{ $room_number }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputStartDate">Start Date:</label>
                                <input type="date" name="start_date" class="form-control" id="inputStartDate" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEndDate">End Date:</label>
                                <input type="date" name="end_date" class="form-control" id="inputEndDate" required>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> View Statement</button>
                        </div>

                    </div>
                </form>

                <hr>
                <h2 style="text-align: center;">Generate Statement in PDF</h2>
                <!-- This is a form to download PDF format of a specifc tenant account history -->
                <form method="GET" action="{{ route('partner.generate-statement.generate-pdf') }}">

                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Find A Room By Name (Optional):</label>
                                <select class="form-control select2" name="name_of_room" required>
                                    @foreach ($all_room_name as $room_name)
                                        <option>{{ $room_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Find The Room Number (Optional):</label>
                                <select class="form-control select2" name="room_number" required>
                                    @foreach ($all_room_number as $room_number)
                                        <option>{{ $room_number }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputStartDate">Start Date:</label>
                                <input type="date" name="start_date" class="form-control" id="inputStartDate" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEndDate">End Date:</label>
                                <input type="date" name="end_date" class="form-control" id="inputEndDate" required>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Generate PDF</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </section>

@endsection
