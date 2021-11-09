<!-- PAGE CONTENT -->
<div class="page-content--bgf7">
    <!-- BREADCRUMB -->
    {{-- <section class="au-breadcrumb2"> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <!-- 導覽路徑 -->
                    {{-- <div class="au-breadcrumb-left">
            <span class="au-breadcrumb-span">You are here:</span>
            <ul class="list-unstyled list-inline au-breadcrumb__list">
            <li class="list-inline-item active">
                <a href="{{ route('manager.homepage') }}">首頁</a>
        </li>
        <li class="list-inline-item seprate">
        <span>></span>
        </li>
        <li class="list-inline-item">
        @yield('index_path')
        </li>
        </ul>
    </div> --}}
                    <!-- 導覽路徑 end -->
                </div>
            </div>
        </div>
    </div>
    {{-- </section> --}}
    <!-- END BREADCRUMB -->

    <!-- WELCOME -->
    <section class="welcome p-t-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-4">
                        <!-- 標題 -->
                        <div style="margin-top: 1%;"></div>
                        @yield('index_show')
                        <span></span> <!-- 名字 -->
                        <!-- 導覽路徑 -->
                        <div class="au-breadcrumb-left" style="float: inherit;">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="{{ route('manager.homepage') }}">首頁</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>></span>
                                </li>
                                <li class="list-inline-item">
                                    @yield('index_path')
                                </li>
                            </ul>
                        </div>
                        <!-- 導覽路徑 end -->
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <!-- END WELCOME -->
</div>
