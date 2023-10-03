@extends('admin.layouts.master')

@section('create-partners')
    <section class="section">

        <div class="section-header">
            <h1>Manage Partners</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Create New Partner Here!</h4>
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
                <form method="POST" action="{{ route('admin.manage-partner.store') }}" class="needs-validation" novalidate="">
                    @csrf

                    <div class="card" id="sample-login" style="padding:20px">

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control" id="name">
                            <div class="invalid-feedback">
                                Please fill in your username
                            </div>
                            @error('name')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            <div class="invalid-feedback">
                                Please fill in your email address
                            </div>
                            @error('email')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <div class="invalid-feedback">
                                Please fill in your password
                            </div>
                            @error('password')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            <div class="invalid-feedback">
                                Please fill in your password again
                            </div>
                            @error('password_confirmation')
                                <p class='text-danger'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Partner</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </section>
@endsection
