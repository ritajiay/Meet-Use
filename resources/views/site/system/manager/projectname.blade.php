@extends('.site.layouts.master')

<!-- Datatables套件 CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />

@section('index_path')
    專案管理　>　專案管理清單_管理者
@endsection

@section('index_show')
    專案管理清單_管理者
@endsection

@section('content')
    @include('.site.system.all.loding_circle')

    <section class="p-t-20" style="display: none;">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">客戶名稱</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">專案編號 & 名稱</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">工作類別</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="contact"
                            aria-selected="false">工作項目</a>
                    </li>
                </ul>
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- TODO:客戶名稱 section -->
                        <section class="p-t-20" style="display: none;">
                            <!-- END STATISTIC -->
                            <!-- MAIN CONTENT -->
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- 客戶名稱 client dialog -->
                                            @include('site.system.manager.projectname_dialog.client')
                                            <!-- 客戶名稱 -->
                                            <!-- create button -->
                                            <button id="clientname_btn" type="button" class="btn btn-primary btn-sm"
                                                style="margin-bottom:10px;">
                                                <i class=" fa fa-plus" aria-hidden="true"
                                                    style="font-weight: bolder"></i> 新增
                                            </button>
                                            <!-- end create button -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>客戶名稱</strong>
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
                                                                        <th nowrap>客戶名稱</th>
                                                                        <th class="end" nowrap>編輯/刪除</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($lists5 as $data5)
                                                                        <tr style="text-align: center">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td style="display: none">{{ $data5->id }}
                                                                            </td>
                                                                            <td>{{ $data5->client }}</td>
                                                                            <td nowrap>
                                                                                <button type="button"
                                                                                    class="btn-warning btn-sm client_edit_btn"
                                                                                    style="color:white">Edit</button>
                                                                                {{-- onclick="location.href='{{ route('manager.index5_edit1',['id'=>$data->id]) }}'"
                                        style="color:white" --}}
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    onclick="location.href='{{ route('projectname.destroy4', ['id' => $data5->id]) }}'">Delete</button>
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
                        <!-- 客戶名稱 end section -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- TODO:專案編號 section -->
                        <section class="p-t-20" id="pro" style="display: none;">
                            <!-- END STATISTIC -->
                            <!-- MAIN CONTENT -->
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- 專案編號 serial dialog -->
                                            @include('site.system.manager.projectname_dialog.serial')
                                            <!-- create button -->
                                            {{-- 編號 --}}
                                            <button id="projectnumber_btn" type="submit" class="btn btn-primary btn-sm"
                                                style="margin-bottom:10px;">
                                                <i class="fa fa-plus" aria-hidden="true"
                                                    style="font-weight: bolder"></i> 新增
                                            </button>
                                            <!-- end create button -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>專案編號 & 名稱</strong>
                                                    <small> Form</small>
                                                </div>
                                                <div class="card-body card-block">
                                                    <div class="col-md-13">
                                                        <!-- 更改card中的table寬度 -->
                                                        <div style="overflow-x:auto;">
                                                            <table id="table_id2" class="display">
                                                                <thead>
                                                                    <tr style="text-align: center">
                                                                        <th nowrap>項次</th>
                                                                        <th style="display: none"></th>
                                                                        <th nowrap>專案編號</th>
                                                                        <th nowrap>專案名稱</th>
                                                                        <th nowrap>客戶名稱</th>
                                                                        <th nowrap>專案起始</th>
                                                                        <th nowrap>專案結束</th>
                                                                        <th nowrap>預估工時(時)</th>
                                                                        <th style="display: none">客戶名稱_id</th>
                                                                        <th class="end" nowrap>編輯/刪除</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($lists4 as $data4)
                                                                        <tr style="text-align: center">
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td style="display: none">{{ $data4->id }}
                                                                            </td>
                                                                            <td>{{ $data4->serial }}</td>
                                                                            <td>{{ $data4->projectname }}</td>
                                                                            <td>{{ $data4->c_client }}</td>
                                                                            <td style="display: none;">{{ $data4->c_id }}
                                                                            </td>
                                                                            <td>{{ $data4->pro_st_time }}</td>
                                                                            <td>{{ $data4->pro_end_time }}</td>
                                                                            <td>{{ $data4->ex_work_time }}</td>
                                                                            <!-- FIXME: -->
                                                                            <!-- <td> number_format(($data4->total_work_time / $data4->ex_work_time) * 100, 0) %</td> 少加大括號-->
                                                                            <td nowrap>
                                                                                <button type="button"
                                                                                    class="btn-warning btn-sm serial_edit_btn"
                                                                                    style="color:white">Edit</button>
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    onclick="location.href='{{ route('projectname.destroy3', ['id' => $data4->id]) }}'">Delete</button>
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

                        <!-- 專案編號 end section -->
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- TODO:工作類別 -->
                        <section class="p-t-20" id="cat" style="display: none;">
                            <!-- END STATISTIC -->
                            <!-- MAIN CONTENT -->
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- 工作類別 category dialog -->
                                            @include('site.system.manager.projectname_dialog.category')
                                            {{-- create button --}}
                                            {{-- 執行項目 --}}
                                            <button id="category_btn" type="submit" class="btn btn-primary btn-sm"
                                                style="margin-bottom:10px;">
                                                <i class="fa fa-plus" aria-hidden="true"
                                                    style="font-weight: bolder"></i> 新增
                                            </button>
                                            {{-- end create button --}}
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>工作類別</strong>
                                                    <small> Form</small>
                                                </div>
                                                <div class="card-body card-block">
                                                    <div class="col-md-13">
                                                        <!-- 更改card中的table寬度 -->
                                                        <table id="table_id" class="display">
                                                            <thead>
                                                                <tr style="text-align: center">
                                                                    <th nowrap>項次</th>
                                                                    <th style="display: none">id</th>
                                                                    <th nowrap>工作類別</th>
                                                                    <th class="end" nowrap>編輯/刪除</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($lists as $data)
                                                                    <tr style="text-align: center">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td style="display: none">{{ $data->id }}</td>
                                                                        <td>{{ $data->projectname }}</td>
                                                                        <td nowrap>
                                                                            <button type="button"
                                                                                class="btn-warning btn-sm category_edit_btn"
                                                                                style="color:white">Edit</button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="location.href='{{ route('projectname.destroy', ['id' => $data->id]) }}'">Delete</button>
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
                        <!-- 工作類別 end section -->
                        <!-- END STATISTIC -->
                    </div>
                    <div class="tab-pane fade" id="4" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- 工作項目 section -->
                        <section class="p-t-20" id="work" style="display: none;">
                            <!-- END STATISTIC -->
                            <!-- MAIN CONTENT -->
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        {{-- frist 類別 --}}
                                        <div class="col-lg-12">
                                            <!-- 工作項目 object dialog -->
                                            @include('site.system.manager.projectname_dialog.object')
                                            {{-- create button --}}
                                            {{-- 類別名稱 --}}
                                            <button id="object_btn" type="submit" class="btn btn-primary btn-sm"
                                                style="margin-bottom:10px;">
                                                <i class="fa fa-plus" aria-hidden="true"
                                                    style="font-weight: bolder"></i> 新增
                                            </button>
                                            {{-- end create button --}}
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>工作項目</strong>
                                                    <small> Form</small>
                                                </div>
                                                <div class="card-body card-block">
                                                    <div class="col-md-13">
                                                        <!-- 更改card中的table寬度 -->
                                                        <table id="table_id1" class="display">
                                                            <thead>
                                                                <tr style="text-align: center">
                                                                    <th nowrap>項次</th>
                                                                    <th style="display: none">id</th>
                                                                    <th nowrap>工作項目</th>
                                                                    <th nowrap>工作類別</th>
                                                                    <th style="display: none">工作類別id</th>
                                                                    <th class="end" nowrap>編輯/刪除</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- lists專案 lists2類別名稱 lists3自訂查詢(無ID) --}}
                                                                @foreach ($lists3 as $data3)
                                                                    <tr style="text-align: center">
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td style="display: none">{{ $data3->id }}</td>
                                                                        <td>{{ $data3->categoryname }}</td>
                                                                        <td>{{ $data3->projectname }}</td>
                                                                        <td style="display: none">{{ $data3->m_id }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn-warning btn-sm object_edit_btn"
                                                                                style="color:white">Edit</button>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="location.href='{{ route('projectname.destroy2', ['id' => $data3->id]) }}'">Delete</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- frist end --}}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 工作項目 end section -->
    <!-- end Maincontan -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

@endsection

@section('datatable')

    <!-- Datatables套件 -->
    <script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>

    <!-- TODO:工作類別 / 工作類別 Edit-->
    <script>
        $(document).ready(function() {

            $(".category_edit_btn").click(function() {

                line = $(this).parents('tr').find("td:eq(1)").text();
                line_2 = $(this).parents('tr').find("td:eq(2)").text();
                $("#category_id").val(line);
                $("#category_edit").val(line_2);

                $("#dialog_edit_category").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('#cat')
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });

            $('#table_id').DataTable({
                "autoWidth": false,

                columnDefs: [{
                    targets: 2,
                    className: 'dt-body-left'
                }],

                bLengthChange: false, //下單選單顯示
                ordering: false, //禁用排序
                bInfo: false, //左下底層訊息
            });
        });
    </script>

    <!-- 工作項目 / 工作項目 Edit-->
    <script>
        $(document).ready(function() {

            $(".object_edit_btn").click(function() {

                line = $(this).parents('tr').find("td:eq(1)").text();
                line_2 = $(this).parents('tr').find("td:eq(2)").text();
                line_3 = $(this).parents('tr').find("td:eq(3)").text();
                line_4 = $(this).parents('tr').find("td:eq(4)").text();
                $("#object_edit_id").val(line);
                $("#objectname_edit").val(line_2);
                $("#objectname_opt").html(line_3).val(line_4);

                $("#dialog_edit_object").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('#work')
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css

                $(".m_id").click(function() {
                    $("#objectname_opt").hide();
                });

            });

            $('#table_id1').DataTable({
                "autoWidth": false,
                columnDefs: [{
                    targets: [2, 3],
                    className: 'dt-body-left',
                }],

                bLengthChange: false, //下拉選單顯示
                bInfo: false, //左下底層訊息
                select: true,
                ordering: false,
            });
        });
    </script>

    <!-- 專案編號 / 專案編號 Edit-->
    <script>
        $(document).ready(function() {
            $(".serial_edit_btn").click(function() {

                line = $(this).parents('tr').find("td:eq(2)").text();
                line_2 = $(this).parents('tr').find("td:eq(3)").text();
                line_3 = $(this).parents('tr').find("td:eq(1)").text();
                line_4 = $(this).parents('tr').find("td:eq(4)").text();
                line_5 = $(this).parents('tr').find("td:eq(5)").text();
                line_6 = $(this).parents('tr').find("td:eq(6)").text();
                line_7 = $(this).parents('tr').find("td:eq(7)").text();
                line_8 = $(this).parents('tr').find("td:eq(8)").text();

                $("#serial_edit_input").val(line);
                $("#projectname_edit_input").val(line_2);
                $("#serial_id").val(line_3);
                $("#serial_client_before").html(line_4).val(line_5);
                $("#pro_st_time_edit").val(line_6);
                $("#pro_end_time_edit").val(line_7);
                $("#ex_work_time_edit").val(line_8);

                $("#dialog_edit_project_serial").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $("#pro")
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css

                $(".c_id").click(function() {
                    $("#serial_client_before").hide();
                });

            });

            $('#table_id2').DataTable({
                "autoWidth": false,

                columnDefs: [{
                    targets: [2, 3, 4, 5, 6, 7, 8, 9],
                    className: 'dt-body-left',
                }],

                bLengthChange: false, //下拉選單顯示
                ordering: false, //禁用排序
                bInfo: false, //左下底層訊息
            });
        });
    </script>

    <!-- 客戶名稱 / 客戶名稱 Edit -->
    <script>
        $(document).ready(function() {
            // Edit
            $(".client_edit_btn").click(function() {

                line = $(this).parents('tr').find("td:eq(1)").text();
                line_2 = $(this).parents('tr').find("td:eq(2)").text();
                $("#client_edit_id").val(line);
                $("#client_edit_input").val(line_2);

                $("#dialog_client_edit").dialog({
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

            //Datatable
            $('#table_id3').DataTable({
                "autoWidth": false, //寬度自動調整

                columnDefs: [{
                    targets: 2,
                    className: 'dt-body-left',
                }],

                bLengthChange: false, //下拉選單顯示
                ordering: false, //禁用排序
                bInfo: false, //左下底層訊息
            });
        });
    </script>

    <!-- 客戶名稱 create -->
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

    <!-- 專案編號&專案名稱 create -->
    <script>
        $(function() {
            $("#projectnumber_btn").click(function() {
                $("#dialog2").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $("#pro")
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });
        });
    </script>

    <!-- 工作類別 create -->
    <script>
        $(function() {
            $("#category_btn").click(function() {
                $("#dialog_store_category").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('#cat')
                    },
                    modal: true, //焦點效果
                    show: true, //淡入淡出效果
                    draggable: false, //對話框移動
                });
                $('.ui-dialog-titlebar-close').addClass('ui-icon ui-icon-closethick'); //圖片失效,固修改原始css
            });
        });
    </script>

    <!-- 工作項目 create -->
    <script>
        $(function() {
            $("#object_btn").click(function() {
                $("#dialog4").dialog({
                    position: {
                        my: 'center',
                        at: 'center',
                        of: $('#work')
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
