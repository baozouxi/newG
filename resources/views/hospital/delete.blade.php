<form id="form_sub" name="form_sub" method="post"
      action="javascript:fastP('{{ route('hospital.delete', ['hospital'=>$hospital]) }}');"><select class="select"
                                                                                                    name="var" id="var"
                                                                                                    style="width:370px;">
        <option value="1">网站预约</option>
        <option value="6" selected="selected">PC商务通</option>
        <option value="7">手机商务通</option>
        <option value="8">网站电话</option>
        <option value="23">糯米电话</option>
        <option value="32">微信</option>
        <option value="33">抓取电话</option>
    </select><input type="hidden" name="id" id="id" value="6"><input type="hidden" name="up" id="up" value="del"><label
            class="inline"></label>
    <div name="msg" id="msg" style="width:351px;" class="msg">请稍后..</div>
    <label class="inline"></label>
    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">ź</span>关闭</button>
</form>