@extends('page.layouts.main')

@section("css")

<link rel="stylesheet" href="{{ url('/datatables/css/bootstrap.min.css') }}">

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <a href="{{ url('/ormawa/laporan_kegiatan') }}" class="btn btn-danger btn-sm">
            <i class="fa fa-sign-out"></i> KEMBALI
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Laporan Kegiatan</h3>
            </div>
            <form action="{{ url('/ormawa/laporan_kegiatan/'.$id_kegiatan.'/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <div class="form-group @error("file_lpj") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="file_lpj" class="control-label col-sm-3"> File LPJ </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="file_lpj" id="file_lpj">
                            </div>
                        </div>
                        @error("file_lpj")
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group @error("foto_dokumentasi") @enderror ">
                        <div class="row">
                            <label for="foto_dokumentasi" class="control-label col-sm-3"> Foto Dokumentasi </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="foto_dokumentasi" id="foto_dokumentasi">
                            </div>
                        </div>
                        @error("foto_dokumentasi")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <button type="reset" class="btn btn-danger btn-sm">
                        BATAL
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        TAMBAH
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


