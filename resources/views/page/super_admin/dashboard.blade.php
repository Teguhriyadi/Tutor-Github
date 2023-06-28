@extends('page.layouts.main')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            @if (session("message"))
            <div class="alert alert-success">
                <strong>
                    {!! session("message") !!}
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
            @endif

            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Dashboard Super Admin</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-times"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $kegiatan_ditolak }}</span>
                                    <span class="title">Jumlah Pengajuan Izin Kegiatan Yang Ditolak</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-check"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $kegiatan_disetujui }}</span>
                                    <span class="title">Jumlah Pengajuan Izin Kegiatan Yang Disetujui</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $laporan_kegiatan }}</span>
                                    <span class="title">Jumlah Laporan Kegiatan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-download"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $izin_kegiatan }}</span>
                                    <span class="title">Jumlah Pengajuan Izin Kegiatan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $data_pengguna }}</span>
                                    <span class="title">Jumlah Data Pengguna</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

