@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Semua Izin Kegiatan</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama UKM</th>
                            <th>Nama Kegiatan</th>
                            <th class="text-center">File Laporan</th>
                            <th class="text-center">File Balasan</th>
                            <th>Tempat</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izin_kegiatan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item["users"]["name"] }}</td>
                            <td>{{ $item["nama_kegiatan"] }}</td>
                            <td class="text-center">
                                <i class="fa fa-download"></i>
                            </td>
                            <td class="text-center">
                                @if (empty($item["surat_balasan"]))
                                    <span class="text-danger">
                                        Belum Ada Surat Balasan    
                                    </span>  
                                @else
                                <i class="fa fa-download"></i>
                                @endif
                            </td>
                            <td>{{ $item["tempat"] }}</td>
                            <td class="text-center">
                                @if ($item["status"] == "1")
                                <button class="btn btn-success btn-sm">
                                    DISETUJUI
                                </button>
                                @elseif($item["status"] == "2")
                                <button class="btn btn-danger btn-sm">
                                    DITOLAK
                                </button>
                                @elseif($item["status"] == "3")
                                <button class="btn btn-primary btn-sm">
                                    PENGAJUAN ULANG
                                </button>
                                @elseif($item["status"] == "0")
                                <button class="btn btn-default btn-sm">
                                    BELUM DIKONFIRMASI
                                </button>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item["status"] == "1")
                                -                                    
                                @else
                                <a href="{{ url('/wadir/izin_kegiatan/show/'.$item["id"]) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-search"></i> Selengkapnya
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection

