@extends('dashboard.layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Edit User</h1>
                <form action="/dashboard/user/{{ $user->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name_users"
                            class="form-control rounded-top @error('name_users') is-invalid @enderror" id="name_users"
                            placeholder="Name" value="{{ $user->name_users ?? null }}">
                        <label for="name_users">Name</label>
                        @error('name_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="username_users"
                            class="form-control  @error('username_users') is-invalid @enderror" id="username_users"
                            placeholder="Username" value="{{ $user->username_users ?? null }}">
                        <label for="username_users">Username</label>
                        @error('username_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="phone_number_users" maxlength="13"
                            class="form-control  @error('phone_number_users') is-invalid @enderror" id="phone_number_users"
                            placeholder="Phone Number" value="{{ $user->phone_number_users ?? null }}"
                            onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >=48 && event.charCode <=57))">
                        <label for="phone_number_users">Phone Number</label>
                        @error('phone_number_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email_users"
                            class="form-control  @error('email_users') is-invalid @enderror" id="email_users"
                            placeholder="name@example.com" value="{{ $user->email_users ?? null }}">
                        <label for="email_users">Email address</label>
                        @error('email_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password_users"
                            class="form-control rounded-bottom  @error('password_users') is-invalid @enderror"
                            id="password_users" placeholder="Password" value="{{ $user->password_users }}">
                        <label for="password_users">Password</label>
                        @error('password_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update</button>
                </form>
            </main>
        </div>
    </div>
@endsection
