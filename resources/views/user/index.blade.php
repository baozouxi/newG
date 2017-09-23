@extends($layout)

@push('guide')
    <li>用户管理</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ĵ</span>用户列表</h3></div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                         url="{{ route('user.create') }}"><span class="icon">ŷ</span>新增用户</a></h3>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="50">
                    <center>编号</center>
                </th>
                <th width="120">
                    <center>用户组/角色</center>
                </th>
                <th width="*">用户名/登录名</th>
                <th width="60">
                    <center>状态</center>
                </th>
                <th width="120">
                    <center>手机</center>
                </th>
                <th width="120">
                    <center>QQ</center>
                </th>
                <th width="120">
                    <center>微信</center>
                </th>
                <th width="60">
                    <center>属性</center>
                </th>
                <th width="60">
                    <center>排序</center>
                </th>
                <th width="60">
                    <center>登陆</center>
                </th>
                <th width="120">
                    <center>最后登陆</center>
                </th>
                <th width="60">
                    <center>合并</center>
                </th>
                <th width="40">
                    <center>删</center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            @foreach($users as $user)
                <tr>
                    <td>
                        <center>{{ $user->id }}</center>
                    </td>
                    <td><center>
                        <i>{{ $user->roles()->first()->name }}</i>
                        {{--<span>(咨询)</span>--}}
                        </center>
                    </td>
                    <td><a href="javascript:void(0);" onclick="fastH(this,'main')"
                           url="user.asp?act=add&amp;s=1&amp;id=2">{{ $user->name }}</a> <span
                                style="text-transform:uppercase;">{{ $user->email }}</span>
                    </td>
                    <td>
                        <center><span id="online2" style="cursor:pointer;"
                                      onclick="fast('user.asp?act=online&amp;id=2','online2');"
                                      title="踢出后台">离线</span></center>
                    </td>
                    <td>
                        <center>{{ $user->phone }}</center>
                    </td>
                    <td>
                        <center>{{ $user->qq }}</center>
                    </td>
                    <td>
                        <center>{{ $user->weixin }}</center>
                    </td>
                    <td>
                        <center><span id="state2" style="cursor:pointer;"
                                      onclick="fast('user.asp?act=state&amp;id=2','state2');">{{ $user->active ? '启用' : '禁用' }}</span></center>
                    </td>
                    <td>
                        <center><span id="rank2" style="cursor:pointer;"
                                      onclick="fastE('user.asp','rank',2)">{{ $user->sort }}</span></center>
                    </td>
                    <td>
                        <center>9</center>
                    </td>
                    <td>
                        <center>06-02 09:15</center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);"
                                   url="user.asp?act=move&amp;id=2">合并</a></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);"
                                   url="user.asp?act=del&amp;id=2"><span class="icon"><em>ź</em></span></a></center>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{--<input type="hidden" name="this_url" id="this_url" value="/user.asp"></div>--}}

@endsection