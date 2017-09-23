<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('hospital.store') }}');">
    <input type="text"
           name="name"
           id="name"
           class="input"
           value=""
           style="width:360px;"
           autocomplete="off"
           disableautocomplete=""
           onblur="this.style.backgroundColor='#fff';"
           onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><input
            type="hidden" name="up" id="up" value="data"><input type="hidden" name="id" id="id" value="0"><label
            class="inline"></label>
    {!! csrf_field() !!}
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
    <label class="inline"></label>
    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">ź</span>关闭</button>
</form>
