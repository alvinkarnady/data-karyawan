@extends('dashboard.layouts.main')


@section('container')
    <style>
        /* h1 {
                text-align: center;
                margin: 0 auto;
            } */
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name_users }}</h1>
    </div>
@endsection
