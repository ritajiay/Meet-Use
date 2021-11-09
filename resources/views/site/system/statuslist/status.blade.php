@extends('.site.layouts.master')

<!-- Datatables套件 CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css') }}" />

@section('index_path')
    專案狀態管理　>　工作日誌審查
@endsection

@section('index_show')
    工作日誌審查
@endsection

@section('content')
    @include('.site.system.all.loding_circle')
    <!-- TODO:專案狀態 section -->
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <section class="p-t-20" style="display: none;width:100%;">
                    <!-- END STATISTIC -->

                    <!-- MAIN CONTENT -->
                    {{-- <div class="section__content section__content--p30"> --}}
                    <div class="col-lg-16">
                        <!-- start dialog -->
                        <div id="dialog" title="工作日誌審查" style="display:none">
                            <form id="form" method="POST" action="{{ route('status.store') }}">
                                @csrf
                                <input id="id_copy" name="id_copy" style="display:none">
                                <div class="dialog_all">
                                    <div class="first_line">人員：</div>
                                    <div id="username_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">時間：</div>
                                    <div id="time_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">客戶名稱：</div>
                                    <div id="cc_Name_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">專案編號：</div>
                                    <div id="ssS_ssP_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">工作類別：</div>
                                    <div id="mp_Name_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">工作項目：</div>
                                    <div id="pc_Name_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">開始時間：</div>
                                    <div id="starttime_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">結束時間：</div>
                                    <div id="endtime_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">總時數：</div>
                                    <div id="totaltime_copy" class="second_line_time"></div>&nbsp時
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">人工天：</div>
                                    <div id="time_change_copy" class="second_line_time"></div>&nbsp天
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">簡述：</div>
                                    <div id="summary_copy" class="second_line"></div>
                                </div>
                                <div class="dialog_all">
                                    <div class="first_line">審查結果：</div>
                                    <div class="second_line">
                                        <select id="s_S" name="s_S" required>
                                            <option id="p_S" name="p_S" value="" selected></option>
                                            @foreach ($status as $data2)
                                                <option id="status" value="{{ $data2->id }}">
                                                    {{ $data2->statusname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="dialog_all">
                                    <div class="btn_line">
                                        <button id="btn" class="btn btn-primary btn-sm">送出</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end dialog -->
                    <!-- 專案狀態 -->
                    <div class="card">
                        {{-- <div class="card-header">
                        <strong>工作日誌審查</strong>
                        <small> Form</small>
                    </div> --}}
                        <div class="card-body card-block">
                            <div class="col-md-12">
                                <!-- 更改card中的table寬度 -->
                                <div style="overflow-x:auto;">
                                    <table id="table_id3" class="display">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th nowrap>項次</th>
                                                <th nowrap>日期</th>
                                                <th nowrap>人員</th>
                                                <th style="display: none;">客戶名稱</th>
                                                <th nowrap>專案編號 & 名稱</th>
                                                <th style="display: none;">工作類別</th>
                                                <th style="display: none;">工作項目</th>
                                                <th style="display: none;">開始時間</th>
                                                <th style="display: none;">結束時間</th>
                                                <th style="display: none;">總時數</th>
                                                <th style="display: none;">人工天</th>
                                                <th style="display: none;">簡述</th>
                                                <th style="display: none;">備註</th>
                                                <th nowrap>審查結果</th>
                                                <th style="display: none"></th>
                                                <th class="end" nowrap>檢視 & 編輯狀態</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lists as $data)
                                                <tr class="lists" style="text-align: center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td id="this_id" style="display: none;">{{ $data->id }}
                                                    </td>
                                                    <td id="time">{{ $data->time }}</td>
                                                    <td id="username">{{ $data->username }}</td>
                                                    <td id="cc_Name" style="display: none;">{{ $data->cc_Name }}</td>
                                                    <td id="ssS_ssP">{{ $data->ss_Serial }} /
                                                        {{ $data->ss_projectname }}
                                                    </td>
                                                    <td id="mp_Name" style="display: none;">{{ $data->mp_Name }}</td>
                                                    <td id="pc_Name" style="display: none;">{{ $data->pc_Name }}</td>
                                                    <td id="starttime" style="display: none;">{{ $data->starttime }}</td>
                                                    <td id="endtime" style="display: none;">{{ $data->endtime }}</td>
                                                    <td id="totaltime" style="display: none;">{{ $data->totaltime }}</td>
                                                    <td id="summary" style="display: none;">{{ $data->summary }}</td>
                                                    <td id="remarks" style="display: none;">{{ $data->remarks }}</td>
                                                    <td id="ss_statusname">{{ $data->ss_Statusname }}</td>
                                                    <td id="time_change" style="display: none;">{{ $data->time_change }}
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn-warning btn-sm status_btn"
                                                            id="view_btn" style="color:white">View</button>
                                                        {{-- <button type="button" class="btn btn-danger btn-sm"
                                onclick="location.href='{{ route('status.destroy',['id'=>$data->id]) }}'">Delete</button> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- 專案狀態 end section -->
    <!-- end Maincontan -->
@endsection

@section('datatable')

    <!-- Datatables套件 -->
    <script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/DataTables-1.10.22/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/Buttons-1.6.5/js/buttons.html5.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/DataTables/Buttons-1.6.5/js/buttons.print.min.js') }}">
    </script>

    <!-- 專案狀態 / 專案狀態 Edit-->
    <script>
        $(document).ready(function() {

            var dt = new Date($.now());

            var y = dt.getFullYear();
            var m = dt.getMonth() + 1;
            var d = dt.getDay();

            var time = y + '-' + m + '-' + d;

            // Edit
            $(".status_btn").on('click', function() {

                line_1 = $(this).parents('tr').find("td:eq(1)").text();
                line_3 = $(this).parents('tr').find("td:eq(3)").text();
                line_2 = $(this).parents('tr').find("td:eq(2)").text();
                line_4 = $(this).parents('tr').find("td:eq(4)").text();
                line_5 = $(this).parents('tr').find("td:eq(5)").text();
                line_6 = $(this).parents('tr').find("td:eq(6)").text();
                line_7 = $(this).parents('tr').find("td:eq(7)").text();
                line_8 = $(this).parents('tr').find("td:eq(8)").text();
                line_9 = $(this).parents('tr').find("td:eq(9)").text();
                line_10 = $(this).parents('tr').find("td:eq(10)").text();
                line_11 = $(this).parents('tr').find("td:eq(11)").text();
                line_13 = $(this).parents('tr').find("td:eq(13)").text();
                line_14 = $(this).parents('tr').find("td:eq(14)").text();

                $("#username_copy").html(line_3);
                $("#time_copy").html(line_2);
                $("#cc_Name_copy").html(line_4);
                $("#ssS_ssP_copy").html(line_5);
                $("#mp_Name_copy").html(line_6);
                $("#pc_Name_copy").html(line_7);
                $("#starttime_copy").html(line_8);
                $("#endtime_copy").html(line_9);
                $("#totaltime_copy").html(line_10);
                $("#summary_copy").html(line_11);
                $("#id_copy").val(line_1);
                $("#p_S").html(line_13);
                $("#time_change_copy").html(line_14);

                $("#dialog").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('.p-t-20')
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                    width: "400px",
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });

            // Datatable
            $('#table_id3').DataTable({
                "autoWidth": false,

                columnDefs: [{
                        orderable: false,
                        targets: 15
                    },
                    {
                        targets: 5,
                        className: 'dt-body-left'
                    }
                ],
                dom: 'Bfrtp',
                buttons: [{
                    extend: "excel",
                    text: "匯出",
                    title: "工作日誌審查_" + time,
                }, ]
            });
        });
    </script>
@endsection

@section('other_script')

    <script>
        $(function() {
            $("#s_S").on('click', function() {
                $("#p_S").hide();
            });
        });
    </script>

    <!-- dialog text set -->
    <script>
        $(document).ready(function() {
            $(".dialog_all").css({
                "display": "flex",
                "width": "350px",
            });

            $(".first_line").css({
                "width": "100px",
                "text-align": "right",
                "margin": "1px",
            });

            $(".second_line").css({
                "width": "200px",
                "color": "blue",
                "margin": "1px",
            });

            $(".second_line_time").css({
                "width": "auto",
                "color": "blue",
            });

            $("#s_S").css({
                "width": "200px",
            });

            $(".btn_line").css({
                "margin": "auto",
            })
        });
    </script>

@endsection
