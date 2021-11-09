<!-- start project create dialog -->
<div id="dialog4" title="新增" style="display:none">
    <form method="POST" action="{{ route('store.object') }}">
        @csrf
        <input name="objectname" placeholder="工作項目" style="border:1px #D9D9D9 solid;margin-top:10px" required>
        <select name="m_id" style="border: 1px #d9d9d9 solid;color:grey;margin-top:10px;width:200px;" required>
            <option value="" selected>工作類別</option>
            @foreach ($lists as $data7)
                <option value="{{ $data7->id }}">{{ $data7->projectname }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary btn-sm">送出</button>
    </form>
</div>
<!-- end project create dialog -->

<!-- start project edit dialog -->
<div id="dialog_edit_object" title="修改" style="display:none">
    <form method="POST" action="{{ route('update.object') }}">
        @csrf
        <input style="display: none" id="object_edit_id" name="object_edit_id">
        <input id="objectname_edit" name="objectname_edit" style="border:1px #D9D9D9 solid;margin-top:10px" required>
        <select class="m_id" id="m_id" name="m_id"
            style="border: 1px #d9d9d9 solid;color:grey;margin-top:10px;width:200px;" required>
            <option id="objectname_opt" name="objectname_opt" selected></option>
            @foreach ($lists as $data7)
                <option value="{{ $data7->id }}">{{ $data7->projectname }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary btn-sm">送出</button>
    </form>
</div>
<!-- end project edit dialog -->
