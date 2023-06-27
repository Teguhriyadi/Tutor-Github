@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            @if (session("message_error"))
            <div class="alert alert-danger" role="alert">
                <strong>Maaf</strong>. {{ session("message_error") }}
            </div>
            @endif

            <a href="{{ url('/ormawa/izin_kegiatan') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-sign-out"></i> KEMBALI
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Unggah Izin Kegiatan</h3>
                </div>
                <form action="{{ url('/ormawa/izin_kegiatan/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group @error("nama_kegiatan") {{ 'has-error' }} @enderror">
                            <div class="row">
                                <label class="control-label col-sm-3" for="nama_kegiatan"> Nama Kegiatan </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="{{ old('nama_kegiatan') }}">
                                </div>
                            </div>
                            @error("nama_kegiatan")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div>
                        <div class="form-group @error("mulai") {{ 'has-error' }} @enderror">
                            <div class="row">
                                <label class="control-label col-sm-3" for="nama_kegiatan"> Waktu Pelaksanaan </label>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-2">
                                            Mulai Dari
                                        </div>
                                        <div class="col-md-4">
                                            <input type="datetime-local" class="form-control" name="mulai" id="mulai" value="{{ old('mulai') }}">
                                        </div>
                                        @error("mulai")
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <div class="col-md-2">
                                            Sampai Dengan
                                        </div>
                                        <div class="col-md-4">
                                            <input type="datetime-local" class="form-control" name="akhir" id="akhir" value="{{ old('akhir') }}">
                                        </div>
                                        @error("akhir")
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @error("tempat_pelaksanaan") {{ 'has-error' }} @enderror">
                            <div class="row">
                                <label class="control-label col-sm-3" for="tempat_pelaksanaan"> Tempat Pelaksanaan </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="tempat_pelaksanaan" id="tempat_pelaksanaan" placeholder="Masukkan Tempat Pelaksanaan" value="{{ old('tempat_pelaksanaan') }}">
                                </div>
                            </div>
                            @error("tempat_pelaksanaan")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div>
                        <div class="form-group @error("file_laporan") {{ 'has-error' }} @enderror">
                            <div class="row">
                                <label class="control-label col-sm-3" for="file_laporan"> File Laporan </label>
                                <div class="col-md-7">
                                    <input type="file" class="form-control" name="file_laporan" id="file_laporan" placeholder="Masukkan Tempat Pelaksanaan">
                                </div>
                            </div>
                            @error("file_laporan")
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
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection

