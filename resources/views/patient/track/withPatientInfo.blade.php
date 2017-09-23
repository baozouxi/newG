@extends($layout)

@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');"
           url="{{ route('patients.index') }}">患者管理</a><span class="ider">&gt;</span>
    </li>
    <li>回访记录</li>
@endpush


@section('content')
        <div class="top"><h3 class="left"><span class="icon">į</span>回访记录</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                      url="{{ route('patients.index') }}" id="ref_url" title="返回" class="config"><span
                            class="icon">ĭ</span>返回</a></p></div>
        <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                             url="{{ route('patient-tracks.create', ['patient'=>$patient->id]) }}"><span
                            class="icon">ŷ</span>新增回访</a></h3></div>
        <div id="box" class="box">

            @include('patient.info')

            <table cellspacing="1" cellpadding="0">
                <thead>
                <tr>
                    <th width="120">
                        <center>回访时间</center>
                    </th>
                    <th width="*">内 容</th>
                    <th width="120">
                        <center>下次回访</center>
                    </th>
                    <th width="90">
                        <center>操作</center>
                    </th>
                    <th width="30">
                        <center>删</center>
                    </th>
                </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($tracks as $track)
                    <tr class="t1">
                        <td>
                            <center><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                       url="{{ route('patient-tracks.edit', ['patientTrack' =>$track->id]) }}" title="记录编辑">{{ $track->created_at->format('Y-m-d H:i') }}</a></center>
                        </td>
                        <td>{{ $track->content }}&nbsp;</td>
                        <td>
                            <center>{{ $track->next->format('Y-m-d H:i') }}</center>
                        </td>
                        <td>
                            <center>{{ $track->user->name }}</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del1" style="color:red"
                                       onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('reply.asp?act=del&amp;id=1','del1');}"><span
                                            class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/reply.asp?aid=1&amp;m=turn"></div>
@endsection
