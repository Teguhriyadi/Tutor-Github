@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <form action="{{ url('/ormawa/ganti_password/update/'. Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Ganti Password
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group @error("password_baru") {{ 'has-error' }} @enderror">
                                <div class="row">
                                    <label class="control-label col-sm-3" for="password_baru"> Password Baru </label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru">
                                    </div>
                                </div>
                                @error("password_baru")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                <br>
                                @enderror
                            </div>
                            <div class="form-group @error("konfirmasi_password") {{ 'has-error' }} @enderror">
                                <div class="row">
                                    <label class="control-label col-sm-3" for="konfirmasi_password"> Konfirmasi Password </label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukkan Konfirmasi Password">
                                    </div>
                                </div>
                                @error("konfirmasi_password")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                <br>
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
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('javascript')

@endsection

