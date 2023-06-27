@php
    use Carbon\Carbon;
@endphp

@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <a href="{{ url('/ormawa/izin_kegiatan') }}" class="btn btn-danger">
                <i class="fa fa-sign-out"></i> Kembali
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Izin Kegiatan</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="nama_kegiatan" class="col-md-3"> Nama Kegiatan </label>
                            <div class="col-md-7">
                                {{ $detail["nama_kegiatan"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="file_surat_izin" class="col-md-3"> File Surat Izin </label>
                            <div class="col-md-7">
                                <a target="_blank" href="{{ url('/ormawa/izin_kegiatan/laporan/'.$detail['id']) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-download"></i> Unduh File
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="file_surat_balasan" class="col-md-3"> File Surat Balasan </label>
                            <div class="col-md-7">
                                @if (empty($detail["file_surat_balasan"]))
                                    <span class="text-danger">
                                        Belum Ada Surat Balasan    
                                    </span>    
                                @else
                                <a target="_blank" href="{{ url('/ormawa/izin_kegiatan/balasan/'.$detail["id"]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-download"></i> Unduh File
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="waktu_pelaksanaan" class="col-md-3"> Waktu Pelaksanaan </label>
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
                            <label for="tempat_pelaksanaan" class="col-md-3"> Tempat Pelaksanaan </label>
                            <div class="col-md-7">
                                {{ $detail["tempat"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="status" class="col-md-3"> Status </label>
                            <div class="col-md-7">
                                @if ($detail["status"] == 1)
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-check"></i> DISETUJUI
                                    </button>
                                @elseif($detail["status"] == 2)
                                <button class="btn btn-danger btn-sm">
                                    DITOLAK
                                </button>
                                @elseif($detail['status'] == 0)
                                <button class="btn btn-default btn-sm">
                                    BELUM DIKONFIRMASI
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection

