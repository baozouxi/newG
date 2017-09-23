@extends($layout)


@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');"
           url="{{ route('patients.index') }}">患者管理</a><span class="ider">&gt;</span>
    </li>
    <li>消费列表</li>
@endpush




@section('content')
    <div class="top"><h3 class="left"><span class="icon">Đ</span>消费记录</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                  url="turn.asp?s=1&amp;m=turn" class="config"><span class="icon">ĭ</span>返回</a></p>
    </div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                         url="{{ route('expenses.create', ['patient'=>$patient->id]) }}"><span
                        class="icon">ŷ</span>新增消费</a></h3></div>
    <div id="box" class="box">

        @include('patient.info')

        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="120">
                    <center>时间</center>
                </th>
                <th width="70">
                    <center>医生</center>
                </th>
                <th width="70">
                    <center>药量</center>
                </th>
                <th width="70">
                    <center>检查</center>
                </th>
                <th width="70">
                    <center>药品</center>
                </th>
                <th width="70">
                    <center>治疗</center>
                </th>
                <th width="70">
                    <center>住院</center>
                </th>
                <th width="70">
                    <center>总额</center>
                </th>
                <th width="*">备注</th>
                <th width="90">
                    <center>操作</center>
                </th>
                <th width="30">
                    <center>删</center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            @foreach($expenses as $expense)
                <tr>
                    <td>
                        <center><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                   url="{{ route('expenses.edit', ['expense' => $expense->id]) }}"
                                   title="记录编辑">{{ $expense->created_at->format('Y-m-d H:s') }}</a></center>
                    </td>
                    <td>
                        <center><i>赵中献</i></center>
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
                        <center>{{ $expense->check_price + $expense->drug_price + $expense->cure_price + $expense->hospital_price }}</center>
                    </td>
                    <td>{{ $expense->content }}&nbsp;</td>
                    <td>
                        <center>{{ $expense->user->name }}</center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" id="del1" style="color:red"
                                   onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('take.asp?act=del&amp;id=1','del1');}"><span
                                        class="icon"><em>ź</em></span></a></center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value=""></div>
@endsection