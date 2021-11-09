@extends('.site.layouts.master')

<!-- Datatables套件 CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css') }}" />

@section('index_path')
    專案管理　>　團隊人員日誌總覽
@endsection

@section('index_show')
    團隊人員日誌總覽
@endsection

@section('content')
    @include('.site.system.all.loding_circle')
    <!-- STATISTIC-->
    <!-- datatable -->
    <section class="p-t-20" style="display: none;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        {{-- <div class="card-header">
                        <strong>客戶名稱</strong>
                        <small> Form</small>
                    </div> --}}
                        <div class="card-body card-block">
                            <div class="col-md-12">
                                <div style="overflow-x:auto;">
                                    <!-- ↑ scroll x -->
                                    <table id="table_id" class="display">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th nowrap>項次</th>
                                                <th nowrap>日期</th>
                                                <th nowrap>建立時間</th>
                                                <th nowrap>人員</th>
                                                <th nowrap>客戶名稱</th>
                                                <th nowrap>專案編號 & 名稱</th>
                                                <th nowrap>工作類別</th>
                                                <th nowrap>工作項目</th>
                                                <th nowrap>開始時間</th>
                                                <th nowrap>結束時間</th>
                                                <th class="end" nowrap>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listall_manager as $data)
                                                <tr style="text-align: center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->time }}</td>
                                                    <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
                                                    <td>{{ $data->username }}</td>
                                                    <td>{{ $data->cc_name }}</td>
                                                    <td>{{ $data->ss_serial }} / {{ $data->ss_name }}</td>
                                                    <td>{{ $data->projectname }}</td>
                                                    <td>{{ $data->categoryname }}</td>
                                                    <td>{{ date('H:i', strtotime($data->starttime)) }}</td>
                                                    <td>{{ date('H:i', strtotime($data->endtime)) }}</td>
                                                    <td>
                                                        <button class="btn-warning btn-sm"
                                                            onclick="location.href='{{ route('teamrecord.edit', ['id' => $data->id]) }}'"
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

    <!-- 專案清單總覽_管理者 -->
    <script>
        $(document).ready(function() {

            var dt = new Date($.now());

            var y = dt.getFullYear();
            var m = dt.getMonth() + 1;
            var d = dt.getDay();

            var time = y + '-' + m + '-' + d;

            $('#table_id').DataTable({
                "autoWidth": false,

                columnDefs: [{
                    targets: [4, 5, 6, 7],
                    className: 'dt-body-left'
                }],

                dom: 'Bfrtp',
                buttons: [{
                    extend: "excel",
                    text: "匯出",
                    title: "團隊人員日誌總覽_" + time,
                }, ]
            });
        });
    </script>

@endsection
