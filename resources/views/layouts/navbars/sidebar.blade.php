<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/bpbd.png" class="navbar-brand-img" alt="...">
        </a>
        <center>
            <a class="h2 mb-0 text-black text-uppercase d-none d-lg-inline-block">SILOGIS</a>
        </center>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/bpbd.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link active" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beritamasuk.index') }}">
                        <i class="fa fa-tasks text-green" style="color: #f4645f;"></i> {{ __('Barang Masuk') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('beritakeluar.index') }}">
                        <i class="ni ni-single-copy-04" style="color: #f4645f;"></i> {{ __('Berita Acara') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <i class="fa fa-bars text-blue"></i> {{ __('List Barang') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples2">
                        <i class="fa fa-book text-grey"></i>
                        <span class="nav-link-text">{{ __('Rekap') }}</span>
                    </a>

                    <div class="collapse" id="navbar-examples2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rekapmasuk.index') }}">
                                <i class="fa fa-file text-success" style="color: #f4645f;"></i>
                                    {{ __('Rekap Masuk') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rekapkeluar.index') }}">
                                <i class="fa fa-file text-warning" style="color: #f4645f;"></i>
                                    {{ __('Rekap Keluar') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="ni ni-circle-08 text-yellow"></i> {{ __('Kelola User') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
    </div>
</nav>