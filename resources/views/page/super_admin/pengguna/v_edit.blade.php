@extends('page.layouts.main')

@section('content')

<div class="main-content">
    <div class="container-fluid">

        <a href="{{ url('/super_admin/data_pengguna') }}" class="btn btn-danger btn-sm">
            <i class="fa fa-sign-out"></i> KEMBALI
        </a>

        <br><br>

        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Edit Data Pengguna
                </h3>
            </div>
            <form action="{{ url('/super_admin/data_pengguna/update/'.$detail["id"]) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="panel-body">
                    <div class="form-group @error("name") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label class="control-label col-sm-3" for="name"> Nama </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama" value="{{ old('name') ?? $detail["name"] ?? '' }}">
                            </div>
                        </div>
                        @error("name")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            <br>
                        @enderror
                    </div>
                    <div class="form-group @error("email") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="email" class="control-label col-sm-3">
                                Email
                            </label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan E-Mail" value="{{ old('email') ?? $detail["email"] ?? '' }}">
                            </div>
                        </div>
                        @error("email")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error("role") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="role" class="control-label col-sm-3">
                                Peran Akun
                            </label>
                            <div class="col-md-7">
                                <select name="role" class="form-control" id="role">
                                    <option value="">- Pilih </option>
                                    <option value="admin" {{ old('role') == "admin" || $detail['role'] == "admin" ? 'selected' : '' }} >Admin</option>
                                    <option value="wadir" {{ old('role') == "wadir" || $detail['role'] == "wadir" ? 'selected' : '' }} >Wadir</option>
                                    <option value="ormawa" {{ old('role') == "ormawa" || $detail['role'] == "ormawa" ? 'selected' : '' }} >Ormawa</option>
                                </select>
                            </div>
                        </div>
                        @error("role")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error("deskripsi") {{ 'has-error' }}  @enderror">
                        <div class="row">
                            <label for="deskripsi" class="control-label col-sm-3">
                                Deskripsi
                            </label>
                            <div class="col-md-7">
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ old('deskripsi') ?? $detail["deskripsi"] ?? '' }}</textarea>
                            </div>
                        </div>
                        @error("deskripsi")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <button type="reset" class="btn btn-danger">
                        BATAL
                    </button>
                    <button type="submit" class="btn btn-primary">
                        SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

