<!-- start client create dialog -->
<div id="dialog" title="新增" style="display:none">
    <form method="POST" action="{{ route('store.client') }}">
        @csrf
        <input name="client" placeholder="客戶名稱" style="border:1px #D9D9D9 solid;margin-top:10px" required>
        <button class="btn btn-primary btn-sm">送出</button>
    </form>
</div>
<!-- end client create dialog -->

<!-- start client edit dialog -->
<div id="dialog_client_edit" title="修改" style="display:none">
    <form method="POST" action="{{ route('update.client') }}">
        @csrf
        <input id="client_edit_id" name="client_edit_id" style="display: none">
        <input id="client_edit_input" name="client_edit_input" style="border:1px #D9D9D9 solid;margin-top:10px;"
            required>
        <button class="btn btn-primary btn-sm">送出</button>
    </form>
</div>
<!-- end client edit dialog -->
