<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="{{ route('manager.homepage') }}">
                    <img src="{{ asset('assets/CoolAdmin-master/images/icon/德欣寰宇圖片截圖.jpg') }}" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="{{ route('manager.homepage') }}">
                            <i class="fas fa-desktop"></i>
                            <span class="bot-line"></span>總覽</a>
                    </li>
                    <li class="has-sub">
                        <a href="">
                            <i class="fas fa-pencil-square-o"></i>
                            <span class="bot-line"></span>
                            個人工作日誌</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="{{ route('record.list') }}">工作日誌總覽</a>
                            </li>
                            <li>
                                <a href="{{ route('record') }}">新增工作日誌</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li class="has-sub">
                        {{-- 限制可視頁面 --}}
                        @unless(Auth::user()->role === '1')
                            <a href="#">
                                <i class="fas fa-folder-open"></i>
                                <span class="bot-line"></span>
                                專案管理</a>
                        @endunless
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="{{ route('teamrecord.list') }}">團隊人員日誌總覽</a>
                            </li>
                            <li>
                                <a href=" {{ route('projectname') }} ">專案管理清單_管理者</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        {{-- 限制可視頁面 --}}
                        @unless(Auth::user()->role === '1')
                            <a href="#">
                                <i class="fas fa-info-circle"></i>
                                <span class="bot-line"></span>
                                專案狀態管理</a>
                        @endunless
                        <ul class="header3-sub-list list-unstyled">
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
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-briefcase"></i>
                            <span class="bot-line"></span>
                            人員出席</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="{{ route('attendrecord') }}">人員出席清單 (開發中)</a>
                            </li>
                        </ul>
                    </li>
                    {{-- </li>
        <li>
        <a href="">
            <i class="fas fa-trophy"></i>
            <span class="bot-line"></span>_</a>
        </li>
        <li class="has-sub">
        <a href="">
            <i class="fas fa-copy"></i>
            <span class="bot-line"></span>_</a>
        </li> --}}
                </ul>
            </div>
            <!-- TOOL -->
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu" style="color:white">
                        {{-- <div class="image"> --}}
                        {{-- <img src="" alt="" /> --}}
                        <i class="zmdi zmdi-account" style="color:white"></i> {{ Auth::user()->username }}，Hello！</a>
                        {{-- </div> --}}
                        {{-- <div class="content">
            <a class="js-acc-btn" href="#">john doe</a>
        </div> --}}
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix" style="color: black">
                                {{ Auth::user()->userid }}_的系統選單
                                {{-- <div class="image">
                <a href="#">
                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                </a>
            </div> --}}
                                {{-- <div class="content">
                <h5 class="name">
                <a href="#">rita</a>
                </h5>
                <span class="email">johndoe@example.com</span>
            </div> --}}
                            </div>
                            <div class="account-dropdown__body">
                                @if (Auth::user()->role === '3')
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('usercreate') }}">
                                            <i class="zmdi zmdi-account-add"></i>帳號建立</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('user.list') }}">
                                            <i class="zmdi zmdi-accounts-list-alt"></i>帳號清單</a>
                                    </div>
                                    {{-- <div class="account-dropdown__item">
                <a href="#">
                <i class="zmdi zmdi-account"></i>Account</a>
            </div>
            <div class="account-dropdown__item">
                <a href="#">
                <i class="zmdi zmdi-settings"></i>Setting</a>
            </div> --}}
                                    {{-- <div class="account-dropdown__item">
                <a href="#">
                <i class="zmdi zmdi-money-box"></i>Billing</a>
            </div> --}}
                                @else
                                @endif
                                <div class="account-dropdown__item">
                                    <a href="">
                                        <i class="zmdi zmdi-help"></i>提出問題　&　改進建議 (開發中)</a>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TOOL -->
            </div>
        </div>
        {{-- Name --}}
        <i id="UN" style="display: none;">{{ Auth::user()->username }}_</i>
</header>
