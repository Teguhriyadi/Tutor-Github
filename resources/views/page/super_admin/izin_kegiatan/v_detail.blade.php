@php
use Carbon\Carbon;
@endphp

@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <a href="{{ url('/super_admin/izin_kegiatan') }}" class="btn btn-danger">
            <i class="fa fa-sign-out"></i> KEMBALI
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Izin Kegiatan</h3>
            </div>
            <form action="{{ url('/super_admin/izin_kegiatan/update/'.$detail['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="nama_ukm" class="control-label col-sm-3"> Nama UKM </label>
                            <div class="col-md-7">
                                {{ $detail["users"]["name"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="nama_kegiatan" class="control-label col-sm-3"> Nama Kegiatan </label>
                            <div class="col-md-7">
                                {{ $detail["nama_kegiatan"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="file_laporan" class="control-label col-sm-3">
                                File Laporan
                            </label>
                            <div class="col-md-7">
                                {{ $detail["file_laporan"] }}
                                <br>
                                <a href="" class="btn btn-primary btn-sm">
                                    Unduh File
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="waktu_pelaksanaan" class="control-label col-sm-3"> Waktu Pelaksanaan </label>
                            <div class="col-md-7">
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $detail->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp 
                                -
                                @php
                                $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $detail->akhir);
                                $format = $akhir->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="tempat_pelaksanaan" class="control-label col-sm-3"> Tempat Pelaksanaan </label>
                            <div class="col-md-7">
                                {{ $detail["tempat"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="status" class="control-label col-sm-3"> Status </label>
                            <div class="col-md-7">
                                <button class="btn btn-success btn-sm">
                                    DISETUJUI
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group @error("file_surat_balasan") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="file_surat_balasan" class="control-label col-sm-3"> File Surat Balasan </label>
                            <div class="col-md-7">
                                @if (empty($detail["file_surat_balasan"]))
                                <input type="file" class="form-control" name="file_surat_balasan" id="file_surat_balasan" value="{{ old('file_surat_balasan') }}">
                                @else
                                {{ $detail["file_surat_balasan"] }}
                                <br>
                                <a href="" class="btn btn-primary btn-sm">
                                    UNDUH FILE
                                </a>
                                @endif
                            </div>
                        </div>
                        @error("file_surat_balasan")
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <hr>
                    @if (empty($detail["file_surat_balasan"]))
                    <button type="reset" class="btn btn-danger">
                        BATAL
                    </button>
                    <button type="submit" class="btn btn-primary">
                        SIMPAN
                    </button>
                    @else

                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

