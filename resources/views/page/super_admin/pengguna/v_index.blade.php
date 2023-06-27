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

        <a href="{{ url('/super_admin/data_pengguna/create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> 
            <span style="margin-left: 5px;">
                Tambah Data
            </span>
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-1" style="margin-top: 5px;"> Filter : </label>
                            <div class="col-md-4">
                                <select name="" class="form-control" id="">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                
                <h3 class="panel-title">Data Pengguna</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Hak Akses</th>
                                <th>Deskripsi</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["name"] }}</td>
                                <td>{{ $item["email"] }}</td>
                                @if (Auth::user()->id == $item["id"])
                                <td class="text-center">-</td>
                                @else
                                <td class="text-center">
                                    @if ($item["status"] == 1)
                                    <form action="{{ url('/super_admin/data_pengguna/non_aktifkan/'.$item["id"]) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i> Non - Aktifkan
                                        </button>
                                    </form>
                                    @elseif($item["status"] == 0)
                                    <form action="{{ url('/super_admin/data_pengguna/aktifkan/'.$item['id']) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i> Aktifkan
                                        </button>
                                    </form>
                                    @endif
                                </td>

                                @endif
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
</div>

@endsection

@section('javascript')

<script src="{{ url('/datatables/javascript/dataTables.min.js') }}"></script>
<script src="{{ url('/datatables/javascript/bootstrap.min.js') }}"></script>
<script>
    $('#example').DataTable();
</script>

@endsection

