@php
use Carbon\Carbon;
use App\Models\LaporanKegiatan;
@endphp

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
        
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Data Laporan Kegiatan</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th>Nama Kegiatan</th>
                            <th style="text-align: center;">Tanggal Kegiatan</th>
                            <th style="text-align: center;">File Laporan</th>
                            <th style="text-align: center;">File Gambar</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $item)
                        @php
                        $laporan = LaporanKegiatan::where("izin_kegiatan_id", $item["id"])->first();
                        @endphp
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item["nama_kegiatan"] }}</td>
                            <td class="text-center">
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $item->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                                s/d
                                @php
                                $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $item->akhir);
                                $format = $akhir->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </td>
                            <td class="text-center">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <i class="fa fa-download"></i>
                            </td>
                            <td class="text-center">
                                @if ($laporan)
                                <button class="btn btn-success btn-sm">
                                    SELESAI
                                </button>
                                @else
                                <button class="btn btn-danger btn-sm">
                                    BELUM SELESAI
                                </button>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-primary btn-sm">
                                    <i class="fa fa-search"></i> Selengkapnya
                                </a>
                                @php
                                $sekarang = strtotime(date("Y-m-d H:i:s"));
                                $selesai = strtotime($item["akhir"]);
                                @endphp
                                
                                @if ($sekarang > $selesai)
                                @if ($laporan)
                                @else
                                <a href="{{ url('/ormawa/laporan_kegiatan/'.$item["id"].'/unggah_laporan') }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Unggah Laporan
                                </a>
                                @endif
                                @else
                                
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


