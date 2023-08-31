@extends('layouts.main') @section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title_posts }}</h1>

                <p>
                    By
                    <a href="/posts?author={{ $post->author->username_users }}" class="text-decoration-none">
                        {{ $post->author->name_users }}
                    </a>
                    in
                    <a href="/posts?category={{ $post->category->slug_categories }}"
                        class="text-decoration-none">{{ $post->category->name_categories }}</a>
                </p>

                @if ($post->image_posts)
                    <div style="max-height: 250px; overflow: hidden">
                        <img src="{{ asset('storage/' . $post->image_posts) }}" alt="{{ $post->category->name_categories }}"
                            class="img-fluid rounded" />
                    </div>
                @else
                    <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name_categories }}"
                        alt="{{ $post->category->name_categories }}" class="img-fluid rounded" />
                @endif

                <article class="my-3 fs-5 mb-5">{!! $post->body_posts !!}</article>


                <!-- Tampilkan komentar -->
                @foreach ($comments as $comment)
                    <div>
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
                        </div>
                    </div>
                @endforeach
                {{-- ratings start --}}
                <div class="form-container">
                    <div class="wrapper">
                        <form action="{{ route('comments.store') }}" method="POST" class="rating-form">
                            @csrf
                            {{-- <div class="star-rating">
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5"><i class="fas fa-star"></i></label>
                            </div> --}}

                            <div class="rating">
                                <input type="radio" id="star1" name="rating" value="1" hidden />
                                <label for="star1"><i class='bx bx-star star' style="--i: 0;"></i></label>
                                <input type="radio" id="star2" name="rating" value="2" hidden />
                                <label for="star2"><i class='bx bx-star star' style="--i: 1;"></i></label>
                                <input type="radio" id="star3" name="rating" value="3" hidden />
                                <label for="star3"><i class='bx bx-star star' style="--i: 2;"></i></label>
                                <input type="radio" id="star4" name="rating" value="4" hidden />
                                <label for="star4"><i class='bx bx-star star' style="--i: 3;"></i></label>
                                <input type="radio" id="star5" name="rating" value="5" hidden />
                                <label for="star5"><i class='bx bx-star star' style="--i: 4;"></i></label>
                            </div>

                            <input type="hidden" name="id_post" value="{{ $post->id }}">
                            <textarea name="content" placeholder="Leave a comment" value="{{ old('content') }}"></textarea>
                            <button type="submit" id="submitBtn" disabled>
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

                {{-- ratings end --}}
                <a href="/posts" class="d-block mt-3">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
