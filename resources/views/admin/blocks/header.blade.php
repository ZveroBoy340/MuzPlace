<div class="page-brand">
    <a class="link" href="/">
                    <span class="brand">Admin
                        <span class="brand-tip">Panel</span>
                    </span>
    </a>
</div>
<div class="flexbox flex-1">
    <ul class="nav navbar-toolbar ml-auto">
        <li class="dropdown dropdown-user">
            <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                <img src="/img/admin-avatar.png" />
                <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/"><i class="fas fa-home"></i>На главную</a>
                <li class="dropdown-divider"></li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Выход</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</div>
