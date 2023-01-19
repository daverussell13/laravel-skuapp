<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">SKU APP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">SKU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="/"><i
                        class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li class="{{ request()->is('table') ? 'active' : '' }}"><a class="nav-link" href="/table"><i
                        class="fas fa-columns"></i>
                    <span>Table</span></a></li>
            <li class=""><a class="nav-link" href="blank.html"><i class="far fa-square"></i>
                    <span>Blank Page</span></a></li>
        </ul>
    </aside>
</div>
