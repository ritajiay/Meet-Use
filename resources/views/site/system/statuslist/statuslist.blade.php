@extends('.site.layouts.master')

<!-- Datatables套件 CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css') }}" />

@section('index_path')
    專案狀態管理　>　專案狀態名稱清單
@endsection

@section('index_show')
    專案狀態名稱清單
@endsection

@section('content')
    @include('.site.system.all.loding_circle')
    <!-- TODO:專案狀態名稱清單 section -->
    <section class="p-t-20">
        <div class="col-md-4">
            {{-- <h3 id="fore">專案狀態名稱_</h3> --}}
        </div>
        <!-- END STATISTIC -->

        <!-- MAIN CONTENT -->
        {{-- <div>&nbsp;</div> --}}
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5">
                        <!-- start store dialog -->
                        <div id="dialog" title="新增" style="display:none">
                            <form id="from" method="POST" action="{{ route('status.list.store') }}">
                                @csrf
                                <input name="statusname" placeholder="專案狀態名稱"
                                    style="border:1px #D9D9D9 solid;margin-top:10px" required>
                                <button id="btn" class="btn btn-primary btn-sm">送出</button>
                            </form>
                        </div>
                        <!-- end store dialog -->
                        <!-- start edit dialog -->
                        <div id="dialog2" title="修改" style="display:none">
                            <form id="fromedit" method="POST" action="{{ route('status.edit') }}">
                                @csrf
                                <input id="status_id_show" name="status_id_show" style="display: none">
                                <input id="status_name_show" name="status_name_show"
                                    style="border:1px #D9D9D9 solid;margin-top:10px;">
                                <button id="btn" class="btn btn-primary btn-sm">送出</button>
                            </form>
                        </div>
                        <!-- end edit dialog -->
                        <!-- 專案狀態名稱 -->
                        <!-- create button -->
                        <button id="clientname_btn" type="button" class="btn btn-primary btn-sm" style="margin-bottom:10px;">
                            <i class=" fa fa-plus" aria-hidden="true" style="font-weight: bolder"></i> 新增
                        </button>
                        <!-- end create button -->
                        <div class="card">
                            <div class="card-header">
                                <strong>狀態名稱</strong>
                                <small> Form</small>
                            </div>
                            <div class="card-body card-block">
                                <div class="col-md-13">
                                    <!-- 更改card中的table寬度 -->
                                    <div style="overflow-x:auto;">
                                        <table id="table_id3" class="display">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <th nowrap>項次</th>
                                                    <th style="display: none"></th>
                                                    <th nowrap>狀態名稱</th>
                                                    <th class="end" nowrap>編輯/刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($status as $data)
                                                    <tr style="text-align: center">
                                                        <td id="status_id" name="status_id" style="display: none">
                                                            {{ $data->id }}
                                                        </td>
                                                        <td id="loop_id">{{ $loop->iteration }}</td>
                                                        <td id="status_name" name="status_name">
                                                            {{ $data->statusname }}</td>
                                                        <td>
                                                            <button type="button" class="btn-warning btn-sm edit_btn"
                                                                style="color:white">Edit</button>
                                                            <button id="del" type="button" class="btn btn-danger btn-sm"
                                                                onclick="location.href='{{ route('status.destroy', ['id' => $data->id]) }}'">Delete</button>
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
        </div>
    </section>
    <!-- 專案狀態名稱清單 end section -->

    <!-- end Maincontan -->
@endsection

@section('datatable')

    <!-- Datatables套件 -->
    <script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>

    <!-- 專案狀態名稱清單 / 專案狀態名稱清單 Edit-->
    <script>
        $(document).ready(function() {
            // Edit
            $(".edit_btn").on('click', function() {

                line = $(this).parents('tr').find("td:eq(0)").text();
                line_2 = $(this).parents('tr').find("td:eq(2)").text().trim();
                $("#status_id_show").val(line);
                $("#status_name_show").val(line_2).focus();

                $("#dialog2").dialog({
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });

            // Datatable
            var table = $('#table_id3').DataTable({
                "autoWidth": false,

                bLengthChange: false, //下單選單顯示
                ordering: false, //禁用排序
                bInfo: false, //左下底層訊息
                // searching: false,

            });
        });
    </script>

    <!-- 專案狀態名稱清單 create -->
    <script>
        $(function() {
            $("#clientname_btn").click(function() {
                $("#dialog").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('.p-t-20')
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });
        });
    </script>
@endsection

@section('other_script')

@endsection
