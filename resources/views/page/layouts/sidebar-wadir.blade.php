<ul class="nav">
    <li>
        <a href="{{ url('/wadir/dashboard') }}" class="{{ Request::segment(2) == "dashboard" ? 'active' : '' }}">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/wadir/izin_kegiatan') }}" class="{{ Request::segment(2) == "izin_kegiatan" ? 'active' : '' }}">
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
        <a href="{{ url('/wadir/profil_saya') }}" class="{{ Request::segment(2) == "profil_saya" ? 'active' : '' }}">
            <i class="fa fa-pencil"></i>
            <span>Profil Saya</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/wadir/ganti_password') }}" class="{{ Request::segment(2) == "ganti_password" ? 'active' : '' }}">
            <i class="fa fa-key"></i>
            <span>Ganti Password</span>
        </a>
    </li>
</ul>