@extends('.site.layouts.master')

@section('index_path')
    個人工作日誌　>　新增工作日誌
@endsection

@section('index_show')
    新增工作日誌
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
                    <form method="post" action="{{ route('record.store') }}" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label"> 同仁姓名</label>
                            </div>
                            <div class="col-12 col-md-9">
                                {{-- 原本為p改為input↓ --}}
                                <input class="form-control-static" value="{{ $usermodels }}" name="username" id="username"
                                    readonly unselectable="on" style="color:gray">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">客戶名稱</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="client" id="client" class="form-control" required>
                                    <option value="">請選擇</option>
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
                                <select name="serial" id="client" class="form-control" required>
                                    <option value="">請選擇</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">工作類別</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="projectlistpersonal" id="projectlistpersonal" class="form-control" required>
                                    <option value="">請選擇</option>
                                    @foreach ($lists as $data)
                                        <option value="{{ $data->id }}">{{ $data->projectname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">工作項目</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="penetration" id="projectlistpersonal" class="form-control" required>
                                    <option value="">請選擇</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">日期</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control-static" type="date" style="color: grey" id="time" name="time">
                                <-請選擇日期 </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">開始時間</label>
                                </div>
                                <div class="col col-md-9">
                                    <select name="starttime" id="starttime" class="form-control" style="width: 12%;"
                                        required>
                                        <option value="">請選擇</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class="form-control-label">結束時間</label>
                                </div>
                                <div class="col col-md-9">
                                    <select name="endtime" id="endtime" class="form-control" style="width: 12%;" required>
                                        <option value="">請選擇</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">總時數</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="col col-md-9">
                                        <input class="form-control-static" value="" name="totaltime" id="totaltime" readonly
                                            unselectable="on" style="color:gray;width:10.5%;" required>時
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">工時換算</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="col col-md-9">
                                        <input class="form-control-static" value="" name="time_change" id="time_change"
                                            readonly unselectable="on" style="color:gray;width:10.5%">天
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">摘要</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="summary" id="summary" rows="3" placeholder="請填寫內容"
                                        class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">備註</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="remarks" id="remarks" rows="3" placeholder="無"
                                        class="form-control"></textarea>
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
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban" aria-hidden="true"></i> 清除
                                </button>
                                <button id="btn_ok" type="button" class="btn btn-primary btn-sm">
                                    <i class="zmdi zmdi-check" aria-hidden="true"></i> 確認送出
                                </button>
                            </div>
                        </div>
                    </form>
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
        $('select[name="projectlistpersonal"]').on('change', function() {
            var m_id = $(this).val();
            if (m_id) {
                $.ajax({
                    url: "{{ url('/getSelects/') }}/" + m_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="penetration"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="penetration"]').append(
                                '<option value="' + value.id + '">' + value
                                .categoryname + '</option>');

                        });
                    }
                });
            } else {
                $('select[name="penetration"]').empty();
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="client"]').on('change', function() {
            var c_id = $(this).val();
            if (c_id) {
                $.ajax({
                    url: "{{ url('/getSelects2/') }}/" + c_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="serial"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="serial"]').append('<option value="' +
                                value.id + '">' + value.serial + ' / ' + value
                                .projectname + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="serial"]').empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#time").on("change", function() {

            var start, end;
            var start_text, st_add_zero;
            var end_text, end_add_zero;

            var datetime = $("#time").val();

            // Clear time
            $("#starttime").val("");
            $("#endtime").val("");

            // start time
            for (start = 7.5; start < 19.5; start = (start + 0.5)) {
                start_text = ((start % 1) != 0 ? '00' : '30');
                st_add_zero = start < (9 + 0.5) ? '0' + Math.round(start) : Math.round(start);
                st_data = datetime + "T" + st_add_zero + ":" + start_text + ":00";

                $("#starttime").append("<option value=" + st_data + ">" + st_add_zero + ":" +
                    start_text + "</option>");
            }

            // end time
            for (end = 8; end < 20; end = (end + 0.5)) {
                end_text = ((end % 1) != 0 ? '00' : '30');
                end_add_zero = end < (9 + 0.5) ? '0' + Math.round(end) : Math.round(end);
                end_data = datetime + "T" + end_add_zero + ":" + end_text + ":00";
                $("#endtime").append("<option value=" + end_data + ">" + end_add_zero + ":" + end_text +
                    "</option>");
            }
        });
    });
</script>


<!-- SELECT 判斷 顯示文字 -->
<script>
    $(document).ready(function() {
        $("#starttime,#endtime").on("click", function() {

            var datetime = $("#time").val();

            if (datetime == "") {
                alert("請填寫日期!!");
            } else {}
        });

        $("#starttime,#endtime").on("change", function() {

            var st_time = $("#starttime").val();
            var en_time = $("#endtime").val();
            var total_time = $("#totaltime").val();

            if (st_time == "") {
                alert("請填寫開始時間!!");
            } else if (en_time == "") {
                alert("請填寫結束時間!!");
            } else if (st_time == en_time) {
                alert("開始時間結束時間不可相同!!");
                $("#starttime,#endtime,#total_time").val("");
            } else if (st_time > en_time) {
                alert("開始時間不可比結束時間晚!!");
                $("#starttime,#endtime,#total_time").val("");
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
                    $("#starttime,#endtime,#total_time").val("");
                } else {
                    $("#totaltime").val(sum);
                }
            }

            var time_change;

            if (sum < 8) {
                time_change = sum / 8;
                $("#time_change").val(time_change);
            } else {
                $("#time_change").val(1);
            }
        });
    });
</script>


<!-- 隱藏 SELECT 請選擇 -->
<script>
    $(document).ready(function() {
        $("#client,#projectlistpersonal,#starttime,#endtime").click(function() {
            $("#client option:first,#projectlistpersonal option:first,#starttime option:first,#endtime option:first")
                .hide();
        })
    });
</script>
