@extends($layout)


@push('guide')
    <li>患者管理</li>
@endpush


@push('button')

    <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this);set_title('预约库存');"
                              url="res.asp?n=13&amp;m=turn" class="sms"><span class="icon">ğ</span>预约库存</a><a
                href="javascript:void(0);" onclick="fastH(this);set_title('预约明日');" url="res.asp?n=8&amp;m=turn"
                class="sms"><span class="icon">ĝ</span>预约明日</a><a href="javascript:void(0);"
                                                                  onclick="fastH(this);set_title('预约今日');"
                                                                  url="res.asp?n=6&amp;m=turn" class="sms"><span
                    class="icon">Ğ</span>预约今日</a></p>
@endpush




@section('content')
    <div class="top"><h3 class="left"><span class="icon">Ĵ</span>预约列表</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a><a
                    href="javascript:void(0);" title="显示表格" onclick="msgbox(this,600);" url="user.asp?act=res"
                    class="config"><span class="icon">ƅ</span>设置</a><a href="javascript:void(0);" title="导出电子表格"
                                                                       onclick="msgbox(this);"
                                                                       url="res.asp?act=excel" class="excel"><span
                        class="icon">Ľ</span>导出</a></p></div>
    <div class="fun">
        <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('appointments.create') }}"><span class="icon">ŷ</span>新增预约</a></h3>
        <div id="fun-s" class="fun-s right block">
            <form name="form_key" id="form_key" onsubmit="return(fastK(this,'key'));" action="res.asp?m=res"><input
                        class="inp" id="key" name="key">
                <button type="submit" class="search"><span class="icon">ĺ</span></button>
            </form>
        </div>
        <div id="fun-n" class="right none">
            <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="res.asp?m=res"><input
                        type="hidden" id="mo" name="mo" value="postdate"><input name="ds" id="ds" class="inp"
                                                                                type="text" value=""
                                                                                onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-{%M+1}-%d\'}'})"><i
                        class="calendar icon">ğ</i><input name="de" id="de" class="inp" value=""
                                                          onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-{%M+1}-%d'})">
                <button type="submit" class="search"><span class="icon">ĺ</span></button>
            </form>
            <select class="select"
                    onchange="To('res.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'&amp;m=res','main');">
                <option value="0">按月查询</option>
                <option value="2017-9">2017年9月</option>
            </select></div>
    </div>
    <div id="box" class="box">
        <table cellspacing="1" cellpadding="0">
            <thead>
            <tr>
                <th width="50">
                    <center><a href="javascript:void(0);" url="res.asp?t=id&amp;go=desc&amp;m=res" title="按编号排序"
                               onclick="fastH(this)">编号</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="res.asp?t=dateline&amp;go=desc&amp;m=res"
                               title="按时间排序" onclick="fastH(this)">时间</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="res.asp?t=key&amp;go=desc&amp;m=res" title="按预约号排序"
                               onclick="fastH(this)">预约号</a></center>
                </th>
                <th width="80">
                    <center>属性</center>
                </th>
                <th width="*"><a href="javascript:void(0);" url="res.asp?t=bid&amp;go=desc&amp;m=res" title="按姓名排序"
                                 onclick="fastH(this)">姓名</a></th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="res.asp?t=file&amp;go=desc&amp;m=res" title="按附件排序"
                               onclick="fastH(this)">附件</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="res.asp?t=gender&amp;go=desc&amp;m=res" title="按性别排序"
                               onclick="fastH(this)">性别</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="res.asp?t=age&amp;go=desc&amp;m=res" title="按年龄排序"
                               onclick="fastH(this)">年龄</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="res.asp?t=phone&amp;go=desc&amp;m=res" title="按手机排序"
                               onclick="fastH(this)">手机</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="res.asp?t=qq&amp;go=desc&amp;m=res" title="按QQ排序"
                               onclick="fastH(this)">QQ</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="res.asp?t=weixin&amp;go=desc&amp;m=res" title="按微信排序"
                               onclick="fastH(this)">微信</a></center>
                </th>
                <th width="140">
                    <center><a href="javascript:void(0);" url="res.asp?t=local&amp;go=desc&amp;m=res" title="按地域排序"
                               onclick="fastH(this)">地域</a></center>
                </th>
                <th width="100">
                    <center>科室</center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="res.asp?t=dis&amp;go=desc&amp;m=res" title="按病种排序"
                               onclick="fastH(this)">病种</a></center>
                </th>
                <th width="110">
                    <center><a href="javascript:void(0);" url="res.asp?t=dep&amp;go=desc&amp;m=res" title="按医生排序"
                               onclick="fastH(this)">医生</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="res.asp?t=way&amp;go=desc&amp;m=res" title="按途径排序"
                               onclick="fastH(this)">途径</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="res.asp?t=keyword&amp;go=desc&amp;m=res"
                               title="按关键字排序" onclick="fastH(this)">关键字</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="res.asp?t=website&amp;go=desc&amp;m=res"
                               title="按来源网站排序" onclick="fastH(this)">来源网站</a></center>
                </th>
                <th width="120">
                    <center><a href="javascript:void(0);" url="res.asp?t=source&amp;go=desc&amp;m=res"
                               title="按来源信息排序" onclick="fastH(this)">来源信息</a></center>
                </th>
                <th width="100">
                    <center><a href="javascript:void(0);" url="res.asp?t=postdate&amp;go=desc&amp;m=res"
                               title="按预约到诊排序" onclick="fastH(this)">预约到诊</a></center>
                </th>
                <th width="50">
                    <center><a href="javascript:void(0);" url="res.asp?t=t_count&amp;go=desc&amp;m=res"
                               title="按回访排序" onclick="fastH(this)">回访</a></center>
                </th>
                <th width="110">
                    <center><a href="javascript:void(0);" url="res.asp?t=t_date&amp;go=desc&amp;m=res"
                               title="按回访时间排序" onclick="fastH(this)">回访时间</a></center>
                </th>
                <th width="110">
                    <center><a href="javascript:void(0);" url="res.asp?t=uid&amp;go=desc&amp;m=res" title="按录入员排序"
                               onclick="fastH(this)">录入员</a></center>
                </th>
                <th width="30">
                    <center>删</center>
                </th>
            </tr>
            </thead>
            <tbody id="tablebg">
            <tr class="t1">
                <td>
                    <center>2</center>
                </td>
                <td>
                    <center>2017-09-23 17:01</center>
                </td>
                <td>
                    <center>1001</center>
                </td>
                <td>
                    <center><u class="icon">ű 未到诊</u></center>
                </td>
                <td><span title="“现在擦”的详细资料" onclick="msgbox(this,600);" url="res.asp?act=show&amp;id=2"
                          style="cursor:pointer;" class="icon">Ĵ</span> <a href="javascript:void(0);"
                                                                           onclick="fastH(this,'main')"
                                                                           url="res.asp?act=add&amp;s=1&amp;id=2&amp;m=res"><u>现在擦</u></a>
                </td>
                <td>
                    <center class="file">
                        <center><span>-</span></center>
                    </center>
                </td>
                <td>
                    <center><u>男</u></center>
                </td>
                <td>
                    <center>13</center>
                </td>
                <td>
                    <center>132****5551</center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
                <td>
                    <center>北京市西城区</center>
                </td>
                <td>
                    <center>肾病</center>
                </td>
                <td>
                    <center>肾病综合征</center>
                </td>
                <td>
                    <center>杨惠标</center>
                </td>
                <td>
                    <center>PC商务通</center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
                <td>
                    <center>0</center>
                </td>
                <td>
                    <center>0</center>
                </td>
                <td>
                    <center>10-18 17:00</center>
                </td>
                <td>
                    <center>0</center>
                </td>
                <td>
                    <center><span><span>没有记录</span></span></center>
                </td>
                <td>
                    <center>医嘱</center>
                </td>
                <td>
                    <center><a href="javascript:void(0);" id="del2"
                               onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('res.asp?act=del&amp;id=2','del2');}"><span
                                    class="icon"><em>ź</em></span></a></center>
                </td>
            </tr>
            <tr class="t2">
                <td>
                    <center>1</center>
                </td>
                <td>
                    <center>2017-09-19 14:43</center>
                </td>
                <td>
                    <center>1000</center>
                </td>
                <td>
                    <center><i class="icon">Ű 已到诊</i></center>
                </td>
                <td><span title="“阿萨”的详细资料" onclick="msgbox(this,600);" url="res.asp?act=show&amp;id=1"
                          style="cursor:pointer;" class="icon">Ĵ</span> <a href="javascript:void(0);"
                                                                           onclick="fastH(this,'main')"
                                                                           url="res.asp?act=add&amp;s=1&amp;id=1&amp;m=res"><i>阿萨</i></a>
                </td>
                <td>
                    <center class="file">
                        <center><span>-</span></center>
                    </center>
                </td>
                <td>
                    <center><u>男</u></center>
                </td>
                <td>
                    <center>13</center>
                </td>
                <td>
                    <center>13228595558</center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
                <td>
                    <center>北京市西城区</center>
                </td>
                <td>
                    <center>肾病</center>
                </td>
                <td>
                    <center>肾病综合征</center>
                </td>
                <td>
                    <center><em>*</em>赵中献</center>
                </td>
                <td>
                    <center>PC商务通</center>
                </td>
                <td>
                    <center><span>-</span></center>
                </td>
                <td>
                    <center>0</center>
                </td>
                <td>
                    <center>0</center>
                </td>
                <td>
                    <center><i>09-19 14:44</i></center>
                </td>
                <td>
                    <center>0</center>
                </td>
                <td>
                    <center><span><span>没有记录</span></span></center>
                </td>
                <td>
                    <center>医嘱(<i>陈国营</i>)</center>
                </td>
                <td>
                    <center><a href="javascript:void(0);" id="del1"
                               onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('res.asp?act=del&amp;id=1','del1');}"><span
                                    class="icon"><em>ź</em></span></a></center>
                </td>
            </tr>
            <tr class="t1">
                <td colspan="24">&nbsp;&nbsp;记录:<i>2</i>条</td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="this_url" id="this_url" value="/res.asp?m=res"></div>
@endsection