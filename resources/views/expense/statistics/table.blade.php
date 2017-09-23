<table cellspacing="1" cellpadding="0">
    <thead>
    <tr>
        <th width="160">
            <center>项目名称</center>
        </th>
        <th width="30">
            <center>到诊</center>
        </th>
        <th width="30">
            <center>检查</center>
        </th>
        <th width="35">
            <center>消费</center>
        </th>
        <th width="50">
            <center>人均</center>
        </th>
        <th width="30">
            <center>就诊</center>
        </th>
        <th width="60">
            <center>就诊率</center>
        </th>
        <th width="65">
            <center>消费</center>
        </th>
        <th width="60">
            <center>就诊人均</center>
        </th>
        <th width="60">
            <center>到诊人均</center>
        </th>
        <th width="30">
            <center>复诊</center>
        </th>
        <th width="60">
            <center>复诊率</center>
        </th>
        <th width="65">
            <center>消费</center>
        </th>
        <th width="60">
            <center>复诊人均</center>
        </th>
        <th width="75">
            <center>总消费</center>
        </th>
        <th width="60">
            <center>到诊人均</center>
        </th>
        <th width="60">
            <center>就诊人均</center>
        </th>

        <th width="*"></th>
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
            <center><b><i>{{ $total->check_count }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ $total->check_price }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->check_price, $total->check_count) }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ $total->hospital_count }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->hospital_count, $total->count, 4)*100 }}%</i></b></center>
        </td>
        <td>
            <center><b><i>{{ $total->sum }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->sum, $total->hospital_count,1) }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->sum, $total->count, 1) }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ $total->re_hospital_count }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->re_hospital_count, $total->hospital_count, 1)*100 }}%</i></b>
            </center>
        </td>
        <td>
            <center><b><i>{{ $total->re_hospital_sum }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->re_hospital_sum, $total->re_hospital_count, 1) }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ $total->sum }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->sum, $total->count, 1) }}</i></b></center>
        </td>
        <td>
            <center><b><i>{{ div($total->sum, $total->hospital_count, 1) }}</i></b></center>
        </td>

        <td></td>
    </tr>
    @foreach($patients as $field => $patient)
        <tr>
            <td>
                <center><i>{{ $field }}</i> <a href="javascript:void(0);" onclick="msgbox(this,800);"
                                               url="turn.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m"
                                               title="陈国营详细列表">[详]</a></center>
            </td>
            <td>
                <center>{{ $patient->count }}</center>
            </td>
            <td>
                <center><i>{{ $patient->check_count }}</i></center>
            </td>
            <td>
                <center>{{ $patient->check_price }}</center>
            </td>
            <td>
                <center>{{ div($patient->check_price, $patient->check_count, 1) }}</center>
            </td>
            <td>
                <center><i>{{ $patient->hospital_count }}</i></center>
            </td>
            <td>
                <center>{{ div($patient->hospital_count, $patient->count, 4)*100 }}%</center>
            </td>
            <td>
                <center>{{ $patient->sum }}</center>
            </td>
            <td>
                <center>{{ div($patient->sum, $patient->hospital_count, 1) }}</center>
            </td>
            <td>
                <center>{{ div($patient->sum, $patient->count, 1) }}</center>
            </td>
            <td>
                <center><i>{{ $patient->re_hospital_count }}</i></center>
            </td>
            <td>
                <center>{{ div($patient->re_hospital_count, $patient->hospital_count, 4)*100 }}%</center>
            </td>
            <td>
                <center>{{ $patient->re_hospital_sum }}</center>
            </td>
            <td>
                <center>{{ div($patient->re_hospital_sum, $patient->re_hospital_count, 1) }}</center>
            </td>
            <td>
                <center><i>{{ $patient->sum }}</i></center>
            </td>
            <td>
                <center>{{ div($patient->sum, $patient->count, 1) }}</center>
            </td>
            <td>
                <center><i>{{ div($patient->sum, $patient->hospital_count, 1) }}</i></center>
            </td>

            <td></td>
        </tr>
    @endforeach

    </tbody>
</table>