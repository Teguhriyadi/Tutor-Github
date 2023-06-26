@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Laporan Kegiatan</h3>
            </div>
            <form action="{{ url('/ormawa/laporan_kegiatan/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <div class="form-group @error("izin_kegiatan_id") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="izin_kegiatan_id" class="control-label col-sm-3">
                                Kegiatan
                            </label>
                            <div class="col-md-7">
                                <select name="izin_kegiatan_id" class="form-control" id="izin_kegiatan_id">
                                    <option value="">- Pilih -</option>
                                    @foreach ($izin_kegiatan as $item)
                                        <option value="{{ $item["id"] }}" {{ old('izin_kegiatan_id') }} >{{ $item["nama_kegiatan"] }} - {{ $item['users']["name"] }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error("message")
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group @error("file_lpj") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="file_lpj" class="control-label col-sm-3"> File LPJ </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="file_lpj" id="file_lpj" value="{{ old('file_lpj') }}">
                            </div>
                        </div>
                        @error("file_lpj")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group @error("foto_dokumentasi") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="foto_dokumentasi" class="control-label col-sm-3"> Foto Dokumentasi </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="foto_dokumentasi" id="foto_dokumentasi" value="{{ old('foto_dokumentasi') }}">
                            </div>
                        </div>
                        @error("foto_dokumentasi")
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

@section('javascript')

@endsection

