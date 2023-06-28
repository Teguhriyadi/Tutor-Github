@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">

        @if (session("message"))
        <div class="alert alert-success" role="alert">
            <strong>Berhasil</strong>. {{ session("message") }}
        </div>
        @endif

        <form action="{{ url('/super_admin/profil_saya/update/'. Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Gambar Profil
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <center>
                                    @if (empty(Auth::user()->foto))
                                    <img src="{{ url('/image/user-empty.png') }}" style="width: 50%">
                                    @else
                                    <img src="{{ url('/storage/'.Auth::user()->foto) }}" style="width: 50%">
                                    <br><br>
                                    @endif
                                </center>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Profil Saya
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group @error("name") {{ 'has-error' }} @enderror">
                                <div class="row">
                                    <label class="control-label col-sm-3" for="name"> Nama </label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama" value="{{ old('name') ?? Auth::user()->name ?? '' }}">
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
                                    <label class="control-label col-sm-3" for="email"> Email </label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Tempat Pelaksanaan" value="{{ old('email') ?? Auth::user()->email ?? '' }}" readonly>
                                    </div>
                                </div>
                                @error("email")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                <br>
                                @enderror
                            </div>
                            <div class="form-group @error("deskripsi") {{ 'has-error' }} @enderror">
                                <div class="row">
                                    <label class="control-label col-sm-3" for="deskripsi"> Deskripsi </label>
                                    <div class="col-md-7">
                                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ old('deskripsi') ?? Auth::user()->deskripsi }}</textarea>
                                    </div>
                                </div>
                                @error("deskripsi")
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

