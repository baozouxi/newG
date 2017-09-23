@extends($layout)


@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this);" url="{{ route('appointments.index') }}">预约列表</a><span
                class="ider">&gt;</span>
    </li>

    <li>新增预约</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">ŷ</span>新增预约</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                  url="{{ route('appointments.index') }}" id="ref_url" title="返回" class="config"><span
                        class="icon">ĭ</span>返回</a></p></div>
    <div id="box" class="box">
        <div id="tab">
            <ul>
                <li onclick="setTab(0)" class="now">患者信息</li>
                <li onclick="setTab(1)">聊天记录</li>
                <li onclick="setTab(2)">其它信息</li>
            </ul>
        </div>
        <div id="tablist">
            <form id="form_sub" name="form_sub" method="post"
                  action="javascript:fastP('{{ route('appointments.store') }}');">
                <div id="list_0" class="list block"><label class="inline"><em>*</em>姓名：<span
                                style="color:#222;padding-left:65px;"><em>*</em>年龄：</span><span
                                style="color:#222;padding-left:17px;">性别：</span></label><input type="text"
                                                                                               name="name" id="name"
                                                                                               class="input"
                                                                                               value=""
                                                                                               style="width:95px;"
                                                                                               autocomplete="off"
                                                                                               disableautocomplete=""
                                                                                               onblur="this.style.backgroundColor='#fff';"
                                                                                               onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><input
                            type="text" name="age" id="age" class="input" value="" style="width:35px;"
                            autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                            onfocus="this.style.backgroundColor='#FFFEF1';"><select class="select" name="gender"
                                                                                    id="gender" style="width:45px;">
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>

                    {!! csrf_field() !!}

                    <script>$('name').onblur = function () {
                            check('res.asp', 'name', 0);
                            this.style.backgroundColor = '#fff';
                        }</script>
                    <label class="inline"><em>*</em>手机：<span id="phone_city"
                                                             style="color:#19A97B;"></span></label><input
                            type="text" name="phone" id="phone" class="input" value="" style="width:195px;"
                            autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                            onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">

                    <script>check_phone();
                        $('phone').onblur = function () {
                            check('res.asp', 'phone', 0);
                            check_phone();
                            this.style.backgroundColor = '#fff';
                        }</script>
                    <input type="hidden" name="illness_id" id="illness_id" value=""><label
                            class="inline">病种分类：</label><select
                            class="select" name="dis" id="dis" style="width:205px;">
                        <option value="8">肾病综合征</option>
                        <option value="9">肌酐</option>
                        <option value="11">慢性肾炎</option>
                        <option value="13">急性肾炎</option>
                        <option value="14">IgA肾病</option>
                        <option value="15">紫癜性肾炎</option>
                        <option value="16">狼疮性肾炎</option>
                        <option value="17">肾囊肿</option>
                        <option value="18">多囊肾</option>
                        <option value="19">肾检</option>
                        <option value="20">糖尿病肾病</option>
                        <option value="21">高血压肾病</option>
                        <option value="22">肾盂肾炎</option>
                        <option value="23">肾结石/肾积水</option>
                        <option value="24">肾萎缩</option>
                        <option value="25">尿蛋白/潜血</option>
                        <option value="26">肾功能不全</option>
                        <option value="27">肾衰竭</option>
                        <option value="28">尿毒症-已透析</option>
                        <option value="38">膜性肾炎</option>
                    </select><label class="inline">预约医生：<span>按实际选择，如无则不选</span></label><select class="select"
                                                                                                name="doctor_id"
                                                                                                id="doctor_id"
                                                                                                style="width:205px;">
                        <option value="0">请选择</option>
                        <option value="6">赵中献</option>
                        <option value="7">黄小松</option>
                        <option value="8">杨惠标</option>
                        <option value="10">王奎</option>
                        <option value="11">张建儒</option>
                    </select><label
                            class="inline">来源途径：</label><select class="select" name="way_id" id="way_id"
                                                                style="width:205px;">
                        <option value="6">PC商务通</option>
                        <option value="7">手机商务通</option>
                        <option value="8">网站电话</option>
                        <option value="23">糯米电话</option>
                        <option value="32">微信</option>
                        <option value="33">抓取电话</option>
                    </select><label class="inline"><em>*</em>预约时间：<span>如不确定，在随诊前面打勾</span></label><input
                            type="text" name="book_date" id="book_date" class="Wdate" value="" style="width:193px;"
                            autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                            onfocus="this.style.backgroundColor='#FFFEF1';">
                    <script>$('book_date').className = 'Wdate';
                        $('book_date').onfocus = function () {
                            WdatePicker({
                                dateFmt: 'yyyy-MM-dd HH:00',
                                minDate: '%y-%M-%d',
                                maxDate: '%y-{%M+1}-%d'
                            });
                        }</script>
                    <label
                            class="inline"><em>*</em>记录上传：</label><input type="text" name="filepath" id="filepath"
                                                                         class="input" value="" style="width:430px;"
                                                                         autocomplete="off" disableautocomplete=""
                                                                         onblur="this.style.backgroundColor='#fff';"
                                                                         onfocus="this.style.backgroundColor='#FFFEF1';"
                                                                         readonly="true">
                    <script>$('filepath').setAttribute('readOnly', true);</script>
                    <button type="button" onclick="msgbox(this);" title="上传资料"
                            url="upload.asp?act=main&amp;to=filepath" class="button"><i class="icon">Ī</i>上传
                    </button>
                    <label class="inline">来源地区：</label><select class="select" name="province" id="province"
                                                               style="width:100px;">
                        <option value="0">省份</option>

                    </select><select class="select" name="city" id="city" style="width:100px;">
                        <option value="0">地级市</option>
                    </select><select class="select" name="town" id="town" style="width:100px;">
                        <option value="0">市、县级市、县</option>
                    </select><input type="text" name="address" id="address" class="input" value=""
                                    style="width:195px;" autocomplete="off" disableautocomplete=""
                                    onblur="this.style.backgroundColor='#fff';"
                                    onfocus="this.style.backgroundColor='#FFFEF1';">
                    <script>setup();
                        preselect('010102');</script>
                    <label class="inline"><em>*</em>备注信息：<span>不能超过500个字符</span></label><textarea name="content"
                                                                                                  id="content"
                                                                                                  class="textarea"
                                                                                                  style="width:500px;height:100px;"
                                                                                                  onblur="this.style.backgroundColor='#fff';"
                                                                                                  onfocus="this.style.backgroundColor='#FFFEF1';"></textarea>
                </div>
                <div id="list_1" class="list">
                    <textarea name="chatlog" id="chatlog"></textarea>
                    <script type="text/javascript">
                        var instance = new TINY.editor.edit('o', {
                            id: 'chatlog',
                            width: '100%',
                            height: '400px',
                            cssclass: 'te',
                            controlclass: 'tecontrol',
                            rowclass: 'teheader',
                            dividerclass: 'tedivider',
                            controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', 'hr', '|', 'undo', 'redo', '|', 'print'],
                            fonts: ['Verdana', 'Arial', 'Georgia', 'Trebuchet MS'],
                            xhtml: true,
                            cssfile: 'tiny.css',
                            css: 'swt',
                            bodyid: 'editor',
                            footerclass: 'tefooter',
                            toggle: {
                                text: 'source',
                                activetext: 'wysiwyg',
                                cssclass: 'toggle'
                            },
                            resize: {
                                cssclass: 'resize'
                            }
                        });
                    </script>
                </div>
                <div id="list_2" class="list"><label class="inline">客户职业：</label><input type="text" name="job"
                                                                                        id="job" class="input"
                                                                                        value=""
                                                                                        style="width:200px;"
                                                                                        autocomplete="off"
                                                                                        disableautocomplete=""
                                                                                        onblur="this.style.backgroundColor='#fff';"
                                                                                        onfocus="this.style.backgroundColor='#FFFEF1';"><label
                            class="inline">QQ号码：</label><input type="text" name="qq" id="qq" class="input" value=""
                                                               style="width:200px;" autocomplete="off"
                                                               disableautocomplete=""
                                                               onblur="this.style.backgroundColor='#fff';"
                                                               onfocus="this.style.backgroundColor='#FFFEF1';"><label
                            class="inline">微信号码：</label><input type="text" name="weixin" id="weixin" class="input"
                                                               value="" style="width:200px;" autocomplete="off"
                                                               disableautocomplete=""
                                                               onblur="this.style.backgroundColor='#fff';"
                                                               onfocus="this.style.backgroundColor='#FFFEF1';"><label
                            class="inline">关键词：</label><input type="text" name="keyword" id="keyword" class="input"
                                                              value="" style="width:200px;" autocomplete="off"
                                                              disableautocomplete=""
                                                              onblur="this.style.backgroundColor='#fff';"
                                                              onfocus="this.style.backgroundColor='#FFFEF1';"><label
                            class="inline">来源网站：</label><select class="select" name="website" id="website"
                                                                style="width:210px;">
                        <option value="0">请选择</option>
                        <option value="1">www.xxx.com</option>
                        <option value="2">m.xxx.com</option>
                    </select><label class="inline">信息来源：</label><select class="select" name="source" id="source"
                                                                        style="width:210px;">
                        <option value="0">请选择</option>
                        <option value="1">寻医问药</option>
                        <option value="2">999健康</option>
                    </select></div>
                <input type="hidden" name="id" id="id" value="0"><input type="hidden" name="up" id="up"
                                                                        value="data"><label
                        class="inline"></label><input type="hidden" name="back_url" id="back_url"
                                                      value="res.asp?m=res&amp;s=1"><label class="inline"></label>
                <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span
                            class="icon">ĭ</span>返回
                </button>
            </form>
        </div>
        <input type="hidden" name="this_url" id="this_url" value="/res.asp?act=add&amp;m=res"></div>
@endsection