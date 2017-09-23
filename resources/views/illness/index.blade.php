@extends($layout)

@push('guide')
    <li>病种管理</li>
@endpush


@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ĉ</span>病种列表</h3></div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);"
                                         url="{{ route('illnesses.create') }}"><span class="icon">ŷ</span>新增病种</a></h3>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="50">
                    <center>编号</center>
                </th>
                <th width="*">名称</th>
                <th width="60">
                    <center>状态</center>
                </th>
                <th width="60">
                    <center>短信</center>
                </th>
                <th width="60">
                    <center>排序</center>
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
            @foreach($illnesses as $illness)
                <tr>
                    <td>
                        <center>{{ $illness->id }}</center>
                    </td>
                    <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);"
                           url="dis.asp?act=add&amp;id=7">{{ $illness->name }}
                    </td>
                    <td>
                        <center><span id="state7" style="cursor:pointer;"
                                      onclick="fast('dis.asp?act=state&amp;id=7','state7');">{{ $illness->active ? '正常' : '禁用' }}</span>
                        </center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);"
                                   url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                    </td>
                    <td>
                        <center><span id="rank7" style="cursor:pointer;"
                                      onclick="fastE('dis.asp','rank',7)">{{ $illness->sort }}</span>
                        </center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);"
                                   url="dis.asp?act=move&amp;id=7">合并</a></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);"
                                   url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="{{ route('illnesses.index') }}"></div>
@endsection