@php
    use App\Models\LaporanKegiatan;
@endphp

@extends('page.layouts.main')

@section("css")

<link rel="stylesheet" href="{{ url('/datatables/css/bootstrap.min.css') }}">

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Semua Laporan Kegiatan</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th style="text-align: center">No.</th>
                            <th>Nama UKM</th>
                            <th>Nama Kegiatan</th>
                            <th style="text-align: center">File Laporan</th>
                            <th style="text-align: center">File Gambar</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan_kegiatan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["kegiatan"]["users"]["name"] }}</td>
                                <td>{{ $item["kegiatan"]["nama_kegiatan"] }}</td>
                                <td class="text-center">
                                    <a target="_blank" href="{{ url('/super_admin/laporan_kegiatan/laporan/'.$item["id"]) }}">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a target="_blank" href="{{ url('/super_admin/laporan_kegiatan/dokumentasi/'.$item["id"]) }}">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm">
                                        SELESAI
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/super_admin/laporan_kegiatan/show/'.$item["id"]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i> Selengkapnya
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
