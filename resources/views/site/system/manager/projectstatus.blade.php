@extends('.site.layouts.master')

<!-- Datatables套件 CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css') }}" />

@section('index_path', '專案狀態管理　>　專案狀態')

@section('index_show', '專案狀態')

@section('content')
    @include('.site.system.all.loding_circle')
    <!-- datatable -->
    <section class="p-t-20" style="display: none;">
        <div class="  section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="width: 100%;">
                        {{-- <div class="card-header">
                <strong>客戶名稱</strong>
                <small> Form</small>
            </div> --}}
                        <div class="card-body card-block">
                            <div class="col-md-12">
                                <div style="overflow-x:auto;">
                                    <table id="table_id" class="display">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th nowrap>項次</th>
                                                <th nowrap>專案編號</th>
                                                <th nowrap>專案名稱</th>
                                                <th nowrap>客戶名稱</th>
                                                <th nowrap>專案起始</th>
                                                <th nowrap>專案結束</th>
                                                <th nowrap>預估工時</th>
                                                <th nowrap>總工時</th>
                                                <th nowrap>總人工天</th>
                                                <th nowrap>完成度</th>
                                                <th class="end" nowrap>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $data)
                                                <tr style="text-align: center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->serial }}</td>
                                                    <td>{{ $data->projectname }}</td>
                                                    <td>{{ $data->c_Name }}</td>
                                                    <td>{{ $data->pro_st_time }}</td>
                                                    <td>{{ $data->pro_end_time }}</td>
                                                    <td>{{ $data->ex_work_time }}</td>
                                                    <td>{{ $data->total_work_time }}</td>
                                                    <td>{{ $data->work_day }}</td>
                                                    <!-- 完成度 -->
                                                    <td>
                                                        @if ($data->ex_work_time != 0 && $data->total_work_time != 0)
                                                            @if ($data->total_work_time < $data->ex_work_time)
                                                                {{ number_format($data->total_work_time / $data->ex_work_time, 4) * 100 }}%
                                                            @else
                                                                <i class="fa fa-check" aria-hidden="true"
                                                                    style="color: rgb(0, 255, 0);">
                                                                    <i>
                                                            @endif
                                                        @else
                                                            <i class="fa fa-times" aria-hidden="true"
                                                                style="color: red"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn-warning btn-sm"
                                                            style="color: white">View</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC -->
    @include('.site.system.manager.projectstatus_dialog.view')
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
    <script type="text/javascript"
        src="{{ asset('assets/DataTables/Buttons-1.6.5/js/Buttons-1.6.5/js/buttons.print.min.js') }}">
    </script>

    <script>
        $(document).ready(function() {
            $(".btn-warning").on("click", function() {
                line = $(this).parents("tr").find("td:eq(0)").text(); //項次
                line_2 = $(this).parents("tr").find("td:eq(1)").text(); //專案編號
                line_3 = $(this).parents("tr").find("td:eq(2)").text(); //專案名稱
                line_4 = $(this).parents("tr").find("td:eq(3)").text(); //客戶名稱
                line_5 = $(this).parents("tr").find("td:eq(4)").text(); //專案起始
                line_6 = $(this).parents("tr").find("td:eq(5)").text(); //專案結束
                line_7 = $(this).parents("tr").find("td:eq(6)").text(); //預估工時
                line_8 = $(this).parents("tr").find("td:eq(7)").text(); //總工時
                line_9 = $(this).parents("tr").find("td:eq(8)").text(); //人工天
                line_10 = $(this).parents("tr").find("td:eq(9)").html(); // 完成度

                $("#num").text(line);
                $("#project_serial").text(line_2);
                $("#project_name").text(line_3);
                $("#client_name").text(line_4);
                $("#project_start").text(line_5);
                $("#project_end").text(line_6);
                $("#work_time").text(line_7);
                $("#total_time").text(line_8);
                $("#work_day").text(line_9);
                $("#complete").html(line_10);

                $("#dialog").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('.p-t-20')
                    },
                    modal: true,
                    show: true,
                    title: "專案狀態",
                    width: "400px",
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });
        });
    </script>

    <!-- 專案清單總覽_管理者 -->
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                "autoWidth": false,

                columnDefs: [{
                    targets: [1, 2, 3, 4, 5, 6, 7],
                    className: 'dt-body-left'
                }],

                dom: 'Bfrtp',
                buttons: [{
                    extend: "excel",
                    text: "匯出"
                }, ]
            });
        });
    </script>

    <!-- dialog內容css設定 -->
    <script>
        $(document).ready(function() {
            $(".text_flex").css({
                "display": "flex",
            });

            $(".first_line").css({
                "width": "80px",
                "text-align": "right",
            });

            $(".second_line").css({
                "width": "260px",
                "color": "blue",
            })

            $(".second_line_time").css({
                "color": "blue",
                "width": "auto",
            });
        });
    </script>

@endsection
