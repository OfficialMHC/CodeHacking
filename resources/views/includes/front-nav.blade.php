<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><span style="color: #52b2a4; font-size: 1.6rem">[</span>CodeHacking<span style="color: #52b2a4; font-size: 1.6rem">]</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @if(Auth::guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}" data-toggle="tooltip" data-placement="bottom" title="Login"><i class="ion-log-in"></i></a>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="/admin" data-toggle="tooltip" data-placement="bottom" title="Back to Dashboard">
                            <img class="rounded-circle mt-1" src="{{auth()->user()->photo ? auth()->user()->photo->photo_path : 'https://placehold.it/30x30'}}" alt="" width="30" height="30">
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are You Sure to Logout?')">
                            @csrf
                            <button class="nav-link btn" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="ion-log-out"></i></button>
                        </form>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>
