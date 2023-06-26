<ul class="nav">
    <li>
        <a href="{{ url('/super_admin/dashboard') }}" class="{{ Request::segment(2)== "dashboard" ? 'active' : '' }}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/super_admin/izin_kegiatan') }}" class="{{ Request::segment(2) == "izin_kegiatan" ? 'active' : '' }}">
            <i class="fa fa-edit"></i>
            <span>Izin Kegiatan</span>
        </a>
    </li>
    <li>
        <a href="notifications.html" class="">
            <i class="lnr lnr-alarm"></i>
            <span>Laporan Kegiatan</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/super_admin/data_pengguna') }}" class="{{ Request::segment(2) == "data_pengguna" ? 'active' : '' }}">
            <i class="fa fa-users"></i>
            <span>Data Pengguna</span>
        </a>
    </li>
</ul>