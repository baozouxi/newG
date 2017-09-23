@extends($layout)

@push('guide')
    <li>医生列表</li>
@endpush


@section('content')
    <div class="top"><h3 class="left"><span class="icon">ō</span>医生列表</h3></div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);"
                                         url="{{ route('doctors.create') }}"><span class="icon">ŷ</span>新增医生</a></h3>
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
                    <center>模版</center>
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
            @foreach($doctors as $doctor)
                <tr>
                    <td>
                        <center>{{ $doctor->id }}</center>
                    </td>
                    <td><u>{{ $doctor->name }}</u></td>
                    <td>
                        <center><span id="state7" style="cursor:pointer;"
                                      onclick="fast('dis.asp?act=state&amp;id=7','state7');">{{ $doctor->active ? '正常' : '禁用' }}</span></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);"
                                   url="dep.asp?act=tpl&amp;aid=7"><span>全局</span></a></center>
                    </td>
                    <td>
                        <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">{{ $doctor->sort }}</span>
                        </center>
                    </td>
                    <td>
                        <center><span>-</span></center>
                    </td>
                    <td>
                        <center><span>-</span></center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="{{ route('doctors.index') }}"></div>
@endsection