@php
use Carbon\Carbon;
@endphp

@extends('page.layouts.main')

@section("css")

@endsection

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <a href="{{ url('/wadir/izin_kegiatan') }}" class="btn btn-danger btn-sm">
            <i class="fa fa-sign-out"></i> KEMBALI
        </a>
        <br><br>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Izin Kegiatan</h3>
            </div>
            <form action="{{ url('/wadir/izin_kegiatan/update/'.$edit['id']) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="nama_ukm" class="control-label col-sm-3"> Nama UKM </label>
                            <div class="col-md-7">
                                {{ $edit["users"]["name"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="nama_kegiatan" class="control-label col-sm-3"> Nama Kegiatan </label>
                            <div class="col-md-7">
                                {{ $edit["nama_kegiatan"] }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="file_laporan" class="control-label col-sm-3">
                                File Laporan
                            </label>
                            <div class="col-md-7">
                                {{ $edit["file_laporan"] }}
                                <br>
                                <a target="_blank" href="{{ url('/wadir/izin_kegiatan/laporan/'.$edit['id']) }}" class="btn btn-primary btn-sm">
                                    Unduh File
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="waktu_pelaksanaan" class="control-label col-sm-3"> Waktu Pelaksanaan </label>
                            <div class="col-md-7">
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $edit->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp 
                                -
                                @php
                                $akhir = Carbon::createFromFormat('Y-m-d H:i:s', $edit->akhir);
                                $format = $akhir->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="tempat_pelaksanaan" class="control-label col-sm-3"> Tempat Pelaksanaan </label>
                            <div class="col-md-7">
                                {{ $edit["tempat"] }}
                            </div>
                        </div>
                    </div>
                    @if (empty($edit["komentar"]))
                        
                    @else
                    <div class="form-group">
                        <div class="row">
                            <label for="komentar" class="control-label col-sm-3"> Komentar </label>
                            <div class="col-md-7">
                                <span class="text-danger">
                                    <strong>
                                        {{ $edit['komentar'] }}
                                    </strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group @error("status") {{ 'has-error' }} @enderror">
                        <div class="row">
                            <label for="status" class="control-label col-sm-3"> Status </label>
                            <div class="col-md-7">
                                <select name="status" class="form-control" id="status">
                                    <option value="">- Pilih -</option>
                                    <option value="1" {{ $edit["status"] == "1" ? 'selected' : '' }} >Disetujui</option>
                                    <option value="2" {{ $edit["status"] == "2" ? 'selected' : '' }} >Ditolak</option>
                                </select>
                            </div>
                        </div>
                        @error("status")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" style="display: none" id="view_komentar">
                        <div class="row">
                            <label for="komentar" class="control-label col-sm-3"> Komentar </label>
                            <div class="col-md-7">
                                <textarea name="komentar" class="form-control" id="komentar" rows="5" placeholder="Masukkan Komentar"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="reset" class="btn btn-danger">
                        BATAL
                    </button>
                    <button type="submit" class="btn btn-primary">
                        SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {
        $("#status").change(function() {
            let status = $(this).val();

            if (status == 1) {
                $("#view_komentar").hide();
            } else if (status == 2) {
                $("#view_komentar").show();
            }
        });
    });
</script>

@endsection

