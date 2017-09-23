@extends($layout)

@push('guide')
    <li>患者管理</li>
@endpush


@push('button')
    <p class="nlink right">
        <a href="javascript:void(0);" onclick="fastH(this);set_title('需要跟踪');"
           url="turn.asp?n=2&amp;m=turn" class="call"><span class="icon">Ę</span>需要跟踪</a>
        <a href="javascript:void(0);" onclick="fastH(this);set_title('到期回访');"
           url="{{ route('patients.index', ['status' => '1'])  }}"
           class="sms"><span class="icon">ĝ</span>到期回访</a>
        <a href="javascript:void(0);"
           onclick="fastH(this,'main');set_title('今日到诊');"
           url="{{ route('patients.index', ['created_at'=>\Carbon\Carbon::now()->toDateString()]) }}" class="sms"><span
                    class="icon">Ğ</span>今日到诊</a></p>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ķ</span>患者列表</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a><a
                    href="javascript:void(0);" title="显示表格" onclick="msgbox(this,600);" url="user.asp?act=turn"
                    class="config"><span class="icon">Ƅ</span>设置</a><a href="javascript:void(0);" title="导出电子表格"
                                                                       onclick="msgbox(this);"
                                                                       url="turn.asp?act=excel" class="excel"><span
                        class="icon">Ľ</span>导出</a></p></div>
    <div class="fun"><h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                         url="{{ route('patients.create') }}"><span
                        class="icon">ŷ</span>新增患者</a></h3>
        <div id="fun-s" class="fun-s right block">
            <form name="form_key" id="form_key" onsubmit="return(fastK(this,'key'));" action="turn.asp?m=turn">
                <input class="inp" id="key" name="key">
                <button type="submit" class="search"><span class="icon">ĺ</span></button>
            </form>
        </div>
        <div id="fun-n" class="right none">
            <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="turn.asp?m=turn">
                <input name="ds" id="ds" class="inp" type="text" value=""
                       onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i
                        class="calendar icon">ğ</i><input name="de" id="de" class="inp" value=""
                                                          onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                <button type="submit" class="search"><span class="icon">ĺ</span></button>
            </form>
            <select class="select"
                    onchange="To('turn.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'&amp;m=turn','main');">
                <option value="0">按月查询</option>
                <option value="2017-9">2017年9月</option>
            </select></div>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="50">
                    <center><a href="javascript:void(0);" url="turn.asp?t=id&amp;go=desc&amp;m=turn" title="按编号排序"
                               onclick="fastH(this)">编号</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="turn.asp?t=dateline&amp;go=desc&amp;m=turn"
                               title="按时间排序" onclick="fastH(this)">时间</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="turn.asp?t=bid&amp;go=desc&amp;m=turn" title="按病历号排序"
                               onclick="fastH(this)">病历号</a></center>
                </th>
                <th width="*"><a href="javascript:void(0);" url="turn.asp?t=name&amp;go=desc&amp;m=turn"
                                 title="按姓名排序" onclick="fastH(this)">姓名</a></th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="turn.asp?t=gender&amp;go=desc&amp;m=turn"
                               title="按性别排序" onclick="fastH(this)">性别</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="turn.asp?t=age&amp;go=desc&amp;m=turn" title="按年龄排序"
                               onclick="fastH(this)">年龄</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="turn.asp?t=phone&amp;go=desc&amp;m=turn"
                               title="按手机排序" onclick="fastH(this)">手机</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="turn.asp?t=mete&amp;go=desc&amp;m=turn" title="按就诊排序"
                               onclick="fastH(this)">就诊</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="turn.asp?t=cycle&amp;go=desc&amp;m=turn"
                               title="按周期排序" onclick="fastH(this)">周期</a></center>
                </th>
                <th width="80">
                    <center><a href="javascript:void(0);" url="turn.asp?t=money&amp;go=desc&amp;m=turn"
                               title="按消费排序" onclick="fastH(this)">消费</a></center>
                </th>
                <th width="140">
                    <center><a href="javascript:void(0);" url="turn.asp?t=local&amp;go=desc&amp;m=turn"
                               title="按地区排序" onclick="fastH(this)">地区</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="turn.asp?t=ads&amp;go=desc&amp;m=turn" title="按媒介排序"
                               onclick="fastH(this)">媒介</a></center>
                </th>
                <th width="100">
                    <center>科室</center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="turn.asp?t=dis&amp;go=desc&amp;m=turn" title="按病种排序"
                               onclick="fastH(this)">病种</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="turn.asp?t=dep&amp;go=desc&amp;m=turn" title="按医生排序"
                               onclick="fastH(this)">医生</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="turn.asp?t=postdate&amp;go=desc&amp;m=turn"
                               title="按回访时间排序" onclick="fastH(this)">回访时间</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="turn.asp?t=uid&amp;go=desc&amp;m=turn" title="按操作员排序"
                               onclick="fastH(this)">操作员</a></center>
                </th>
                <th width="30">
                    <center>删</center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            @foreach($patients as $patient)
                <tr class="t1">
                    <td>
                        <center>{{ $patient->id }}</center>
                    </td>
                    <td>
                        <center>{{ $patient->created_at->format('Y-m-d H:i') }}</center>
                    </td>
                    <td>
                        <center>{{ $patient->medical_num }}</center>
                    </td>
                    <td><span title="“{{ $patient->name }}”的详细资料" onclick="msgbox(this,600);"
                              url="turn.asp?act=show&amp;id=1"
                              style="cursor:pointer;" class="icon">Ĵ</span> <a href="javascript:void(0);"
                                                                               onclick="fastH(this,'main')"
                                                                               url="turn.asp?act=add&amp;s=1&amp;id=1&amp;m=turn"><u>{{ $patient->name }}</u></a>
                    </td>
                    <td>
                        <center><u>{{ $patient->gender == App\Http\CommonRuleInterface::MALE ? '男' : '女' }}</u></center>
                    </td>
                    <td>
                        <center>{{ $patient->age }}</center>
                    </td>
                    <td>
                        <center>{{ $patient->phone }}</center>
                    </td>
                    <td>
                        <center>0</center>
                    </td>
                    <td>
                        <center>0</center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                   url="{{ route('expenseWithPatientInfo', ['patient'=>$patient->id]) }}">

                                {{ $patient->expenses->sum(function($item){
                                    return $item->drug_price + $item->check_price + $item->cure_price + $item->hospital_price;
                                }) }}
                            </a></center>
                    </td>
                    <td>
                        <center>{{ area($patient->province, $patient->city,$patient->town)['city'] }}{{ area($patient->province, $patient->city,$patient->town)['town'] }}</center>
                    </td>
                    <td>
                        <center>电视广告</center>
                    </td>
                    <td>
                        <center>{{ $patient->illness->name }}</center>
                    </td>
                    <td>
                        <center>{{ $patient->illness->name }}</center>
                    </td>
                    <td>
                        <center><u>赵中献</u></center>
                    </td>
                    <td>
                        <center>
                            <a href="javascript:void(0);" onclick="fastH(this,'main')"
                               url="{{ route('trackWithPatientInfo', ['patient_id' => $patient->id])  }}">
                                @if(!$patient->tracks->isEmpty())
                                    {{ $patient->tracks->first()->next->format('m-d H:i') }}
                                    ({{ $patient->tracks->count() }})
                                @else
                                    暂无回访
                                @endif
                            </a>
                        </center>
                    </td>
                    <td>
                        <center>{{ $patient->user->name }}</center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" id="del1"
                                   onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('turn.asp?act=del&amp;id=1','del1');}"><span
                                        class="icon"><em>ź</em></span></a></center>
                    </td>
                </tr>
            @endforeach
            {{ $patients->links() }}
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="{{ route('patients.index') }}"></div>
@endsection
