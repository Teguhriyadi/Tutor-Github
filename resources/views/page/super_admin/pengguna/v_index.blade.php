@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <a href="{{ url('/super_admin/data_pengguna/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> 
                <span style="margin-left: 5px;">
                    Tambah Data
                </span>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Pengguna</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Hak Akses</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item["name"] }}</td>
                                    <td>{{ $item["email"] }}</td>
                                    <td class="text-center">
                                        @if ($item["status"] == 1)
                                            <button class="btn btn-success btn-sm">
                                                Aktif
                                            </button>
                                        @elseif($item["status"] == 0)
                                            <button class="btn btn-danger btn-sm">
                                                Tidak Aktif
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item["role"] }}</td>
                                    <td>{{ $item["deskripsi"] }}</td>
                                    <td class="text-center">
                                        @if (Auth::user()->id == $item["id"])
                                        -    
                                        @else
                                        <a href="{{ url('/super_admin/data_pengguna/show/'.$item["id"]) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/super_admin/data_pengguna/destroy/'.$item["id"]) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
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

@endsection

