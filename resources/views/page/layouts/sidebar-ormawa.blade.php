<ul class="nav">
    <li>
        <a href="{{ url('/ormawa/dashboard') }}" class="{{ Request::segment(2) == "dashboard" ? 'active' : '' }}">
            <i class="lnr lnr-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/ormawa/izin_kegiatan') }}" class="{{ Request::segment(2) == "izin_kegiatan" ? 'active' : '' }}">
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
</ul>