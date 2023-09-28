@extends('admin.layouts.master')

@section('update-properties')
    <section class="section">

        <div class="section-header">
            <h1>Manage Properties</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Update Blog Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save property button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">
                <!-- This is a form to update a property-->
                <form method="POST" action="{{ route('admin.blog.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="featured" class="custom-switch-input" {{ $blog->featured ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Set as Featured</span>
                            </label>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="title">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}" required>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in a title
                            </div>
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="form-group col-md-5">
                                    <div id="image-preview" class="image-preview">
                                      <label for="image-upload" id="image-label">Choose File</label>
                                      <input type="file" name="image" id="image-upload" />
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" id="content">Content</label>

                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="content" id="content">{{ $blog->content }}</textarea>
                                @error('content')
                                <   p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script>
        $(document).ready(function(){
            var imageUrl = "{{ asset('uploads/blogs/' . $blog->image) }}";
            $('.image-preview').css({
                "background-image": "url(" + imageUrl + ")",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>

@endpush
