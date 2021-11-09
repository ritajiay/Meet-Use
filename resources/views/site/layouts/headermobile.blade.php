<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{ route('manager.homepage') }}">
                    <img src="{{ asset('assets/CoolAdmin-master/images/icon/德欣寰宇圖片截圖.jpg') }}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                {{-- 人員姓名 --}}
                <li class="has-sub">
                    <div class="zmdi zmdi-account" style="color: black;margin-left:10px">
                        {{ Auth::user()->userid }}_的系統選單
                </li>
                <li class="has-sub">
                    <a class="" href=" {{ route('manager.homepage') }} ">
                        {{-- (原)<aclass="js-arrow" href="{{ route('manager.index')}} "> --}}
                        <i class="                             fas fas fa-desktop"></i>總覽</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-pencil-square-o"></i>個人工作日誌</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ route('record.list') }}">工作日誌總覽</a>
                        </li>
                        <li>
                            <a href="{{ route('record') }}">新增工作日誌</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    {{-- 限制可視頁面 --}}
                    @unless(Auth::user()->role === '1')
                        <a class="js-arrow" href="#">
                            <i class="fas fa-folder-open"></i>專案管理</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('teamrecord.list') }}">團隊人員日誌總覽</a>
                            </li>
                            <li>
                                <a href="{{ route('projectname') }}">專案管理清單_管理者</a>
                            </li>
                        </ul>
                    @endunless
                </li>
                <li class="has-sub">
                    {{-- 限制可視頁面 --}}
                    @unless(Auth::user()->role === '1')
                        <a class="js-arrow" href="#">
                            <i class="fas fa-info-circle"></i>專案狀態管理</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('status') }}">工作日誌審查</a>
                            </li>
                            <li>
                                <a href="{{ route('status.list') }}">專案狀態名稱清單</a>
                            </li>
                            <li>
                                <a href="{{ route('statusproject') }}">專案狀態</a>
                            </li>
                        </ul>
                    @endunless
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-briefcase"></i>人員出席</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ route('attendrecord') }}">人員出席清單　(開發中)</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>系統</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        {{-- 管理者可檢視 --}}
                        @if (Auth::user()->role === '3')
                            <li>
                                <a href="{{ route('usercreate') }}">帳號建立</a>
                            </li>
                            <li>
                                <a href="{{ route('user.list') }}">帳號清單</a>
                            </li>
                        @else
                        @endif
                        <li>
                            <a href="">提出問題　&　改進建議 (開發中)</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
