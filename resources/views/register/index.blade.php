@extends('layouts.main')


@section('container')
    <div class="row justify-content-center mt-5">

        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name_users"
                            class="form-control rounded-top @error('name_users') is-invalid @enderror" id="name_users"
                            placeholder="Name" value="{{ old('name_users') }}">
                        <label for="name_users">Nama</label>
                        @error('name_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="nik_user" class="form-control  @error('nik_user') is-invalid @enderror"
                            id="nik_user" placeholder="Username" value="{{ old('nik_user') }}">
                        <label for="nik_user">NIK</label>
                        @error('nik_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="no_hp_users"
                            class="form-control rounded-bottom  @error('no_hp_users') is-invalid @enderror" id="no_hp_users"
                            placeholder="Password">
                        <label for="no_hp_users">No Hp</label>
                        @error('no_hp_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email_users"
                            class="form-control  @error('email_users') is-invalid @enderror" id="email_users"
                            placeholder="name@example.com" value="{{ old('email_users') }}">
                        <label for="email_users">Email</label>
                        @error('email_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="jenis_kelamin_users"
                            class="form-control rounded-bottom  @error('jenis_kelamin_users') is-invalid @enderror"
                            id="jenis_kelamin_users" placeholder="Password">
                        <label for="jenis_kelamin_users">Jenis Kelamin</label>
                        @error('jenis_kelamin_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating">
                            <input type="password" name="ish/ta_users"
                                class="form-control rounded-bottom  @error('ish/ta_users') is-invalid @enderror"
                                id="ish/ta_users" placeholder="Password">
                            <label for="ish/ta_users">ish/ta_users</label>
                            @error('ish/ta_users')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-floating">

                                <input type="password" name="unit_users"
                                    class="form-control rounded-bottom  @error('unit_users') is-invalid @enderror"
                                    id="unit_users" placeholder="Password">
                                <label for="unit_users">Unit</label>
                                @error('unit_users')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-floating">
                                    <input type="password" name="nik_ktp_users"
                                        class="form-control rounded-bottom  @error('nik_ktp_users') is-invalid @enderror"
                                        id="nik_ktp_users" placeholder="Password">
                                    <label for="nik_ktp_users">NIK KTP</label>
                                    @error('nik_ktp_users')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-floating">
                                        <input type="password" name="tempat_tanggal_lahir_users"
                                            class="form-control rounded-bottom  @error('tempat_tanggal_lahir_users') is-invalid @enderror"
                                            id="tempat_tanggal_lahir_users" placeholder="Password">
                                        <label for="tempat_tanggal_lahir_users">Tempat Tanggal Lahir</label>
                                        @error('tempat_tanggal_lahir_users')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-floating">
                                            <input type="password" name="agama_users"
                                                class="form-control rounded-bottom  @error('agama_users') is-invalid @enderror"
                                                id="agama_users" placeholder="Password">
                                            <label for="agama_users">Agama</label>
                                            @error('agama_users')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-floating">
                                                <input type="password" name="alamat_domisili_users"
                                                    class="form-control rounded-bottom  @error('alamat_domisili_users') is-invalid @enderror"
                                                    id="alamat_domisili_users" placeholder="Password">
                                                <label for="alamat_domisili_users">Alamat Domisili</label>
                                                @error('alamat_domisili_users')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-floating">
                                                    <input type="password" name="no_rek_users"
                                                        class="form-control rounded-bottom  @error('no_rek_users') is-invalid @enderror"
                                                        id="no_rek_users" placeholder="Password">
                                                    <label for="no_rek_users">No REK</label>
                                                    @error('no_rek_users')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-floating">
                                                        <input type="password" name="user_indihome_users"
                                                            class="form-control rounded-bottom  @error('user_indihome_users') is-invalid @enderror"
                                                            id="user_indihome_users" placeholder="Password">
                                                        <label for="user_indihome_users">User Indihome</label>
                                                        @error('user_indihome_users')
                                                            <div class="invalid-feedback">


                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-floating">
                                                            <input type="password" name="paket_indihome_users"
                                                                class="form-control rounded-bottom  @error('paket_indihome_users') is-invalid @enderror"
                                                                id="paket_indihome_users" placeholder="Password">
                                                            <label for="paket_indihome_users">Paket Indihome</label>
                                                            @error('paket_indihome_users')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-floating">
                                                                <input type="password" name="nomor_loker_user"
                                                                    class="form-control rounded-bottom  @error('nomor_loker_user') is-invalid @enderror"
                                                                    id="nomor_loker_user" placeholder="Password">
                                                                <label for="nomor_loker_user">Nomor Loker</label>
                                                                @error('nomor_loker_user')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <div class="form-floating">
                                                                    <input type="password"
                                                                        name="mulai_bergabung_roc_users"
                                                                        class="form-control rounded-bottom  @error('mulai_bergabung_roc_users') is-invalid @enderror"
                                                                        id="mulai_bergabung_roc_users"
                                                                        placeholder="Password">
                                                                    <label for="mulai_bergabung_roc_users">Mulai Bergabung
                                                                        ROC</label>
                                                                    @error('mulai_bergabung_roc_users')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                </div>

                                                                <button class="w-100 btn btn-lg btn-primary mt-3"
                                                                    type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
