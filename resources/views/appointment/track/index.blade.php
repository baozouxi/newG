@extends($layout)


@push('guide')
    <li>回访列表</li>
@endpush


@section('content')
    <div class="top"><h3 class="left"><span class="icon">į</span>回访列表</h3>
        <p class="nlink right"></p></div>
    <div class="fun none" id="fun">
        <div id="fun-n" class="right"></div>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="120">
                    <center><a href="javascript:void(0);" url="track.asp?t=dateline&amp;go=desc" title="按回访时间排序"
                               onclick="fastH(this)">回访时间</a></center>
                </th>
                <th width="80">
                    <center><a href="javascript:void(0);" url="track.asp?t=aid&amp;go=desc" title="按姓名排序"
                               onclick="fastH(this)">姓名</a></center>
                </th>
                <th width="*"><a href="javascript:void(0);" url="track.asp?t=state&amp;go=desc" title="按内容排序"
                                 onclick="fastH(this)">内容</a></th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="track.asp?t=uid&amp;go=desc" title="按操作员排序"
                               onclick="fastH(this)">操作员</a></center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            @foreach($tracks as $track)
            <tr class="t1">
                <td>
                    <center>{{ $track->created_at->format('Y-m-d H:i') }}</center>
                </td>
                <td>
                    <center><a href="javascript:void(0);" title="“现在擦”的回访记录" onclick="msgbox(this,850);"
                               url="track.asp?aid=2">{{ $track->appointment->name }}</a></center>
                </td>
                <td>{{ $track->content }}&nbsp;</td>
                <td>
                    <center>{{ $track->user->name }}</center>
                </td>
            </tr>
            @endforeach
            <tr class="t1">
                <td colspan="4">&nbsp;&nbsp;记录:<i>1</i>条</td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="{{ route('appointment-tracks.index') }}"></div>
@endsection