@extends('.site.layouts.master')

<!-- PATH -->
@section('index_path', '總覽')
<!-- END PATH -->

<!-- TITLE -->
@section('index_show', '專案工作狀態總覽')
<!-- END TITLE -->

@section('content')

    <!-- STATISTIC -->
    <section class="statistic statistic2">
        <div class="container">
            <!-- 加間距 -->
            <div style="margin-top: 10px"></div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--green">
                        <h2 class="number">{{ $per_count }}</h2>
                        <span class="desc" style="font-weight: bold;">個人_日誌總數</span>
                        <div class="icon">
                            <i class="zmdi zmdi-assignment-o"></i>
                        </div>
                        <!-- 路徑 -->
                        <div style="position:relative;top:45px;left:75%;">
                            <i class="fas fa-arrow-right" style="color: white"></i>
                            <button><span type="button" style="color: white"
                                    onclick="location.href='{{ route('record.list') }}'">
                                    View All
                                </span></button>
                        </div>
                    </div>
                    <div style="margin-top: 10px"></div>
                    <!-- 加間距 -->
                    <div style="margin-top: 10px"></div>
                    {{-- 限制可視頁面 --}}
                    @unless(Auth::user()->role === '1')
                        <div class="statistic__item statistic__item--green">
                            <h2 class=" number">{{ $count }}</h2>
                            <span class="desc" style="font-weight: bold;">日誌總數</span>
                            <div class="icon">
                                <i class="zmdi zmdi-assignment-o"></i>
                            </div>
                            <!-- 路徑 -->
                            <div style="position:relative;top:45px;left:75%;">
                                <i class="fas fa-arrow-right" style="color: white"></i>
                                <button><span type="button" style="color: white"
                                        onclick="location.href='{{ route('teamrecord.list') }}'">
                                        View All
                                    </span></button>
                            </div>
                        </div>
                    @endunless
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--blue">
                        <h2 class="number">{{ $per_y_count }}</h2>
                        <span class="desc" style="font-weight: bold;">個人_已確認</span>
                        <div class="icon">
                            <i class="zmdi zmdi-edit"></i>
                        </div>
                        <!-- 路徑 -->
                        {{-- <div style="position:relative;top:45px;left:145px;">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                        <span style="color: white"> View All </span>
                    </div> --}}
                    </div>
                    <!-- 加間距 -->
                    <div style="margin-top: 10px"></div>
                    @unless(Auth::user()->role === '1')
                        <div class="statistic__item statistic__item--blue">
                            <h2 class="number">{{ $y_count }}</h2>
                            <span class="desc" style="font-weight: bold;">已確認</span>
                            <div class="icon">
                                <i class="zmdi zmdi-edit"></i>
                            </div>
                            <!-- 路徑 -->
                            {{-- <div style="position:relative;top:45px;left:145px;">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                        <span style="color: white"> View All </span>
                    </div> --}}
                        </div>
                    @endunless
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--red">
                        <h2 class="number">{{ $per_n_count }}</h2>
                        <span class="desc" style="font-weight: bold;">個人_未確認</span>
                        <div class="icon">
                            <i class="zmdi zmdi-check-all"></i>
                        </div>
                        <!-- 路徑 -->
                        {{-- <div style="position:relative;top:45px;left:145px;">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                        <span style="color: white"> View All </span>
                    </div> --}}
                    </div>
                    <!-- 加間距 -->
                    <div style="margin-top: 10px"></div>
                    @unless(Auth::user()->role === '1')
                        <div class="statistic__item statistic__item--red">
                            <h2 class="number">{{ $n_count }}</h2>
                            <span class="desc" style="font-weight: bold;">未確認</span>
                            <div class="icon">
                                <i class="zmdi zmdi-check-all"></i>
                            </div>
                            <!-- 路徑 -->
                            {{-- <div style="position:relative;top:45px;left:145px;">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                        <span style="color: white"> View All </span>
                    </div> --}}
                        </div>
                    @endunless
                </div>
                <div class="col-md-6 col-lg-3">
                    {{-- <div class="statistic__item statistic__item--red"> --}}
                    {{-- <h2 class="number">{{ $per_other_count }}</h2>
                <span class="desc" style="font-weight: bold;">個人_其他狀況</span>
                <div class="icon">
                    <i class="zmdi zmdi-alert-circle"></i>
                </div> --}}
                    <!-- 路徑 -->
                    {{-- <div style="position:relative;top:45px;left:145px;">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                        <span style="color: white"> View All </span>
                    </div> --}}
                    {{-- </div> --}}
                    @unless(Auth::user()->role === '1')
                        {{-- <div class="statistic__item statistic__item--red" style="background-color:palevioletred"> --}}
                        {{-- <h2 class="number">{{ $other_count }}</h2>
                <span class="desc" style="font-weight: bold;">其他狀況</span>
                <div class="icon">
                    <i class="zmdi zmdi-alert-circle"></i>
                </div> --}}
                        <!-- 路徑 -->
                        {{-- <div style="position:relative;top:45px;left:145px;">
                        <i class="fas fa-arrow-right" style="color: white"></i>
                        <span style="color: white"> View All </span>
                    </div> --}}
                        {{-- </div> --}}
                    @endunless
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- END STATISTIC -->

@endsection

@section('other_script')

@endsection
