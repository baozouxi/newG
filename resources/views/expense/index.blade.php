@extends($layout)

@push('guide')
    <li>消费列表</li>
@endpush

@push('button')
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this);set_title('今日消费');" url="{{ route('expenses.index', ['created_at' => \Carbon\Carbon::now()->format('Y-m-d')]) }}"
                              class="sms"><span class="icon">ğ</span>今日消费</a></p>
@endpush


@section('content')
    <div class="top"><h3 class="left"><span class="icon">Đ</span>消费列表</h3>
        <p class="nlink right"></p></div>
    <div class="fun none" id="fun">
        <div id="fun-n" class="right"></div>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="120">
                    <center><a href="javascript:void(0);" url="take.asp?t=dateline&amp;go=desc" title="按时间排序"
                               onclick="fastH(this)">时间</a></center>
                </th>
                <th width="80">
                    <center><a href="javascript:void(0);" url="take.asp?t=aid&amp;go=desc" title="按姓名排序"
                               onclick="fastH(this)">姓名</a></center>
                </th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=cycle&amp;go=desc" title="按药量排序"
                               onclick="fastH(this)">药量</a></center>
                </th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=find&amp;go=desc" title="按检查排序"
                               onclick="fastH(this)">检查</a></center>
                </th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=drug&amp;go=desc" title="按药品排序"
                               onclick="fastH(this)">药品</a></center>
                </th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=cure&amp;go=desc" title="按治疗排序"
                               onclick="fastH(this)">治疗</a></center>
                </th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=hos&amp;go=desc" title="按住院排序"
                               onclick="fastH(this)">住院</a></center>
                </th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=money&amp;go=desc" title="按总额排序"
                               onclick="fastH(this)">总额</a></center>
                </th>
                <th width="*">备注</th>
                <th width="70">
                    <center><a href="javascript:void(0);" url="take.asp?t=dep&amp;go=desc" title="按医生排序"
                               onclick="fastH(this)">医生</a></center>
                </th>
                <th width="90">
                    <center><a href="javascript:void(0);" url="take.asp?t=uid&amp;go=desc" title="按操作员排序"
                               onclick="fastH(this)">操作员</a></center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            @foreach($expenses as $expense)
                <tr>
                    <td>
                        <center>{{ $expense->created_at->format('Y-m-d H:i') }}</center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" title="“咨询擦”的消费记录" onclick="msgbox(this,850);"
                                   url="take.asp?aid=1">{{ $expense->patient->name }}</a></center>
                    </td>
                    <td>
                        <center>{{ $expense->dose }}</center>
                    </td>
                    <td>
                        <center>{{ $expense->check_price }}</center>
                    </td>
                    <td>
                        <center>{{ $expense->drug_price }}</center>
                    </td>
                    <td>
                        <center>{{ $expense->cure_price }}</center>
                    </td>
                    <td>
                        <center>{{ $expense->hospital_price }}</center>
                    </td>
                    <td>
                        <center>{{  $expense->check_price + $expense->drug_price +  $expense->cure_price + $expense->hospital_price }}</center>
                    </td>
                    <td>{{ $expense->content }}&nbsp;</td>
                    <td>
                        <center>赵中献</center>
                    </td>
                    <td>
                        <center>{{ $expense->user->name }}</center>
                    </td>
                </tr>
            @endforeach
            <tr class="t1">
                <td colspan="11">&nbsp;&nbsp;记录:<i>1</i>条</td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="/take.asp"></div>
@endsection