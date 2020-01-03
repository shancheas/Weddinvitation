@auth()
    @include('layouts.navbars.navs.dashboard')
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
@endguest
