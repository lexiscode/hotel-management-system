@extends('admin.layouts.master')

@section('contact_enquiries')
    <section class="section">

        <div class="section-header">
            <h1>All Enquiries Received</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Checkout Your Potential Client Enquiries Here!</h4>
            </div>
            <div class="card-body">

                @if ($contact_enquiries->isEmpty())
                    <p>No property enquiries found.</p>
                @else
                    @foreach ($contact_enquiries as $contact_enquiry)
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $contact_enquiry->name }}</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show" id="mycard-collapse" style="">
                                <div class="card-body">

                                    <p>Email Address: {{ $contact_enquiry->email }}</p>
                                    <p>Phone Number: {{ $contact_enquiry->phone_no }}</p>

                                    @if($contact_enquiry->property_title !== null)
                                        <p>Property Title: {{ $contact_enquiry->property_title }}</p>
                                    @endif

                                    @if($contact_enquiry->contact_page !== null)
                                        <p>From Contact Page?: {{ $contact_enquiry->contact_page }}</p>
                                    @endif

                                    <p>Message: {{ $contact_enquiry->message }}</p>
                                    <br>

                                    <a href="{{ route('admin.contact-enquiry.destroy', $contact_enquiry->id) }}" class="btn btn-danger delete-item">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $contact_enquiries->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>
@endsection
