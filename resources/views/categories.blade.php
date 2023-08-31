@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Categories</h1>

    <div class="container">
        <div class="row mb-5">

            @foreach ($categories as $category)
                <div class="col-md-4 mb-3">
                    <a href="/posts?category={{ $category->slug_categories }}">
                        <div class="card text-bg-dark border-0 shadow">

                            @if ($category->image_categories)
                                <img style="width:500;height:350px;"
                                    src="{{ asset('storage/' . $category->image_categories) }}" class="card-img"
                                    alt="{{ $category->name }} ">
                            @else
                                <img src="https://source.unsplash.com/random/500x500?{{ $category->name_categories }}"
                                    class="card-img" alt="{{ $category->name_categories }}">
                            @endif

                            <div class="card-img-overlay d-flex align-items-center p-0 ">
                                <h5 class="card-title text-center flex-fill p-4 " style="background-color:rgba(0,0,0,0.6)">
                                    {{ $category->name_categories }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
