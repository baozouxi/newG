@extends($layout)


@push('guide')
    <li>预约报表</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ő</span>预约报表</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span
                        class="icon">Ş</span>快捷查找</a>
        </p></div>
    <div class="fun {{ $sent_month ? '' : ( $sent_user_id ? '' : 'none' ) }}" id="fun">
        <div id="fun-n" class="right block"></div>
        <select class="select"
                onchange="To('{{ route('app-rep') }}?month='+this.options[this.selectedIndex].value+'{{ $sent_user_id ? '&user_id='.$sent_user_id  : '' }}','main');">
            <option value="0">按月查询</option>
            @foreach($months as $month)
                <option value="{{ $month->month }}" {{ $month->month == $sent_month ? 'selected' : ''  }} >{{ $month->month }}月</option>
            @endforeach

        </select><select class="select"
                         onchange="To('{{ route('app-rep') }}?user_id='+this.options[this.selectedIndex].value+'{{ $sent_month ? '&month='.$sent_month : '' }}','main');">
            <option value="0" selected="selected">所有用户</option>
            @foreach($users as $user)
                <option value="{{ $user->id  }}" {{ $user->id == $sent_user_id ? 'selected' : ''  }} >{{ $user->name }}</option>
            @endforeach
        </select></div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="100">
                    <center>日期</center>
                </th>
                <th width="60">
                    <center>预约</center>
                </th>
                <th width="60">
                    <center>到诊</center>
                </th>

                <th width="*">到诊率/当日比</th>
            </tr>
            </thead>
            <tbody id="tablebg">
            <tr class="t1">
                <td>
                    <center><b><i>合 计</i></b></center>
                </td>
                <td>
                    <center><b><i>{{ $total->count }}</i></b></center>
                </td>
                <td>
                    <center><b><i>{{ $total->hospitald }}</i></b></center>
                </td>

                <td>
                    <div class="pers">
                        <div class="per"
                             style="width:{{ div($total->count, $total->hospitald)*100 < 10 ? '10' : div($total->count, $total->hospitald)*100}}%"
                             title="{{ div($total->count, $total->hospitald)*100 }}%"><span>{{ div($total->count, $total->hospitald)*100 }}
                                %</span></div>
                    </div>
                    {{--<div class="perts">--}}
                    {{--<div class="pert" style="width:100.0%" title="100%"><span class="persize">100%</span></div>--}}
                    {{--</div>--}}
                </td>
            </tr>

            @foreach($appointments as $date => $appointment)
                <tr class="t2">
                    <td>
                        <center><i>{{ $date }}</i></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" onclick="msgbox(this,800);"
                                   url="res.asp?m=stat&amp;mo=dateline&amp;ds=2017-09-19">{{ $appointment->count() }}</a>
                        </center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" onclick="msgbox(this,800);"
                                   url="res.asp?m=stat&amp;mo=todate&amp;ds=2017-09-19">{{ $hospitald =  $appointment->where('status', \App\Http\CommonRuleInterface::HOSPITALD)->count() }}</a>
                        </center>
                    </td>

                    <td>
                        <div class="pers">
                            <div class="per"
                                 style="width:{{ div($total->count, $hospitald)*100 < 10 ? '10' : div($total->count(), $hospitald)*100}}%"
                                 title="{{ div($total->count, $hospitald)*100 }}%"><span>{{ div($total->count, $hospitald)*100 }}
                                    %</span></div>
                        </div>
                        {{--<div class="perts">--}}
                        {{--<div class="pert" style="width:50.0%" title="50%"><span class="persize">50%</span></div>--}}
                        {{--</div>--}}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="/stat_rep_res.asp?to=m"></div>
@endsection