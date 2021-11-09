@extends('.site.layouts.master')

@section('index_path')
    個人工作日誌　>　工作日誌總覽　>　執行記錄修改
@endsection

@section('index_show')
    執行記錄修改
@endsection

@section('content')

    <!-- STATISTIC-->
    <!-- datatable -->
    <section class="p-t-20">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>表單填寫</strong>
                </div>
                <div class="card-body card-block">
                    @foreach ($edit_index as $data)
                        <form action="{{ route('record.update', ['id' => $data->id]) }}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">同仁姓名</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{-- 原本為p改為input↓ --}}
                                    <input class="form-control-static" value="{{ $data->username }}" name="username"
                                        id="username" readonly unselectable="on" style="color:gray">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">客戶名稱</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="client_new" id="client_new" class="form-control" required>
                                        @foreach ($edit_index2 as $data5)
                                            <option id="client_text" value="{{ $data5->client }}" selected>
                                                {{ $data5->cName }}
                                            </option>
                                        @endforeach
                                        @foreach ($lists4 as $data4)
                                            <option value="{{ $data4->id }}">{{ $data4->client }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">專案編號 & 名稱</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="serial_new" id="client_new" class="form-control">
                                        @foreach ($lists3 as $data6)
                                            <option id="serial_text" value="{{ $data6->s_ID }}" selected>
                                                {{ $data6->ssName }} / {{ $data6->sName }}
                                            </option>
                                        @endforeach
                                        @foreach ($test2 as $data_pro2)
                                            <option value="{{ $data_pro2->id }}">{{ $data_pro2->serial }}
                                                /
                                                {{ $data_pro2->projectname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">工作類別</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="projectlistpersonal_new" id="projectlistpersonal_new"
                                        class="form-control">
                                        @foreach ($edit_index as $data4)
                                            <option id="projectlistpersonal_text" value="{{ $data4->pID }}" selected>
                                                {{ $data4->mName }}
                                            </option>
                                        @endforeach
                                        @foreach ($lists as $data)
                                            <option value="{{ $data->id }}">{{ $data->projectname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">工作項目</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="penetration_new" id="projectlistpersonal_new" class="form-control">
                                        @foreach ($lists5 as $data7)
                                            <option id="penetration_text" value="{{ $data7->pID }}">
                                                {{ $data7->pName }}
                                            </option>
                                        @endforeach
                                        @foreach ($test as $data_pro)
                                            <option value="{{ $data_pro->id }}">
                                                {{ $data_pro->categoryname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">日期</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @foreach ($list1 as $data1)
                                        <input class="form-control-static" type="date" style="color: grey"
                                            value="{{ $data1->time }}" id="time_new" name="time_new">
                                        <-請選擇日期 </div>
                                    @endforeach
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">開始時間</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <select name="starttime_new" id="starttime_new" class="form-control"
                                            style="width: 11%" required>
                                            @foreach ($edit_index as $data3)
                                                <option id="starttime_text" value="{{ $data3->starttime }}">
                                                    {{ date('H:i', strtotime($data3->starttime)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">結束時間</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <select name="endtime_new" id="endtime_new" class="form-control"
                                            style="width: 11%" required>
                                            @foreach ($edit_index as $data3)
                                                <option id="endtime_text" value="{{ $data3->endtime }}">
                                                    {{ date('H:i', strtotime($data3->endtime)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">總時數</label>
                                    </div>
                                    <div class="col col-md-9">
                                        {{-- <select name="totaltime_new" id="totaltime_new" class="form-control" style="width: 11%"
                                    required>
                                    @foreach ($edit_index as $data3)
                                    <option id="totaltime_text" value="{{ $data3->totaltime }}">{{ $data3->totaltime }}
                                </option>
                                @endforeach
                                @foreach ($list2 as $data2)
                                <option value="{{ $data2->totaltime }}">{{ $data2->totaltime }}</option>
                                @endforeach
                                </select> --}}
                                        <div class="col col-md-9">
                                            @foreach ($edit_index as $data3)
                                                <input class="form-control-static" value="{{ $data3->totaltime }}"
                                                    name="totaltime_new" id="totaltime_new" readonly unselectable="on"
                                                    style="color:gray;width:10.5%;" required>時
                                            @endforeach
                                            <a id="remaind"
                                                style="color:red;display:none;padding-left:5%;">時間格式錯誤，請重新選擇!</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">工時換算</label>
                                    </div>
                                    <div class="col col-md-9">
                                        {{-- <select name="time_change_new" id="time_change_new" class="form-control"
                                    style="width: 11%" required>
                                    <option id="totaltime_text" value="">
                                    </option>
                                    <option value=""></option>
                                </select> --}}
                                        <div class="col col-md-9">
                                            @foreach ($time_change_new as $data_time_change_new)
                                                <input class="form-control-static"
                                                    value="{{ $data_time_change_new->time_change }}"
                                                    name="time_change_new" id="time_change_new" readonly unselectable="on"
                                                    style="color:gray;width:10.5%;" required>天
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">摘要</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        @foreach ($edit_index as $data3)
                                            <textarea name="summary_new" id="summary_new" rows="3" placeholder="請填寫內容"
                                                class="form-control" required>{{ $data3->summary }}</textarea>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">備註</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        @foreach ($edit_index as $data3)
                                            <textarea name="remarks_new" id="remarks_new" rows="3" placeholder="無"
                                                class="form-control">{{ $data3->remarks }}</textarea>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{-- <button type="submit" class="btn btn-primary btn-sm">
                            <i class="zmdi zmdi-plus"></i> 新增表單
                        </button> --}}
                                    <button type="button" onclick="history.back()" class="btn btn-primary btn-sm"
                                        style="background-color: gray ; border-color:grey">
                                        <i class="fa fa-backward" aria-hidden="true"></i> 返回上一頁
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" href="#"
                                        onclick="javascript:window.location.reload()">
                                        <i class="fa fa-history" aria-hidden="true"></i> 恢復原始值
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="zmdi zmdi-check" aria-hidden="true"></i> 確認送出
                                    </button>
                                </div>
                            </div>
                    @endforeach
                </div>
    </section>
    <!-- END STATISTIC-->

    <!-- footer -->
    <section class="p-t-0 p-b-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        {{-- <button type="button" class="btn btn-success btn-lg active">
                        <i class="zmdi zmdi-check"></i>&nbsp 確認送出</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer END -->

@endsection

<!-- Jquery JS -->
<script src="{{ asset('assets/CoolAdmin-master/vendor/jquery-3.2.1.min.js') }}">
</script>

<script>
    $(document).ready(function() {
        $('select[name="projectlistpersonal_new"]').on('change', function() {
            var m_id = $(this).val();
            if (m_id) {
                $.ajax({
                    url: "{{ url('/getSelects/edit/') }}/" + m_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="penetration_new"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="penetration_new"]').append(
                                '<option value="' + value.id + '">' + value
                                .categoryname + '</option>');

                        });
                    }
                });
            } else {
                $('select[name="penetration_new"]').empty();
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="client_new"]').on('change', function() {
            var c_id = $(this).val();
            if (c_id) {
                $.ajax({
                    url: "{{ url('/getSelects2/edit/') }}/" + c_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="serial_new"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="serial_new"]').append(
                                '<option value="' + value.id + '">' + value
                                .serial + ' / ' + value.projectname +
                                '</option>');

                        });
                    }
                });
            } else {
                $('select[name="serial_new"]').empty();
            }
        });

    });
</script>

<script>
    $(document).ready(function() {

        $("#time_new").on("change", function() {

            var start, end;
            var start_text, st_add_zero;
            var end_text, end_add_zero;

            var datetime = $("#time_new").val();

            // Clear time
            $("#starttime_new").val("");
            $("#endtime_new").val("");

            // start time
            for (start = 7.5; start < 19.5; start = (start + 0.5)) {
                start_text = ((start % 1) != 0 ? '00' : '30');
                st_add_zero = start < (9 + 0.5) ? '0' + Math.round(start) : Math.round(
                    start);
                st_data = datetime + "T" + st_add_zero + ":" + start_text + ":00";

                $("#starttime_new").append("<option value=" + st_data + ">" + st_add_zero +
                    ":" +
                    start_text + "</option>");
            }

            // end time
            for (end = 8; end < 20; end = (end + 0.5)) {
                end_text = ((end % 1) != 0 ? '00' : '30');
                end_add_zero = end < (9 + 0.5) ? '0' + Math.round(end) : Math.round(end);
                end_data = datetime + "T" + end_add_zero + ":" + end_text + ":00";
                $("#endtime_new").append("<option value=" + end_data + ">" + end_add_zero +
                    ":" +
                    end_text +
                    "</option>");
            }
        });
    });
</script>

<!-- SELECT 判斷 顯示文字 -->
<script>
    $(document).ready(function() {

        $("#starttime_new,#endtime_new").on("change", function() {

            var st_time = $("#starttime_new").val();
            var en_time = $("#endtime_new").val();
            var total_time = $("#totaltime_new").val();

            if (st_time == "") {
                alert("請填寫開始時間!!");
            } else if (en_time == "") {
                alert("請填寫結束時間!!");
            } else if (st_time == en_time) {
                alert("開始時間結束時間不可相同!!");
                $("#starttime_new,#endtime_new,#totaltime_new").val("");
            } else if (st_time > en_time) {
                alert("開始時間不可比結束時間晚!!");
                $("#starttime_new,#endtime_new,#totaltime_new").val("");
            } else {

                var st_time_par = Date.parse(st_time); // 123456678
                var en_time_par = Date.parse(en_time);

                var st_date = new Date(st_time_par); // 2021-08-26T09:00:00
                var en_date = new Date(en_time_par);

                var st_getHours = st_date.getHours(); // 時
                var en_getHours = en_date.getHours();

                var st_getMinutes = st_date.getMinutes(); // 分
                var en_getMinutes = en_date.getMinutes();

                var st_Minutes = (st_getMinutes == 0) ? "0" : "0.5";
                var en_Minutes = (en_getMinutes == 0) ? "0" : "0.5";

                var st_num = parseFloat(st_getHours) + parseFloat(st_Minutes); //   時+分=數值
                var en_num = parseFloat(en_getHours) + parseFloat(en_Minutes);

                var st_relax, end_relax, relax;

                if (st_num == 12 || st_num == 18) { //  開始
                    st_relax = -1;
                } else if (st_num == 12.5 || st_num == 18.5) {
                    st_relax = -0.5;
                } else {
                    st_relax = 0;
                }


                if (en_num == 12.5 || en_num == 18.5) { //  結束
                    end_relax = -0.5;
                } else if (en_num == 13 || en_num == 19) {
                    end_relax = -1;
                } else {
                    end_relax = 0;
                }

                if (en_num > 19 && st_num < 12) { //    區間
                    relax = -2;
                } else if (en_num > 13 && st_num < 12) {
                    relax = -1;
                } else if (st_num < 18 && en_num > 19) {
                    relax = -1;
                } else {
                    relax = 0;
                }

                sum = (en_num - st_num) + (st_relax) + (end_relax) + (relax);

                if (sum < 0) {
                    alert("休息時段，不列入紀錄!!");
                    $("#starttime_new,#endtime_new,#total_time_new").val("");
                } else {
                    $("#totaltime_new").val(sum);
                }
            }

            var time_change;

            if (sum < 8) {
                time_change = sum / 8;
                $("#time_change_new").val(time_change);
            } else {
                $("#time_change_new").val(1);
            }
        });
    });
</script>

<!-- 修正選取日期，時間未更新 -->
<script>
    $(document).ready(function() {
        $("#time_new").on("change", function() {
            $("#starttime_new").val("");
            $("#starttime_text").val("").text("");
            $("#endtime_new").val("");
            $("#endtime_text").val("").text("");
            $("#totaltime_new").val("");
            $("#time_change_new").val("");
        });
    });
</script>

<!-- 隱藏原始項目 -->
<script>
    $(document).ready(function() {
        $(".form-control").on("click", function() {
            $("#client_text").hide();
            $("#serial_text").hide();
            $("#projectlistpersonal_text").hide();
            $("#penetration_text").hide();
        });
    });
</script>
