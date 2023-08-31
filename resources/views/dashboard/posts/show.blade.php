@extends('dashboard.layouts.main')


@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">


                <h1 class="mb-3">{{ $post->title_posts }}</h1>


                <a href="/dashboard/posts" class="btn btn-outline-success btn-sm"><span data-feather="arrow-left"
                        class="align-text-bottom"></span> Back to all my posts</a>
                <a href="/dashboard/posts/{{ $post->slug_posts }}/edit" class="btn btn-outline-warning btn-sm"><span
                        data-feather="edit" class="align-text-bottom"></span> Edit</a>

                <form action="/dashboard/posts/{{ $post->slug_posts }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf

                    <button class="btn btn-outline-danger btn-sm"
                        onclick="return confirm('are you sure delete post {{ $post->title_posts }} ?')"><span
                            data-feather="x-circle" class="align-text-bottom"></span> Delete</button>

                </form>

                @if ($post->image_posts)
                    <div style="height: 250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image_posts) }}" alt="{{ $post->category->name_categories }}"
                            class="img-fluid mt-3 rounded">
                    </div>
                @else
                    <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name_categories }}"
                        alt="{{ $post->category->name_categories }}" class="img-fluid mt-3 rounded">
                @endif



                <article class="my-3 fs-5">
                    {!! $post->body_posts !!}
                </article>
                {{-- <a href="/posts" class="d-block mt-3">Back to Posts</a> --}}

                <!-- Tampilkan komentar -->
                {{-- @foreach ($comments as $comment)
                    <div class="rating-hasil">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $comment->rating_comments)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                        <p>
                            <strong>{{ $comment->user->name_users }}:</strong>
                            {{ $comment->content_comments }}


                        </p>
                        <form action="comments/{{ $comment->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Are you sure want to delete category {{ $comment->user->name_users }} ?')"><span
                                    data-feather="x-circle" class="align-text-bottom"></span></button>

                        </form>


                    </div>
                @endforeach --}}

            </div>
        </div>
    </div>
@endsection
