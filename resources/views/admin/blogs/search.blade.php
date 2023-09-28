@extends('admin.layouts.master')

@section('search-blogs')
    <section class="section">

        <div class="section-header">
            <h1>Manage Blogs</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage Your Blogs Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Create New Blog Post</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Posted On</th>
                            <th scope="col">Updated On</th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($blog_search->isEmpty())
                            <p>No blog found.</p>
                        @else
                            @foreach ($blog_search as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>{{ $blog->updated_at }}</td>
                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('admin.blog.show', $blog->id) }}"
                                                class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('admin.blog.destroy', $blog->id) }}" class="btn btn-danger delete-item">
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
