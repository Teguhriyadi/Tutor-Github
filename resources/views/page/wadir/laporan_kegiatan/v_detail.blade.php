@php
use App\Models\LaporanKegiatan;
use Carbon\Carbon;
@endphp

@extends('page.layouts.main')

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <a href="{{ url('/wadir/laporan_kegiatan') }}" class="btn btn-danger btn-sm">
            <i class="fa fa-sign-out"></i> KEMBALI
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Detail Laporan Kegiatan</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3"> Nama UKM </label>
                        <div class="col-md-7">
                            {{ $detail["users"]["name"] }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3"> Nama Kegiatan </label>
                        <div class="col-md-7">
                            {{ $detail["nama_kegiatan"] }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3"> Tanggal Kegiatan </label>
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
                        <label class="control-label col-sm-3"> File LPJ </label>
                        <div class="col-md-7">
                            @php
                            $laporan = LaporanKegiatan::where("izin_kegiatan_id", $detail["id"])->first();
                            @endphp
                            @if (empty($laporan["file_lpj"]))
                            -    
                            @else
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i> UNDUH FILE
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3"> Foto Dokumentasi </label>
                        <div class="col-md-7">
                            @php
                            $laporan = LaporanKegiatan::where("izin_kegiatan_id", $detail["id"])->first();
                            @endphp
                            @if (empty($laporan["foto_dokumentasi"]))
                            -    
                            @else
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i> UNDUH FILE
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
