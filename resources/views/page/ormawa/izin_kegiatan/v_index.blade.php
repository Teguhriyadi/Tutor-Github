@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <a href="{{ url('/ormawa/izin_kegiatan/create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> 
            <span style="margin-left: 5px;">
                Tambah Data
            </span>
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Data Izin Kegiatan</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Kegiatan</th>
                            <th class="text-center">File Laporan</th>
                            <th class="text-center">File Surat Balasan</th>
                            <th>Tempat</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izin_kegiatan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item["nama_kegiatan"] }}</td>
                            <td class="text-center">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                @if (empty($item["file_surat_balasan"]))
                                <span class="text-danger">
                                    Belum Ada Surat Balasan
                                </span>
                                @else
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
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
                                @elseif($item["status"] == 3)
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
                                <a href="{{ url('/ormawa/izin_kegiatan/show/'.$item["id"]) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-search"></i> Selengkapnya
                                </a>
                                @if ($item["status"] == "2")
                                    <a href="{{ url('/ormawa/izin_kegiatan/edit/'.$item['id']) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                @endif
                                <form action="{{ url('/ormawa/izin_kegiatan/destroy/'.$item["id"]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
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

