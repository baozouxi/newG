@extends($layout)

@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');"
           url="{{ route('patients.index') }}">患者管理</a><span class="ider">&gt;</span>
    </li>
    <li>新增患者</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">ŷ</span>新增患者</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                  url="{{ route('patients.index') }}" id="ref_url" title="返回" class="config"><span
                        class="icon">ĭ</span>返回</a></p></div>
    <div id="box" class="box">
        <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('patients.store') }}');">
            <label
                    class="inline">患者姓名：<span style="color:#222;padding-left:46px;">年龄：</span><span
                        style="color:#222;padding-left:17px;">性别：</span></label><input type="text" name="name"
                                                                                       id="name" class="input"
                                                                                       value="" style="width:95px;"
                                                                                       autocomplete="off"
                                                                                       disableautocomplete=""
                                                                                       onblur="this.style.backgroundColor='#fff';"
                                                                                       onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><input
                    type="text" name="age" id="age" class="input" value="" style="width:35px;" autocomplete="off"
                    disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                    onfocus="this.style.backgroundColor='#FFFEF1';"><select class="select" name="gender" id="gender"
                                                                            style="width:45px;">
                <option value="1">男</option>
                <option value="2">女</option>
            </select>
            {!! csrf_field() !!}
            <script>$('name').onblur = function () {
                    check('turn.asp', 'name', 0);
                    this.style.backgroundColor = '#fff';
                }</script>
            <label class="inline">手机号码：<span id="phone_city" style="color:#19A97B;"></span></label><input
                    type="text" name="phone" id="phone" class="input" value="" style="width:195px;"
                    autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                    onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
            <script>check_phone();
                $('phone').onblur = function () {
                    check('turn.asp', 'phone', 0);
                    check_phone();
                    this.style.backgroundColor = '#fff';
                }</script>
            <label class="inline">病历号：</label><input type="text" name="medical_num" id="medical_num" class="input"
                                                     value=""
                                                     style="width:195px;" autocomplete="off" disableautocomplete=""
                                                     onblur="this.style.backgroundColor='#fff';"
                                                     onfocus="this.style.backgroundColor='#FFFEF1';">
            <button type="button" onclick="$('medical_num').value='{{ $medical_num }}';" class="button">生成</button>
            <button type="button" onclick="paste('medical_num');" class="button">粘贴</button>
            <label class="inline">病种分类：</label><select class="select" name="illness_id" id="illness_id"
                                                       style="width:205px;">
                @foreach($illnesses as $illness)
                    <option value="{{ $illness->id }}">{{ $illness->name }}</option>
                @endforeach
            </select><label class="inline">分配医生：</label><select class="select" name="doctor_id" id="doctor_id"
                                                                style="width:205px;">
                <option value="6">赵中献</option>
                <option value="7">黄小松</option>
                <option value="8">杨惠标</option>
                <option value="10">王奎</option>
                <option value="11">张建儒</option>
            </select><input type="hidden" name="res" id="res" value="0"><label class="inline">宣传媒体：</label><select
                    class="select" name="ad_id" id="ad_id" style="width:205px;">
                <option value="2">电视广告</option>
                <option value="3">杂志报纸</option>
                <option value="4">患者介绍</option>
            </select><label class="inline">来源地区：</label><select class="select" name="province" id="province"
                                                                style="width:100px;">
                <option value="0">省份</option>
                <option value="1">北京市</option>
                <option value="2">天津市</option>
                <option value="3">上海市</option>
                <option value="4">重庆市</option>
                <option value="5">河北省</option>
                <option value="6">山西省</option>
                <option value="7">内蒙古</option>
                <option value="8">辽宁省</option>
                <option value="9">吉林省</option>
                <option value="10">黑龙江省</option>
                <option value="11">江苏省</option>
                <option value="12">浙江省</option>
                <option value="13">安徽省</option>
                <option value="14">福建省</option>
                <option value="15">江西省</option>
                <option value="16">山东省</option>
                <option value="17">河南省</option>
                <option value="18">湖北省</option>
                <option value="19">湖南省</option>
                <option value="20">广东省</option>
                <option value="21">广西</option>
                <option value="22">海南省</option>
                <option value="23">四川省</option>
                <option value="24">贵州省</option>
                <option value="25">云南省</option>
                <option value="26">西藏</option>
                <option value="27">陕西省</option>
                <option value="28">甘肃省</option>
                <option value="29">青海省</option>
                <option value="30">宁夏</option>
                <option value="31">新疆</option>
                <option value="32">香港</option>
                <option value="33">澳门</option>
                <option value="34">台湾省</option>
            </select><select class="select" name="city" id="city" style="width:100px;">
                <option value="0">地级市</option>
                <option value="1">北京市</option>
            </select><select class="select" name="town" id="town" style="width:100px;">
                <option value="0">市、县级市、县</option>
                <option value="1">东城区</option>
                <option value="2">西城区</option>
                <option value="3">崇文区</option>
                <option value="4">宣武区</option>
                <option value="5">朝阳区</option>
                <option value="6">丰台区</option>
                <option value="7">石景山区</option>
                <option value="8">海淀区</option>
                <option value="9">门头沟区</option>
                <option value="10">房山区</option>
                <option value="11">通州区</option>
                <option value="12">顺义区</option>
                <option value="13">昌平区</option>
                <option value="14">大兴区</option>
                <option value="15">怀柔区</option>
                <option value="16">平谷区</option>
                <option value="17">密云县</option>
                <option value="18">延庆县</option>
                <option value="19">延庆镇</option>
            </select><input type="text" name="address" id="address" class="input" value="" style="width:195px;"
                            autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                            onfocus="this.style.backgroundColor='#FFFEF1';">
            <script>setup();
                preselect('010102');</script>
            <label class="inline">备注信息：</label><textarea name="content" id="content" class="textarea"
                                                         style="width:500px;height:100px;"
                                                         onblur="this.style.backgroundColor='#fff';"
                                                         onfocus="this.style.backgroundColor='#FFFEF1';"></textarea><input
                    type="hidden" name="id" id="id" value="0"><label class="inline"></label><input type="hidden"
                                                                                                   name="back_url"
                                                                                                   id="back_url"
                                                                                                   value="turn.asp?m=turn&amp;s=1"><input
                    type="hidden" name="up" id="up" value="turn"><label class="inline"></label>
            <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
            <label class="inline"></label>
            <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
            <button type="reset" class="button"><span class="icon">ň</span>重置</button>
            <button type="button" onclick="To($('back_url').value,'main');" class="button"><span
                        class="icon">ĭ</span>返回
            </button>
        </form>
@endsection