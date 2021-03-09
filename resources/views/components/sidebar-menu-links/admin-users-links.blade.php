<a href="#" class="br-menu-link">
    <div class="br-menu-item">
        <i class="menu-item-icon ion-person tx-20"></i>
        <span class="menu-item-label">Users</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
    </div><!-- menu-item -->
</a><!-- br-menu-link -->
<ul class="br-menu-sub nav flex-column">
    <li class="nav-item"><a href="{{ route('users.create') }}" class="nav-link">Create</a></li>
    <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Manage</a></li>
</ul>
