@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Unggah Izin Kegiatan</h3>
                </div>
                <form action="{{ url('/ormawa/izin_kegiatan/update/'.$edit["id"]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="panel-body">
                        <div class="form-group @error("nama_kegiatan") {{ 'has-error' }} @enderror">
                            <div class="row">
                                <label class="control-label col-sm-3" for="nama_kegiatan"> Nama Kegiatan </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="{{ old('nama_kegiatan') ?? $edit["nama_kegiatan"] ?? '' }}">
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
                                            <input type="datetime-local" class="form-control" name="mulai" id="mulai" value="{{ old('mulai') ?? $edit["mulai"] ?? '' }}">
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
                                            <input type="datetime-local" class="form-control" name="akhir" id="akhir" value="{{ old('akhir') ?? $edit["akhir"] ?? '' }}">
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
                                    <input type="text" class="form-control" name="tempat_pelaksanaan" id="tempat_pelaksanaan" placeholder="Masukkan Tempat Pelaksanaan" value="{{ old('tempat_pelaksanaan') ?? $edit["tempat"] ?? '' }}">
                                </div>
                            </div>
                            @error("tempat_pelaksanaan")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="komentar" class="control-label col-sm-3">
                                    Komentar
                                </label>
                                <div class="col-md-7">
                                    <span class="text-danger">
                                        <strong>
                                            {{ $edit["komentar"] }}
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-sm-3"> File Laporan </label>
                                <div class="col-md-7">
                                    <a target="_blank" href="{{ url('/ormawa/izin_kegiatan/laporan/'.$edit["id"]) }}" class="btn btn-primary btn-sm">
                                        Unduh File
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @error("file_laporan") {{ 'has-error' }} @enderror">
                            <div class="row">
                                <label class="control-label col-sm-3" for="file_laporan"> Unggah File Laporan Ulang </label>
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

