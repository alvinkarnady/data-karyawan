@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Category</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="name_categories" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name_categories') is-invalid @enderror"
                    id="name_categories" name="name_categories" autofocus value="{{ old('name_categories') }}">
                @error('name_categories')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug_categories" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug_categories') is-invalid @enderror"
                    id="slug_categories" name="slug_categories" value="{{ old('slug_categories') }}" required>
                @error('slug_categories')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image_categories" class="form-label">Category Image</label>
                <img class="img-preview img-fluids mb-3 col-sm-4">
                <input class="form-control @error('image_categories') is-invalid @enderror" type="file"
                    id="image_categories" name="image_categories" onchange="previewImage()">
                @error('image_categories')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror('image_categories')


            </div>


            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>


    <script>
        const name_categories = document.querySelector('#name_categories');
        const slug_categories = document.querySelector('#slug_categories');

        name_categories.addEventListener('change', function() {
            fetch("/dashboard/categories/checkSlug?name=" + name_categories.value)
                .then(response => response.json())
                .then(data => slug_categories.value = data.slug_categories)
        });

        function previewImage() {
            const image = document.querySelector('#image_categories');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
