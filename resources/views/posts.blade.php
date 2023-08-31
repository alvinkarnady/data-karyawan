@extends('layouts.main')

@section('container')
    <h1 class="mb-5 text-center">{{ 'Input Cuti' }} </h1>
    <div class="row justify-content-center mt-5">

        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name_users"
                            class="form-control rounded-top @error('name_users') is-invalid @enderror" id="name_users"
                            placeholder="Name" value="{{ old('name_users') }}">
                        <label for="name_users">Name</label>
                        @error('name_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="nik_users"
                            class="form-control  @error('nik_users') is-invalid @enderror" id="nik_users"
                            placeholder="Username" value="{{ old('nik_users') }}"
                            onkeypress="return (event.charCode !=8 && event.charCode == 0  (event.charCode >=48 && event.charCode <=57))">
                        <label for="nik_users">NIK</label>
                        @error('nik_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="loker_user"
                            class="form-control  @error('loker_user') is-invalid @enderror" id="loker_user"
                            placeholder="Username" value="{{ old('loker_user') }}"
                            onkeypress="return (event.charCode !=8 && event.charCode == 0  (event.charCode >=48 && event.charCode <=57))">
                        <label for="loker_user">Loker</label>
                        @error('loker_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <label for="id_category" class="form-label">Category</label>
                        <select class="form-select @error('id_category') is-invalid @enderror" name="id_category"
                            id="id_category">
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_categories }}
                                </option>
                            @endforeach --}}
                            <option value="Cuti Tahunan" {{ old('id_category') == 'Cuti Tahunan' ? 'selected' : '' }}>Cuti
                                Tahunan</option>
                            <option value="Cuti Ibadah" {{ old('id_category') == 'Cuti Ibadah' ? 'selected' : '' }}>Cuti
                                Ibadah</option>
                            <option value="Cuti Haid" {{ old('id_category') == 'Cuti Haid' ? 'selected' : '' }}>Cuti Haid
                            </option>
                            <option value="Cuti Hamil" {{ old('id_category') == 'Cuti Hamil' ? 'selected' : '' }}>Cuti
                                Hamil</option>
                        </select>
                        @error('id_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="alasan" name="alasan_users"
                            class="form-control rounded-bottom  @error('alasan_users') is-invalid @enderror"
                            id="alasan_users" placeholder="alasan">
                        <label for="alasan_users">Alasan</label>
                        @error('alasan_users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="date" name="tanggal_masuk"
                            class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk">
                        <label for="tanggal_masuk">Tanggal Mulai</label>
                        @error('tanggal_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="date" name="tanggal_keluar"
                            class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar">
                        <label for="tanggal_keluar">Tanggal Selesai</label>
                        @error('tanggal_keluar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">AJUKAN</button>
                </form>
            </main>
        </div>
    </div>
@endsection
