@extends($layout)


@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this, 'main');set_title('列表');"
           url="{{ route('user.index') }}">用户管理</a><span class="ider">&gt;</span></li>
    <li>新增用户</li>
@endpush


@section('content')
    <div class="top"><h3 class="left"><span class="icon">ŷ</span>新增用户</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                  url="{{ route('user.index') }}"
                                  id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
    </div>


    <div id="box" class="box">
        <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('user.store') }}');"><label
                    class="inline">姓名</label><input type="text" name="name" id="name" class="input" value=""
                                                    style="width:140px;" autocomplete="off"
                                                    disableautocomplete=""
                                                    onblur="this.style.backgroundColor='#fff';"
                                                    onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><input
                    name="active" id="active" class="checkbox" type="checkbox" value="0"><label
                    for="active"><i>禁用</i></label>

            <label class="inline">邮箱<span>登录使用</span></label>
            <input
                    type="text" name="email" id="email" class="input" value="" style="width:195px;"
                    autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                    onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
            {{--<script>$('email').onblur = function () {--}}
            {{--check('user.asp', 'email', 0);--}}
            {{--this.style.backgroundColor = '#fff';--}}
            {{--}</script>--}}
            <label class="inline">手机号<span id="phone_city" style="color:#19A97B;"></span></label><input
                    type="text" name="phone" id="phone" class="input" value="" style="width:195px;"
                    autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';"
                    onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
            {{--<script>check_phone();--}}
            {{--$('phone').onblur = function () {--}}
            {{--check('user.asp', 'phone', 0);--}}
            {{--check_phone();--}}
            {{--this.style.backgroundColor = '#fff';--}}
            {{--}</script>--}}
            <label class="inline">QQ号</label><input type="text" name="qq" id="qq" class="input" value=""
                                                    style="width:195px;" autocomplete="off"
                                                    disableautocomplete=""
                                                    onblur="this.style.backgroundColor='#fff';"
                                                    onfocus="this.style.backgroundColor='#FFFEF1';"><span></span><label
                    class="inline">微信号</label><input type="text" name="weixin" id="weixin" class="input"
                                                     value="" style="width:195px;" autocomplete="off"
                                                     disableautocomplete=""
                                                     onblur="this.style.backgroundColor='#fff';"
                                                     onfocus="this.style.backgroundColor='#FFFEF1';"><span></span>
            <label
                    class="inline">密码</label><input type="password" name="password" id="password" class="input" value=""
                                                    style="width:195px;" autocomplete="off"
                                                    onblur="this.style.backgroundColor='#fff';"
                                                    onfocus="this.style.backgroundColor='#FFFEF1';">
            <label
                    class="inline">确认密码</label><input type="password" name="password_confirmation"
                                                      id="password_confirmation" class="input" value=""
                                                      style="width:195px;" autocomplete="off"
                                                      onblur="this.style.backgroundColor='#fff';"
                                                      onfocus="this.style.backgroundColor='#FFFEF1';">


            <label
                    class="inline">所属用户组</label><select class="select" name="group_id" id="group_id"
                                                        style="width:205px;">
                @foreach($roles as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select><label class="inline">用户管理权限</label><select class="select" name="roles[]" id="roles"
                                                                 multiple="multiple"
                                                                 style="width:205px;height:100px;">
                <option value="0" selected="selected">不选择(无权限进行任何操作)</option>
                @foreach($roles as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select><label class="inline">医院可视权限</label><select class="select" name="hids[]" id="hids"
                                                                 multiple="multiple"
                                                                 style="width:205px;height:100px;">
                @foreach($hospitals as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
                {{--</select><label class="inline">医生可视权限<span>医助和医生使用</span></label><select class="select" name="dep"--}}
                {{--id="dep"--}}
                {{--multiple="multiple"--}}
                {{--style="width:205px;height:100px;">--}}
                {{--<option value="0" selected="selected">不选择</option>--}}
                {{--<option value="1">刘主任</option>--}}
                {{--<option value="2">黄主任</option>--}}
                {{--<option value="3">陈主任</option>--}}
                {{--<option value="4">林主任</option>--}}
                {{--<option value="6">赵中献</option>--}}
                {{--<option value="7">黄小松</option>--}}
                {{--<option value="8">杨惠标</option>--}}
                {{--<option value="9">张家华</option>--}}
                {{--<option value="10">王奎</option>--}}
                {{--<option value="11">张建儒</option>--}}
                {{--</select>--}}
                {!! csrf_field() !!}
                <input type="hidden" name="up" id="up" value="data"><input type="hidden" name="id" id="id"
                                                                           value="0"><label
                        class="inline"></label><input type="hidden" name="back_url" id="back_url"
                                                      value="{{ route('user.index') }}"><label class="inline"></label>
                <div name="msg" id="msg" style="width:370px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span
                            class="icon">ĭ</span>返回
                </button>
        </form>

@endsection