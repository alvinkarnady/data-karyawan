@extends('layouts.main') @section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <p>
                By
                <a
                    href="/posts?author={{ $post->author->username }}"
                    class="text-decoration-none"
                >
                    {{ $post->author->name }}
                </a>
                in
                <a
                    href="/posts?category={{ $post->category->slug }}"
                    class="text-decoration-none"
                    >{{ $post->category->name }}</a
                >
            </p>

            @if ($post->image)
            <div style="max-height: 250px; overflow: hidden">
                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->category->name }}"
                    class="img-fluid rounded"
                />
            </div>
            @else
            <img
                src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}"
                alt="{{ $post->category->name }}"
                class="img-fluid rounded"
            />
            @endif

            <article class="my-3 fs-5 mb-5">{!! $post->body !!}</article>

            {{-- ratings start --}}
            <div class="container-rt">
                <div class="post">
                    <div class="text">Thanks for rating us!</div>
                    <div class="edit">EDIT</div>
                </div>
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5" />
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-4" />
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-3" />
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-2" />
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-1" />
                    <label for="rate-1" class="fas fa-star"></label>
                    <form
                        action="{{ route('comments.update', $comment->id) }}"
                        method="POST"
                    >
                        @csrf @method('PUT')
                        <header></header>
                        <input
                            type="hidden"
                            name="post_id"
                            value="{{ $post->id }}"
                        />
                        <div class="textarea">
                            <textarea
                                name="content"
                                cols="60"
                                placeholder="Comments.."
                                >{{ $comment->content }}</textarea
                            >
                        </div>
                        <div class="btn-rt">
                            <button class="btn-submit" type="submit">
                                Post
                            </button>
                        </div>
                    </form>

                    <!-- Tampilkan komentar -->
                    @foreach ($post->comments as $comment)
                    <div>
                        <p>{{ $comment->content }}</p>
                        <form
                            action="{{ route('comments.destroy', $comment->id) }}"
                            method="POST"
                        >
                            @csrf @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('comments.edit', $comment->id) }}"
                            >Edit</a
                        >
                    </div>
                    @endforeach

                    <!-- Tambahkan form komentar baru -->
                    <div>
                        <h3>Add Comment</h3>
                        @include('comments.create')
                    </div>
                </div>
            </div>
            {{-- ratings end --}}

            <a href="/posts" class="d-block mt-3">Back to Posts</a>
        </div>
    </div>
</div>

<script></script>

@endsection
