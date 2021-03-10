<a href="#" class="br-menu-link">
    <div class="br-menu-item">
        <i class="menu-item-icon ion-ios-compose tx-22"></i>
        <span class="menu-item-label">Posts</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
    </div><!-- menu-item -->
</a><!-- br-menu-link -->
<ul class="br-menu-sub nav flex-column">
    <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link">Create</a></li>
    <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">Manage</a></li>
</ul>
