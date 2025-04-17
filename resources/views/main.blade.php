<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    @include('layout.include-header')
</head>


<body>
    @include('layout.loading-animation')

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        @include('layout.header')
        @include('layout.nav')

        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                {{-- Home icon --}}
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}" class="link">
                                        <i class="mdi mdi-home-outline fs-4"></i>
                                    </a>
                                </li>

                                {{-- Conditional breadcrumbs --}}
                                @if(request()->is('/') || Route::currentRouteName() === 'dashboard')
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                @elseif(Route::currentRouteName() === 'product.index')
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                @else(Route::currentRouteName() === 'pembelian.index')
                                <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
                                @endif
                            </ol>
                        </nav>

                        <h1 class="mb-0 fw-bold">
                            @if(request()->is('dashboard'))
                                Dashboard
                            @elseif(request()->is('product') || request()->is('products/*'))
                                Products
                            @else(request()->is('pembelian'))
                                Penjualan
                            @endif
                        </h1>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>

    </div>

    @include('layout.include-footer')
</body>

</html>
