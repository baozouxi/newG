@extends($layout)

@push('guide')
    <li>患者报表</li>
@endpush


@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ő</span>患者报表</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span
                        class="icon">Ş</span>快捷查找</a>
        </p></div>
    <div class="fun {{ ($sent_month || $sent_doctor_id) ? '': 'none' }}" id="fun">
        <div id="fun-n" class="right block"></div>
        <select class="select"
                onchange="To('{{ route('patient-report') }}?month='+this.options[this.selectedIndex].value+' {{ $sent_doctor_id ? '&amp;doctor_id='.$sent_doctor_id : ''  }} ','main');">
            <option value="0">按月查询</option>
            @foreach($months as $month)
                @if($month->month == $sent_month)
                    <option value="{{ $month->month }}" selected>{{ $month->month }}</option>
                @else
                    <option value="{{ $month->month }}">{{ $month->month }}</option>
                @endif
            @endforeach
        </select>
        <select class="select"
                onchange="To('{{ route('patient-report') }}?doctor_id='+this.options[this.selectedIndex].value+' {{ $sent_month ?  '&amp;month='.$sent_month   : '' }}  ','main');">
            <option value="0" selected="selected">所有医生</option>
            @foreach($doctors as $doctor)
                @if($doctor->id == $sent_doctor_id)
                    <option value="{{ $doctor->id }}" selected>{{ $doctor->name }}</option>
                @else
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endif
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
                    <center>到诊</center>
                </th>
                <th width="60">
                    <center>网络</center>
                </th>
                <th width="60">
                    <center>其它</center>
                </th>
                <th width="*">网约比</th>
            </tr>
            </thead>
            <tbody id="tablebg">
            <tr>
                <td>
                    <center><b><i>合 计</i></b></center>
                </td>
                <td>
                    <center><b><i>{{ $total->count }}</i></b></center>
                </td>
                <td>
                    <center><b><i>{{ $total->book_count }}</i></b></center>
                </td>
                <td>
                    <center><b><i>{{ $total->un_book_count  }}</i></b></center>
                </td>
                <td>
                    <div class="perws">
                        <div class="perw"
                             style="width:{{ div($total->book_count, $total->count)*100 < 10 ? '10' : div($total->book_count, $total->count)*100  }}%"
                             title="{{  div($total->book_count, $total->count)*100 }}%">{{  div($total->book_count, $total->count)*100 }}
                            %
                        </div>
                    </div>
                </td>
            </tr>

            @foreach($patients as $date => $patient)
                <tr>
                    <td>
                        <center><i>{{ $date }}</i></center>
                    </td>
                    <td>
                        <center><a href="javascript:void(0);" onclick="msgbox(this,800);"
                                   url="turn.asp?m=stat&amp;mo=dateline&amp;ds=2017-09-15">{{ $patient->count() }}</a>
                        </center>
                    </td>
                    <td>
                        <center><em>{{ $book_count = $patient->where('book_id', '!=', '0')->count() }}</em></center>
                    </td>
                    <td>
                        <center><i>{{ $patient->where('book_id', '0')->count() }}</i></center>
                    </td>
                    <td>
                        <div class="perws">
                            <div class="perw"
                                 style="width:{{ div($book_count, $total->count)*100 < 10 ? '10' : div($book_count, $total->count)*100  }}%; title="
                                 {{ div($book_count, $total->count)*100 }}%
                            ">{{ div($book_count, $total->count)*100 }}%
                        </div>
    </div>
    </td>
    </tr>
    @endforeach

    </tbody>
    </table>
    <input type="hidden" name="this_url" id="this_url" value="/stat_rep_turn.asp?to=m"></div>
@endsection