<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISSD工作管理平台-User List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--網頁icon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/login/login/images/icons/favicon.ico') }}" />
    <!--bootstrap樣式-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--網頁圖標-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login/vendor/select2/select2.min.css') }}">
    <!--網頁下方樣式-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login/css/main_list.css') }}">
    <!--Datatables套件-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}" />
    <!-- Checkbox css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/login/css/checkbox.css') }}" />
</head>

<body>
    <div class="limiter">
        {{-- 藍色背景 --}}
        <div class="container-login100">
            @include('.site.system.all.loding_circle')
            <form class="login100-form validate-form" style="display: none;">
                <span class="login100-form-title">
                    <div>ISSD工作管理平台-User List</div>
                </span>
                <div style="overflow-x:auto;">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <!-- Dont show password -->
                                <th nowrap>項次</th>
                                <th style="display: none;">ID</th>
                                <th nowrap>帳號</th>
                                <th nowrap>姓名</th>
                                <th nowrap>電話</th>
                                <th nowrap>Email</th>
                                <th nowrap>權限</th>
                                <th nowrap>狀態</th>
                                <th class="end" nowrap>功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists_user as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="display: none;" class="tab_id">{{ $data->id }}</td>
                                    <td>{{ $data->userid }}</td>
                                    <td id="username">{{ $data->username }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>
                                        <label class="switch">
                                            <input id="sw_ch" name="sw_ch" class="sw_ch" type="checkbox"
                                                value="{{ $data->status }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td nowrap>
                                        <button type="button" class="btn-warning btn-sm"
                                            onclick="location.href='{{ route('user.edit', ['id' => $data->id]) }}'">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm del"
                                            onclick="location.href='{{ route('user.destroy', ['id' => $data->id]) }}'">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center p-t-0">
                    <span class="txt1">
                        <a style="color:white;font-size:16px;" href="{{ route('manager.homepage') }}">返回前頁</a>
                    </span>
                </div>
        </div>
        </form>
    </div>
    </div>

    <script src="{{ asset('assets/login/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/login/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/login/vendor/select2/select2.min.js') }}"></script>
    <!--圖片波動========================================================================================-->
    <script src="{{ asset('assets/login/login/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <!--Datatables套件==================================================================================-->
    <script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#circle").css("display", "none");
            $(".login100-form").css("display", "");
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                "scrollY": "400px",
                "scrollCollapse": true,
                bLengthChange: false,
                "pageLength": 8,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".sw_ch").each(function() {
                if ($(this).val() == 1) {
                    $(this).prop("checked", true);
                } else {
                    $(this).prop("checked");
                }
            });

            $(".sw_ch").on("click", function() {
                if ($(this).val() == 1) {
                    $(this).val(0);
                } else {
                    $(this).val(1);
                }
            });
        });
    </script>

</body>

</html>
