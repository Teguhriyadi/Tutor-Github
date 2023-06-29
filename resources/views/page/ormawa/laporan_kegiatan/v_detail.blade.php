@php
    use Carbon\Carbon;
    use App\Models\LaporanKegiatan;
@endphp

@extends('page.layouts.main')

@section("css")

<link rel="stylesheet" href="{{ url('/datatables/css/bootstrap.min.css') }}">

@endsection

@section('content')

    @php
        $laporan = LaporanKegiatan::where("izin_kegiatan_id", $detail['id'])->first();
    @endphp

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
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3"> Nama Kegiatan </label>
                        <div class="col-md-7">
                            {{ $detail["nama_kegiatan"] }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3"> File Laporan </label>
                        <div class="col-md-7">
                            <a target="_blank" href="{{ url('/ormawa/laporan_kegiatan/laporan/'.$detail['id']) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i> UNDUH FILE
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3"> Tempat Pelaksanaan </label>
                        <div class="col-md-7">
                            {{ $detail["tempat"] }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-3"> Tanggal Pelaksanaan </label>
                        <div class="col-md-7">
                            @php
                            $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $detail->mulai);
                            $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                            echo $format;
                            @endphp
                            s/d
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
                        <label class="col-md-3"> File Surat Balasan </label>
                        <div class="col-md-7">
                            <a target="_blank" href="{{ url('/ormawa/laporan_kegiatan/balasan/'.$detail['id']) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i> UNDUH FILE
                            </a>
                        </div>
                    </div>
                </div>
                @if ($laporan)
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3"> File LPJ </label>
                            <div class="col-md-7">
                                <a target="_blank" href="{{ url('/ormawa/laporan_kegiatan/lpj/'.$laporan['id']) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-download"></i> UNDUH FILE 
                                </a>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-3"> Foto Dokumentasi </label>
                            <div class="col-md-7">
                                <img src="{{ url('/storage/'.$laporan['foto_dokumentasi']) }}" style="width: 300px; height: 150px;">    
                            </div>    
                        </div>    
                    </div>  
                @else
                    
                @endif
            </div>
        </div>
    </div>
</div>

@endsection


