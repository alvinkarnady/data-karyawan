@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title_posts" class="form-label">Title</label>
                <input type="text" class="form-control @error('title_posts') is-invalid @enderror " id="title_posts"
                    name="title_posts" autofocus value="{{ old('title_posts') }}">
                @error('title_posts')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug_posts" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug_posts') is-invalid @enderror" id="slug_posts"
                    name="slug_posts" value="{{ old('slug_posts') }}" readonly>
                @error('slug_posts')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="id_category">
                    @foreach ($categories as $category)
                        @if (old('id_category') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name_categories }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name_categories }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image_posts" class="form-label">Post Image</label>
                <img class="img-preview img-fluids mb-3 col-sm-4">
                <input class="form-control @error('image_posts') is-invalid @enderror" type="file" id="image_posts"
                    name="image_posts" onchange="previewImage()">
                @error('image_posts')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body_posts" class="form-label">Body</label>
                <input id="body_posts" type="hidden" name="body_posts" value="{{ old('body_posts') }}">
                <trix-editor input="body_posts"></trix-editor>
                @error('body_posts')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

    </div>


    <script>
        const title_posts = document.querySelector('#title_posts');
        const slug_posts = document.querySelector('#slug_posts');

        title_posts.addEventListener('change', function() {
            fetch("/dashboard/posts/checkSlug?title=" + title_posts.value)
                .then(response => response.json())
                .then(data => slug_posts.value = data.slug_posts)
        });


        //trix
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image_posts');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image_posts.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
