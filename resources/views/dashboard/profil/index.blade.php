@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name_users }}</td>
                        <td>{{ $user->username_users }}</td>
                        <td>{{ $user->email_users }}</td>
                        <td>{{ $user->phone_number_users }}</td>
                        <td>{{ $user->password_users }}</td>
                        {{-- <td>{{ str_repeat('*', strlen($user->password_users)) }}</td> --}}
                        <td>
                            <a href="/dashboard/profil/{{ $user->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit" class="align-text-bottom"></span>
                            </a>
                            <form action="/dashboard/profil/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure want to delete this user?')">
                                    <span data-feather="x-circle" class="align-text-bottom"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
