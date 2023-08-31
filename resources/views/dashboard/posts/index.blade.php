@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8 ">

        <a href="/dashboard/posts/create" class="btn btn-outline-primary btn-sm mb-2 rounded-circle shadow "><span
                data-feather="plus" class="align-text-bottom"></span></a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title_posts }}</td>
                        <td>{{ $post->category->name_categories }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug_posts }}" class="badge bg-info"><span
                                    data-feather="eye" class="align-text-bottom"></span></a>

                            <a href="/dashboard/posts/{{ $post->slug_posts }}/edit" class="badge bg-warning"><span
                                    data-feather="edit" class="align-text-bottom"></span></a>

                            <form action="/dashboard/posts/{{ $post->slug_posts }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure want to delete post {{ $post->title_posts }}?')"><span
                                        data-feather="x-circle" class="align-text-bottom"></span></button>

                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
