@extends('page.layouts.main')

@section("css")

<link rel="stylesheet" href="{{ url('/datatables/css/bootstrap.min.css') }}">

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Izin Kegiatan</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th>Nama UKM</th>
                            <th>Nama Kegiatan</th>
                            <th style="text-align: center">File Laporan</th>
                            <th>Tempat</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Aksi</th>
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
                                @elseif($item["status"] == "0")
                                <button class="btn btn-default btn-sm">
                                    BELUM DIKONFIRMASI
                                </button>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/super_admin/izin_kegiatan/show/'.$item["id"]) }}" class="btn btn-primary btn-sm">
                                    SELENGKAPNYA
                                </a>
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
