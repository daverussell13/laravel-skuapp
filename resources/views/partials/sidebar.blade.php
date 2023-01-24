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
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-file-alt"></i>
                    <span>Transactions</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('transaction/create') ? 'active' : '' }}">
                        <a href="/transaction/create">Add</a>
                    </li>
                    <li class="{{ request()->is('transaction/table') ? 'active' : '' }}">
                        <a href="/transaction/table">Table</a>
                    </li>
                </ul>
            </li>
            @if (auth()->user()->role_id == 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-utensils"></i>
                        <span>Frozen Food</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('food/create') ? 'active' : '' }}"><a href="/food/create">Add</a>
                        </li>
                        <li class="{{ request()->is('food/table') ? 'active' : '' }}"><a href="/food/table">Table</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
