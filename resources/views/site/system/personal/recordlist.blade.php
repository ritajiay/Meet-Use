@extends('.site.layouts.master')

<!-- Datatables套件 CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css') }}" />

@section('index_path')
    個人工作日誌　>　工作日誌總覽
@endsection

@section('index_show')
    工作日誌總覽
@endsection

@section('content')
    @include('.site.system.all.loding_circle')

    <section class="p-t-20" style="display: none;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">本日工作日誌</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">所有工作日誌</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <!-- STATISTIC-->
                                <!-- datatable -->
                                <section class="p-t-20" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>本日工作日誌</strong>
                                                <small> Form</small>
                                            </div>
                                            <div class="card-body card-block">
                                                <div style="overflow-x:auto;">
                                                    <!-- ↑　scroll-x -->
                                                    <table id="table_id" class="display">
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <th nowrap>項次</th>
                                                                <th nowrap>日期</th>
                                                                <th nowrap>建立時間</th>
                                                                <th nowrap>客戶名稱</th>
                                                                <th nowrap>專案編號 & 名稱</th>
                                                                <th nowrap>工作類別</th>
                                                                <th nowrap>工作項目</th>
                                                                <th nowrap>開始時間</th>
                                                                <th nowrap>結束時間</th>
                                                                <th class="end">功能</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($list_now as $data)
                                                                <tr style="text-align: center">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $data->time }}</td>
                                                                    <td>{{ $data->created_at->format('Y-m-d H:i:s') }}
                                                                    </td>
                                                                    <td>{{ $data->cc_name }}</td>
                                                                    <td>{{ $data->ss_serial }} / {{ $data->ss_name }}
                                                                    </td>
                                                                    <td>{{ $data->projectname }}</td>
                                                                    <td>{{ $data->categoryname }}</td>
                                                                    <td>{{ date('H:i', strtotime($data->starttime)) }}
                                                                    </td>
                                                                    <td>{{ date('H:i', strtotime($data->endtime)) }}</td>
                                                                    <td nowrap>
                                                                        <button type="button" class="btn-warning btn-sm"
                                                                            onclick="location.href='{{ route('record.edit', ['id' => $data->id]) }}'"
                                                                            style="color:white">Edit</button>
                                                                        <button id="del" type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            onclick="location.href='{{ route('record.destroy', ['id' => $data->id]) }}'"
                                                                            style="color:white">Delete</button>
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
                                <!-- END STATISTIC-->
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- STATISTIC-->
                                <!-- datatable -->
                                <section class="p-t-20" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>所有工作日誌</strong>
                                                <small> Form</small>
                                            </div>
                                            <div class="card-body card-block">
                                                <div style="overflow-x:auto;">
                                                    <!-- ↑　scroll-x -->
                                                    <table id="table_id2" class="display table_id2">
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <th nowrap>項次</th>
                                                                <th style="display: none;">ID</th>
                                                                <th nowrap>日期</th>
                                                                <th nowrap>建立時間</th>
                                                                <th nowrap>客戶名稱</th>
                                                                <th nowrap>專案編號 & 名稱</th>
                                                                <th nowrap>工作類別</th>
                                                                <th nowrap>工作項目</th>
                                                                <th nowrap>開始時間</th>
                                                                <th nowrap>結束時間</th>
                                                                <th style="display: none;">總時數</th>
                                                                <th style="display: none;">工時換算</th>
                                                                <th style="display: none;">摘要</th>
                                                                <th style="display: none;">備註</th>
                                                                <th nowrap>功能</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($list_all as $data2)
                                                                <tr style="text-align: center">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td style="display: none;">{{ $data2->id }}</td>
                                                                    <td>{{ $data2->time }}</td>
                                                                    <td>{{ $data2->created_at->format('Y-m-d H:i:s') }}
                                                                    </td>
                                                                    <td>{{ $data2->cc_name }}</td>
                                                                    <td>{{ $data2->ss_serial }} /
                                                                        {{ $data2->ss_name }}
                                                                    </td>
                                                                    <td>{{ $data2->projectname }}</td>
                                                                    <td>{{ $data2->categoryname }}</td>
                                                                    <td>{{ date('H:i', strtotime($data2->starttime)) }}
                                                                    </td>
                                                                    <td>{{ date('H:i', strtotime($data2->endtime)) }}
                                                                    </td>
                                                                    <td style="display: none;">{{ $data2->totaltime }}
                                                                    </td>
                                                                    <td style="display: none;">{{ $data2->time_change }}
                                                                    </td>
                                                                    <td style="display: none;">{{ $data2->summary }}</td>
                                                                    <td style="display: none;">{{ $data2->remarks }}</td>
                                                                    <td><button type="button"
                                                                            class="btn-warning btn-sm all-view"
                                                                            style="color:white">View</button>
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
                                <!-- END STATISTIC -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('.site.system.personal.record_dialog.view')
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

    <!-- 取list -->
    <script>
        $(document).ready(function() {
            $(".all-view").on("click", function() {
                line_2 = $(this).parents("tr").find("td:eq(0)").text(); //項次
                line_3 = $(this).parents("tr").find("td:eq(2)").text(); //日期
                line_4 = $(this).parents("tr").find("td:eq(3)").text(); //建立時間
                line_5 = $(this).parents("tr").find("td:eq(4)").text(); //客戶名稱
                line_6 = $(this).parents("tr").find("td:eq(5)").text(); //專案編號&專案名稱
                line_7 = $(this).parents("tr").find("td:eq(6)").text(); //工作項目
                line_8 = $(this).parents("tr").find("td:eq(7)").text(); //工作類別
                line_9 = $(this).parents("tr").find("td:eq(8)").text(); //開始時間
                line_10 = $(this).parents("tr").find("td:eq(9)").text(); //結束時間
                line_11 = $(this).parents("tr").find("td:eq(10)").text(); //總時數
                line_12 = $(this).parents("tr").find("td:eq(11)").text(); //工時換算
                line_13 = $(this).parents("tr").find("td:eq(12)").text(); //摘要
                line_14 = $(this).parents("tr").find("td:eq(13)").text(); //備註

                $("#num").text(line_2);
                $("#date").text(line_3);
                $("#create_time").text(line_4);
                $("#client_name").text(line_5);
                $("#project_name").text(line_6);
                $("#work_type").text(line_7);
                $("#work_project").text(line_8);
                $("#start_time").text(line_9);
                $("#end_time").text(line_10);
                $("#total_time").text(line_11);
                $("#time_change").text(line_12);
                $("#summary").text(line_13);
                $("#remarks").text(line_14);

                $("#dialog").dialog({
                    title: "所有工作日誌",
                    modal: true,
                    width: "400px",
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $(".p-t-20"),
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass(
                    'ui-icon ui-icon-closethick'); //圖片失效,固修改原始css

            });
        });
    </script>

    <!-- 本日工作日誌&所有工作日誌 table -->
    <script>
        $(document).ready(function() {

            var dt = new Date($.now());

            var y = dt.getFullYear();
            var m = dt.getMonth() + 1;
            var d = dt.getDay();

            var time = y + '-' + m + '-' + d;

            var file = $('#one').text();
            var file_all = $("#two").text();
            var user = $("#UN").text();

            // 本日
            var table = $('#table_id').DataTable({
                "autoWidth": false,

                columnDefs: [{
                        targets: [3, 4, 5, 6],
                        className: 'dt-body-left'
                    },
                    {
                        orderable: false,
                        targets: 9,
                    }
                ],

                dom: 'Bfrtp',
                buttons: [{
                    extend: "excel",
                    text: "匯出",
                    filename: user + file + time + ''
                }, ]
            })

            //  所有
            var table = $('#table_id2').DataTable({
                "autoWidth": false,

                columnDefs: [{
                        targets: [3, 4, 5, 6],
                        className: 'dt-body-left'
                    },
                    {
                        orderable: false,
                        targets: 9
                    }
                ],

                dom: 'Bfrtp',
                buttons: [{
                    extend: "excel",
                    text: "匯出",
                    filename: user + file_all + time + ''
                }, ]
            })
        });
    </script>

    <!-- 修改 dialog 內容 -->
    <script>
        $(document).ready(function() {
            $(".dis_flex").css({
                "display": "flex",
            });

            $(".first_line").css({
                "width": "100px",
                "text-align": "right",
                "margin": "1px",
            });

            $(".second_line").css({
                "color": "blue",
                "width": "200px",
                "margin": "1px",
            });

            $(".second_line_time").css({
                "color": "blue",
                "width": "auto",
                "margin": "1px",
            });
        });
    </script>

    <script>
        function test() {
            Window.open("")
        };
    </script>

@endsection
