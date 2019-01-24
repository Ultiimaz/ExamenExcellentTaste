@extends('layouts.app')

@section('content')
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        {{--<!-- User Profile-->--}}

                        @auth
                            @if(Auth::user()->status == 2)
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" style="pointer-events: none" href="#" aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu">Ingelogd als beheerder</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/profiel" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profiel</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/menukaart" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Menukaart</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/reserveer" aria-expanded="false"><i class="mdi mdi-clock"></i><span class="hide-menu">Reserveren</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/producten" aria-expanded="false"><i class="mdi mdi-coffee"></i><span class="hide-menu">Producten</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/tafels" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Tafels</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/contact" aria-expanded="false"><i class="mdi mdi-at"></i><span class="hide-menu">Contact</span></a></li>
                            @elseif(Auth::user()->status == 1)
                                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" style="pointer-events: none" href="#" aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu">Ingelogd als klant</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/profiel" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profiel</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/menukaart" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Menukaart</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/reserveer" aria-expanded="false"><i class="mdi mdi-clock"></i><span class="hide-menu">Reserveren</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/contact" aria-expanded="false"><i class="mdi mdi-at"></i><span class="hide-menu">Contact</span></a></li>
                            @endif
                        @endauth

                        @guest
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/menukaart" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Menukaart</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/contact" aria-expanded="false"><i class="mdi mdi-at"></i><span class="hide-menu">Contact</span></a></li>
                        @endguest


                    </ul>


                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            {{--<div class="page-breadcrumb">--}}
                {{--<div class="row align-items-center">--}}

                {{--</div>--}}
            {{--</div>--}}

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="min-height: calc(100vh - 120px);">
            @yield('page')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Excellent-Taste</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>



@endsection

@section('scripts')
    @yield('scripts')
@endsection