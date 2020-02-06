<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" style="background-color: #463a3c !important;" id="sidenav-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ url('/') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.png" />
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Navigation -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row row-grid">
                        @foreach($themes as $theme)
                        <div class="col-md-12 pb-3">
                            <div class="card bg-white shadow border-0" style="cursor: pointer">
                                <div class="card-img-cover">
                                    <a href="#" class="sidebar-theme">
                                        <img src="{{ $theme->thumbnail }}"
                                             data-template="{{ $theme->path }}"
                                             class="card-img-top" alt="first">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
