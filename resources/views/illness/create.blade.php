<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('illnesses.store') }}');">

    {!! csrf_field() !!}
    <label class="inline">分类名称</label><input type="text" name="name" id="name" class="input" value=""
                                             style="width: 360px; background-color: rgb(255, 255, 255); background-image: none;"
                                             autocomplete="off" disableautocomplete=""
                                             onblur="this.style.backgroundColor='#fff';"
                                             onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">


    <label class="inline"></label>
    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">ź</span>关闭</button>
    <label class="inline"></label>
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
</form>