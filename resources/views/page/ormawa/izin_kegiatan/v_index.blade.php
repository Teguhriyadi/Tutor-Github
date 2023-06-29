@extends('page.layouts.main')

@section("css")

<link rel="stylesheet" href="{{ url('/datatables/css/bootstrap.min.css') }}">

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        
        @if (session("message"))
        <div class="alert alert-success" role="alert">
            <strong>Berhasil</strong>. {{ session("message") }}
        </div>
        @endif

        @if (session("message_error"))
        <div class="alert alert-danger" role="alert">
            <strong>Maaf</strong>. {{ session("message_error") }}
        </div>
        @endif
        
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
                <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th>Nama Kegiatan</th>
                            <th style="text-align: center">File Laporan</th>
                            <th style="text-align: center">File Surat Balasan</th>
                            <th>Tempat</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izin_kegiatan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item["nama_kegiatan"] }}</td>
                            <td class="text-center">
                                <a target="_blank" href="{{ url('/ormawa/izin_kegiatan/laporan/'.$item["id"]) }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                @if (empty($item["file_surat_balasan"]))
                                <span class="text-danger">
                                    Belum Ada Surat Balasan
                                </span>
                                @else
                                <a target="_blank" href="{{ url('/ormawa/izin_kegiatan/balasan/'.$item["id"]) }}">
                                    <i class="fa fa-download"></i>
                                </a>
                                @endif
                            </td>
                            <td>{{ $item["tempat"] }}</td>
                            <td class="text-center">
                                @if ($item["status"] == "1")
                                <button class="btn btn-success btn-sm">
                                    <i class="fa fa-check"></i> DISETUJUI
                                </button>
                                @elseif($item["status"] == "2")
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i> DITOLAK
                                </button>
                                @elseif($item["status"] == 3)
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-refresh"></i> PENGAJUAN ULANG
                                </button>
                                @elseif($item["status"] == "0")
                                <button class="btn btn-default btn-sm">
                                    <i class="fa fa-minus"></i> BELUM DIKONFIRMASI
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

                                @if (!empty($item["user_validasi_id"]))
                                    
                                @else
                                <form action="{{ url('/ormawa/izin_kegiatan/destroy/'.$item["id"]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
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

<script src="{{ url('/datatables/javascript/dataTables.min.js') }}"></script>
<script src="{{ url('/datatables/javascript/bootstrap.min.js') }}"></script>
<script>
    $('#example').DataTable();
</script>

@endsection

