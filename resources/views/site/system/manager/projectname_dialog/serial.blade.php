<!-- start 專案編號 create dialog -->
<div id="dialog2" title="新增" style="display:none">
    <form method="POST" action="{{ route('store.serial') }}">
        @csrf
        <input name="serial" placeholder="專案編號" style="border:1px #D9D9D9 solid;margin-top:10px" required>
        <input name="projectname" placeholder="專案名稱" style="border:1px #D9D9D9 solid;margin-top:10px">

        <input id="pro_st_time" name="pro_st_time" placeholder="專案起始" style="border:1px #D9D9D9 solid;margin-top:10px"
            type="date"> 專案起始
        <input id="pro_end_time" name="pro_end_time" placeholder="專案結束" style="border:1px #D9D9D9 solid;margin-top:10px"
            type="date"> 專案結束
        <input id="ex_work_time" name="ex_work_time" placeholder="預估工時"
            style="border:1px #D9D9D9 solid;margin-top:10px">

        <select id="c_id" name="c_id" style="border: 1px #d9d9d9 solid;color:grey;margin-top:10px;width:200px;"
            required>
            <option id="client_opt" value="" selected>客戶名稱</option>
            @foreach ($lists5 as $data6)
                <option value="{{ $data6->id }}">{{ $data6->client }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary btn-sm">送出</button>
    </form>
</div>
<!-- end 專案編號 create dialog -->

<!-- start 專案編號 edit dialog -->
<div id="dialog_edit_project_serial" title="修改" style="display:none">
    <form method="POST" action="{{ route('update.serial') }}">
        @csrf
        <input id="serial_id" name="serial_id" style="display: none">
        <input id="serial_edit_input" name="serial_edit_input" style="border:1px #D9D9D9 solid;margin-top:10px"
            required>
        <input id="projectname_edit_input" name="projectname_edit_input"
            style="border:1px #D9D9D9 solid;margin-top:10px">

        <input id="pro_st_time_edit" name="pro_st_time_edit" style="border:1px #D9D9D9 solid;margin-top:10px"
            type="date">
        專案起始
        <input id="pro_end_time_edit" name="pro_end_time_edit" style="border:1px #D9D9D9 solid;margin-top:10px"
            type="date">
        專案結束
        <input id="ex_work_time_edit" name="ex_work_time_edit" style="border:1px #D9D9D9 solid;margin-top:10px">

        <select class="c_id" name="c_id"
            style="border: 1px #d9d9d9 solid;color:grey;margin-top:10px;width:200px;" required>
            <option id="serial_client_before" name="serial_client_before" selected>
            </option>
            @foreach ($lists5 as $data6)
                <option id="serial_client" name="serial_client" value="{{ $data6->id }}">
                    {{ $data6->client }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary btn-sm">送出</button>
    </form>
</div>
<!-- end 專案編號 edit dialog -->
