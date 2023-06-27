@extends('page.layouts.main')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <div class="alert alert-success">
                <strong>
                    BERHASIL LOGIN
                </strong>. Selamat Datang
                <strong>
                    {{ Auth::user()->name }}
                </strong> di 
                <strong>
                    Aplikasi Pengajuan Izin dan Kegiatan ORMAWA
                </strong>
                <hr>
                <p>
                    Silahkan Pilih Menu Untuk Memulai Program.
                </p>
            </div>
            
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Dashboard Wadir</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-download"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $izin_kegiatan }}</span>
                                    <span class="title">Pengajuan Izin Kegiatan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-times"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $ditolak }}</span>
                                    <span class="title">Izin Kegiatan Yang Ditolak</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-check"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $disetujui }}</span>
                                    <span class="title">Izin Kegiatan Yang Disetujui</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $laporan }}</span>
                                    <span class="title">Jumlah Laporan Kegiatan</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

