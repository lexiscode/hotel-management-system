@extends('admin.layouts.master')

@section('update-partners')
    <section class="section">

        <div class="section-header">
            <h1>Manage Partners</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update New Partner Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.manage-partner.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <!-- This is a form to create new property-->
                <form method="POST" action="{{ route('admin.manage-partner.update', $partner->id) }}" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')

                    <div class="card" id="sample-login" style="padding:20px">

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $partner->name }}">
                            <div class="invalid-feedback">
                                Please fill in a username
                            </div>
                            @error('name')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $partner->email }}">
                            <div class="invalid-feedback">
                                Please fill in an email address
                            </div>
                            @error('email')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <div class="invalid-feedback">
                                Please fill in your new password
                            </div>
                            @error('password')
                                <p class='text-danger'></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            <div class="invalid-feedback">
                                Please fill in your password again
                            </div>
                            @error('password_confirmation')
                                <p class='text-danger'></p>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Partner</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>
@endsection
