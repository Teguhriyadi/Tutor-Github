<div id="sidebar-nav" class="sidebar" style="margin-top: 30px;">
    <div class="sidebar-scroll">
        <nav>
            @if (Auth::user()->role == "admin")
                @can("admin")
                    @include("page.layouts.sidebar-admin")
                @endcan
            @elseif(Auth::user()->role == "wadir")
                @can("wadir")
                    @include("page.layouts.sidebar-wadir")
                @endcan
            @elseif(Auth::user()->role == "ormawa")
                @can("ormawa")
                    @include("page.layouts.sidebar-ormawa") 
                @endcan
            @endif
        </nav>
    </div>
</div>
