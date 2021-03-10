<nav class="nav">
    <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name hidden-md-down">
                 @if(Auth::check())
                    {{ auth()->user()->name }}
                 @endif
            </span>
            <img src="{{auth()->user()->photo ? auth()->user()->photo->photo_path : 'https://placehold.it/400x400'}}" class="wd-32 rounded-circle" alt="">
            <span class="square-10 bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
                <li><button class="btn btn-sm btn-block text-left"><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></button></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are You Sure to Logout?')">
                        @csrf
                        <button class="btn btn-sm btn-block text-left" style="cursor: pointer; margin-top: -15px"><a><i class="icon ion-power"></i> Log Out</a></button>
                    </form>
                </li>
            </ul>
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
</nav>
