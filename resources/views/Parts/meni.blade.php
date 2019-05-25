<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section">
    <div class="header-warp">
        <div class="site-logo">
            <h2>Pulse<span>.</span></h2>
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <!-- menu -->
        <ul class="main-menu">
            <li><a href="{{route('index')}}">Pocenta</a></li>
            <li><a href="{{route('meni')}}">Meni</a></li>
            <li><a href="{{route('blog')}}">Blog</a></li>
            <li><a href="{{route('onama')}}">O autoru</a></li>


            @if(session()->has('korisnik'))
                <li><a href="{{route('utisak')}}">Utisak</a></li>
                <li><a href="{{route('logout')}}">Izloguj se</a></li>
                @if(session()->get('korisnik')->naziv =="Admin")
                    <li><a href="{{route('dodavanjePosta')}}">Admin</a></li>
                    @endif
            @else
                <li><a href="#lEmail">Login</a></li>
                <li><a href="{{route('registracija')}}">Registracija</a></li>
            @endif

        </ul>
        <div class="header-right">
            @if(session()->has('korisnik'))
                <p><span><a href="{{route('rezervacija')}}">Rezervacija stola</a></span></p>
                @else
                <p><span>Rezervacija</span> <i class="fa fa-phone"></i> 652-345 3222 11</p>
            @endif
        </div>
    </div>
</header>
<!-- Header section end -->

