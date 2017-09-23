@extends($layout)

@push('guide')
    <li>医院管理</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ũ</span>医院列表</h3></div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);"
                                         url="{{ route('hospital.create') }}"><span class="icon">ŷ</span>新增医院</a></h3>
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
            @foreach($hospitals as $hospital)
                <tr>
                    <td>
                        <center>{{ $hospital->id }}</center>
                    </td>
                    <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);"
                           url="{{ route('hospital.edit',['hospital'=>$hospital->id]) }}">{{ $hospital->name }}</a></td>
                    <td>
                        <center>
                            <form action="javascript:fastUpdate('{{ route('hospital.update',['hospital'=>$hospital->id]) }}','update{{$hospital->id}}','update-form-{{$hospital->id}}' )" id="update-form-{{$hospital->id}}"  method="post">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <input type="hidden" name="active" value="{{ $hospital->active ? '0' : '1' }}">
                                <button type="submit" id="update{{$hospital->id}}" class="submit-btn">{{ $hospital->active ? '正常' : '禁用'  }}</button>
                            </form>

                        </center>
                    </td>
                    <td>
                        <center><span id="rank1" style="cursor:pointer;"
                                      onclick="fastE('website.asp','rank',1)">{{ $hospital->sort }}</span></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);"
                                   url="website.asp?act=move&amp;id=1">合并</a></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" id="del{{ $hospital->id }}" style="color:red"
                                   onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fastDel('{{route('hospital.destroy',['hospital'=>$hospital->id])}}','del{{$hospital->id}}', '{{ csrf_token() }}');}"><span
                                        class="icon"><em>ź</em></span></a></center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="{{ route('hospital.index')  }}"></div>

@endsection