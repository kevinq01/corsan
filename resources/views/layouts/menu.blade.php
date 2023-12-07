<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-building"></i><span>Usuarios</span>
    </a>
    @can('ver-rol')
        <a class="nav-link" href="/roles">
            <i class=" fas fa-building"></i><span>Roles</span>
        </a>
    @endcan


    <a class="nav-link" href="/productos">
        <i class=" fas fa-building"></i><span>Productos</span>
    </a>

</li>
