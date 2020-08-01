<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">@yield('submenu')</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="@yield('linkmenu')"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="@yield('linkmenu')">@yield('menu')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('submenu')</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    {{-- <a href="#" class="btn btn-sm btn-neutral">@yield('headbutton1')</a> --}}
                    {{-- <a href="#" class="btn btn-sm btn-neutral">@yield('headbutton2')</a> --}}
                    @yield('headbutton1')
                    @yield('headbutton2')
                </div>
            </div>
        </div>
    </div>
</div>
