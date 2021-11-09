<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page -->
    <title>ISSD工作管理平台</title>

    <!--網頁icon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/login/login/images/icons/favicon.ico') }}" />

    <!-- Fontfaces CSS -->
    <link rel="stylesheet" media="all" href="{{ asset('assets/CoolAdmin-master/css/font-face.css') }}">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/font-awesome-4.7/css/font-awesome.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/font-awesome-5/css/fontawesome-all.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/mdi-font/css/material-design-iconic-font.min.css') }}"
        rel="stylesheet" media="all">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/CoolAdmin-master/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/CoolAdmin-master/vendor/animsition/animsition.min.css') }}" rel="stylesheet"
        media="all">
    <link
        href="{{ asset('assets/CoolAdmin-master/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet"
        media="all">
    <!-- 輪播切換套件 -->
    <link href="{{ asset('assets/CoolAdmin-master/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.css') }}"
        rel="stylesheet" media="all">
    <!-- Jquery ui -->
    <link href="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}" rel="stylesheet" media="all">
    <!-- Main CSS -->
    <link href="{{ asset('assets/CoolAdmin-master/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="___class_+?0___">
    <div class="page-wrapper">

        <!-- HEADER DESKTOP -->
        @include('.site.layouts.header')
        <!-- END HEADER DESKTOP -->


        <!-- HEADER MOBILE -->
        @include('.site.layouts.headermobile')
        <!-- TOOL -->
        <!-- END TOOL -->
        <!-- END HEADER MOBILE -->

        @include('.site.layouts.poster')

        <!-- STATISTIC -->
        <!-- 網頁內容 -->
        <div class="container">

            @yield('content')
            <!-- END STATISTIC -->

            <!-- STATISTIC CHART -->
            <!-- END STATISTIC CHART -->

            <!-- DATA TABLE -->
            <!-- END DATA TABLE -->

            <!-- COPYRIGHT(footer) -->
            <!-- END COPYRIGHT -->
        </div>
    </div>

    <!-- Jquery JS -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/jquery-3.2.1.min.js') }}">
    </script>
    <!-- Jquery ui -->
    <script src="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('assets/CoolAdmin-master/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS -->
    <!-- 輪播切換套件 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/slick/slick.min.js') }}">
    </script>
    <!-- 動畫 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/wow/wow.min.js') }}"></script>
    <!-- 動畫 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/animsition/animsition.min.js') }}"></script>
    <!-- 進度條插鍵 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <!-- 滾動翻頁套件 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <!-- 數字累加套件 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <!-- 繪製動畫循環進度條 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <!-- 滾動條 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <!-- 圖表繪製 -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <!-- option select tool -->
    <script src="{{ asset('assets/CoolAdmin-master/vendor/select2/select2.min.js') }}">
    </script>

    <!-- 設定loding動畫 & 表單顯示-->
    <script>
        $(document).ready(function() {
            $("#circle").css("display", "none");
            $(".p-t-20").css("display", "");
        });
    </script>

    <!-- data table -->
    @section('datatable')
    @show

    <!-- other script -->
    @section('other_script')
    @show

    <!-- Main JS -->
    <script src="{{ asset('assets/CoolAdmin-master/js/main.js') }}"></script>

</body>

</html>
