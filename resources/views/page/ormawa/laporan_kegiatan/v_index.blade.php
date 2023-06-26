@php
    use Carbon\Carbon;
@endphp

@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <a href="{{ url('/ormawa/laporan_kegiatan/create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> 
            <span style="margin-left: 5px;">
                Tambah Laporan Kegiatan
            </span>
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Data Laporan Kegiatan</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Kegiatan</th>
                            <th class="text-center">Tanggal Kegiatan</th>
                            <th class="text-center">File Laporan</th>
                            <th class="text-center">File Gambar</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan_kegiatan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["kegiatan"]["nama_kegiatan"] }}</td>
                                <td class="text-center">
                                    @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $item['kegiatan']->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                                s/d
                                @php
                                $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $item['kegiatan']->akhir);
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
                                    @if ($item["status"] == "1")
                                        <button class="btn btn-success btn-sm">
                                            SELESAI
                                        </button>
                                    @endif
                                </td>
                                <td class="text-center"></td>
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

