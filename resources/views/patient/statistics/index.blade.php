@extends($layout)


@push('guide')
    <li>患者统计</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">ŏ</span>患者统计</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span
                        class="icon">Ş</span>快捷查找</a>
        </p></div>
    <div class="fun {{ $sent_month ? '' : 'none' }}" id="fun">
        {{--<div id="fun-n" class="right block">--}}
            {{--<form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_turn.asp?m=">--}}
                {{--<input name="ds" id="ds" class="inp" type="text" value=""--}}
                       {{--onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i--}}
                        {{--class="calendar icon">ğ</i><input name="de" id="de" class="inp" value=""--}}
                                                          {{--onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">--}}
                {{--<button type="submit" class="search"><span class="icon">ĺ</span></button>--}}
            {{--</form>--}}
        {{--</div>--}}
        <select class="select"
                onchange="To('{{ route('patient-sta') }}?month='+this.options[this.selectedIndex].value+'','main');">
            <option value="0">按月查询</option>
            @foreach($months as $month)
                <option value="{{ $month->month }}" {{$month->month == $sent_month ? 'selected' : '' }}  >{{ $month->month }}月</option>
            @endforeach
        </select></div>
    <div id="box" class="box">
        <div id="tab">
            <ul>
                <li onclick="fastT(0,1,0,'{{ $sent_month }}',0,0,0)" class="now">按录入</li>
                <li onclick="fastT(1,1,1,'{{ $sent_month }}',0,0,0)">按时段</li>
                <li onclick="fastT(2,1,2,'{{ $sent_month }}',0,0,0)">按日期</li>
                <li onclick="fastT(3,1,3,'{{ $sent_month }}',0,0,0)">按星期</li>
                <li onclick="fastT(4,1,4,'{{ $sent_month }}',0,0,0)">按月份</li>
                <li onclick="fastT(5,1,5,'{{ $sent_month }}',0,0,0)">按病种</li>
                <li onclick="fastT(6,1,6,'{{ $sent_month }}',0,0,0)">按医生</li>
                <li onclick="fastT(7,1,7,'{{ $sent_month }}',0,0,0)">按地区</li>
                <li onclick="fastT(8,1,8,'{{ $sent_month }}',0,0,0)">按途径</li>
                <li onclick="fastT(9,1,9,'{{ $sent_month }}',0,0,0)">按媒介</li>
                <li onclick="fastT(10,1,9,'{{ $sent_month }}',0,0,0)">按年龄</li>
                <li onclick="fastT(11,1,10,'{{ $sent_month }}',0,0,0)">按性别</li>
            </ul>
        </div>
        <div id="tablist">
            @include('patient.statistics.table')
        </div>
        <input type="hidden" name="this_url" id="this_url" value="/stat_turn.asp?to=m"></div>
@endsection