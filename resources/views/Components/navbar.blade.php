<nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
    <a class="navbar-brand text-white" href="#">Recycon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}">Home <span
                        class="sr-only">(current)</span></a>
            </li>

        </ul>
        @auth
            @if (Auth::user()->picture != null)
                <div class="profile">
                    <img src="{{ Auth::user()->picture }}" alt="" onclick="ProfileMenu()">
                </div>
                <div class="profile-menu-wrap" id="profilemenu">
                    <div class="profile-menu">
                        <div class="user-info">
                            <img src="{{ Auth::user()->picture }}" alt="">
                            <h3>Richardo Wijaya</h3>
                        </div>
                        <hr>
                        <div class="profile-menu-link">
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                <p>Sign Out</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <div class="profile">
                    <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper.png"
                        alt="" onclick="ProfileMenu()">
                </div>
                <div class="profile-menu-wrap" id="profilemenu">
                    <div class="profile-menu">
                        <div class="user-info">
                            <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper.png"
                                alt="">
                            <h3>Richardo Wijaya</h3>
                        </div>
                        <hr>
                        <div class="profile-menu-link">
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                <p>Sign Out</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <a href="{{ route('login-page') }}" class="btn btn-outline-light">Login/Register</a>
        @endauth


    </div>
</nav>
