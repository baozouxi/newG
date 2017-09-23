@extends($layout)


@push('guide')
    <li>用户组管理</li>
@endpush




@section('content')

    <div class="top"><h3 class="left"><span class="icon">ĵ</span>用户组列表</h3></div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                         url="{{ route('roles.create') }}"><span class="icon">ŷ</span>新增用户组</a></h3>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="50">
                    <center>编号</center>
                </th>
                <th width="*">用户组名称</th>
                <th width="60">
                    <center>类型</center>
                </th>
                <th width="60">
                    <center>状态</center>
                </th>
                <th width="60">
                    <center>排序</center>
                </th>
                <th width="40">
                    <center>删</center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            <tr class="t1">
                <td>
                    <center>1</center>
                </td>
                <td>超级管理员</td>
                <td>
                    <center><em>系统</em></center>
                </td>
                <td>
                    <center><em>系统</em></center>
                </td>
                <td>
                    <center><span id="rank1" style="cursor:pointer;" onclick="fastE('group.asp','rank',1)">0</span>
                    </center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
            </tr>
            @foreach($roles as $role)
            <tr class="t2">
                <td>
                    <center>{{ $role->id }}</center>
                </td>
                <td><a href="javascript:void(0);" onclick="fastH(this,'main')"
                       url="group.asp?act=add&amp;s=1&amp;id=2">{{ $role->name }}</a></td>
                <td>
                    <center><span>咨询</span></center>
                </td>
                <td>
                    <center><span id="state2" style="cursor:pointer;"
                                  onclick="fast('group.asp?act=state&amp;id=2','state2');">{{ $role->active ? '正常' : '禁用'  }}</span></center>
                </td>
                <td>
                    <center><span id="rank2" style="cursor:pointer;" onclick="fastE('group.asp','rank',2)">{{ $role->sort }}</span>
                    </center>
                </td>
                <td>
                    <center><a href="javascript:void(0);" id="del2" style="color:red"
                               onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=2','del2');}"><span
                                    class="icon"><em>ź</em></span></a></center>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="{{ route('roles.index') }}"></div>

@endsection

