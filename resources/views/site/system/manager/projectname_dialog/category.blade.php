<!-- start create category dialog -->
<div id="dialog_store_category" title="新增" style="display:none">
  <form method="POST" action="{{ route('store.category') }}">
    @csrf
    <input name="projectname" placeholder="工作類別" style="border:1px #D9D9D9 solid;margin-top:10px" required>
    <button type="submit" class="btn btn-primary btn-sm">送出</button>
  </form>
</div>
<!-- end create category dialog -->

<!-- start edit category dialog -->
<div id="dialog_edit_category" title="修改" style="display:none">
  <form method="POST" action="{{ route('update.category') }}">
    @csrf
    <input id="category_id" name="category_id" style="display: none">
    <input id="category_edit" name="category_edit" style="border:1px #D9D9D9 solid;margin-top:10px" required>
    <button type="submit" class="btn btn-primary btn-sm">送出</button>
  </form>
</div>
<!-- end edit category dialog -->
