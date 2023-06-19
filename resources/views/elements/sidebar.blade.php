

<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('elderlies*') ? 'mm-active' : '' }}">
                <a href="{{ route('elderlies.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-user-1"></i>
                    <span class="nav-text">Lansia</span>
                </a>
            </li>
            <li class="{{ Request::is('elderly-records*') ? 'mm-active' : '' }}">
                <a href="{{ route('elderly-records.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-file-1"></i>
                    <span class="nav-text">Pemeriksaan Lansia</span>
                </a>
            </li>
            @if (auth()->user()->isRoleAdmin)
                <li>
                    <a class="has-arrow ai-icon mt-2" href="javascript:void(0);" aria-expanded="false">
                        <i class="flaticon-381-internet"></i>
                        <span class="nav-text">Web Master</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="{{ Request::is('setting/homepage') ? 'mm-active' : '' }}"><a href="{{ route('setting.section', 'homepage') }}">Homepage</a></li>
                        <li class="{{ Request::is('setting/about') ? 'mm-active' : '' }}"><a href="{{ route('setting.section', 'about') }}">Tentang</a></li>
                        <li class="{{ Request::is('galleries/gallery*') ? 'mm-active' : '' }}"><a href="{{ route('galleries.index', 'gallery') }}">Galeri</a></li>
                        <li class="{{ Request::is('galleries/attachment*') ? 'mm-active' : '' }}"><a href="{{ route('galleries.index', 'attachment') }}">Lampiran</a></li>
                        <li class="{{ Request::is('galleries/service*') ? 'mm-active' : '' }}"><a href="{{ route('galleries.index', 'service') }}">Layanan</a></li>
                        <li class="{{ Request::is('galleries/banner*') ? 'mm-active' : '' }}"><a href="{{ route('galleries.index', 'banner') }}">Banner</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow ai-icon mt-2" href="javascript:void(0);" aria-expanded="false">
                        <i class="flaticon-381-database"></i>
                        <span class="nav-text">Master Data</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="{{ Request::is('users*') ? 'mm-active' : '' }}"><a href="{{ route('users.index') }}">Daftar Pengguna</a></li>
                        <li class="{{ Request::is('setting*') ? 'mm-active' : '' }}"><a href="{{ route('setting.index') }}">Setting</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
