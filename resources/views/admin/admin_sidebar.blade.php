<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
        @if(Auth::user()->role==1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manage.admin') }}">
                <i class="bi bi-person"></i>
                <span>Manage Admin</span>
            </a>
        </li><!-- End Profile Page Nav -->
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manage.owner') }}">
                <i class="bi bi-person"></i>
                <span>Manage Owner</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manage.tenant') }}">
                <i class="bi bi-person"></i>
                <span>Manage Tenant</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manage.post') }}">
                <i class="bi bi-person"></i>
                <span>Manage Post</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.rent_history') }}">
                <i class="bi bi-person"></i>
                <span>Rent History</span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>
</aside><!-- End Sidebar-->
