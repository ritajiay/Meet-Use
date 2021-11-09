@extends('.site.layouts.master')

@section('index_path', '人員出席紀錄　>　人員出席清單')

@section('index_show', '人員出席清單 (開發中)')

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
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label"> 同仁姓名</label>
                            </div>
                            <div class="col-12 col-md-9">
                                {{-- 原本為p改為input↓ --}}
                                <input class="form-control-static" value="" name="username" id="username" readonly
                                    unselectable="on" style="color:gray">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">客戶名稱</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="client" id="client" class="form-control" required>
                                    <option value="">請選擇</option>
                                    <option value=""></option>
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
                                    <option value=""></option>
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
                                <button id="btn_ok" type="submit" class="btn btn-primary btn-sm">
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
