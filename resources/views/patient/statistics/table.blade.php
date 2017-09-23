<table cellspacing="1" cellpadding="0">
    <thead>
    <tr>
        <th width="220">
            <center>项 目 名 称</center>
        </th>
        <th width="70">
            <center>就诊人数</center>
        </th>
        <th width="*">占有率</th>
    </tr>
    </thead>
    <tbody id="tablebg">
    <tr class="t1">
        <td>
            <center><b><i>合 计</i></b></center>
        </td>
        <td>
            <center><b><i>{{ $total }}</i></b></center>
        </td>
        <td>&nbsp;</td>
    </tr>

    @foreach($patients as $field => $patient)
        <tr class="t2">
            <td>
                <center><a href="javascript:void(0);" onclick="fastC(this,'uid2');"
                           url="stat_turn.asp?act=stat_s_uid&amp;aid=2&amp;to=m"><i>{{ $field }}</i> </a><a
                            href="javascript:void(0);" onclick="msgbox(this,850);"
                            url="turn.asp?m=stat&amp;o=uid&amp;aid=2&amp;to=m" title="医嘱详细列表">[详]</a>
                </center>
            </td>
            <td>
                <center>{{ $count = $patient->count() }}</center>
            </td>
            <td>
                <div class="perws">
                    <div class="perw" style="width:{{ div($count,$total)*100 < 10 ? '10' : div($count,$total)*100 }}%" title="{{ div($count,$total)*100 }}%">{{ div($count,$total)*100 }}%</div>
                </div>
            </td>
        </tr>
        <tr id="_infouid2" style="display:none;" class="t1">
            <td colspan="3" id="infouid2"></td>
        </tr>
    @endforeach

    </tbody>
</table>