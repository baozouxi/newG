<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0">
    <title>成都锦一医院-后台管理</title>
    <meta name="keywords" content="网络预约系统,医院管理系统,咨询预约系统,咨询预约系统,医患通">
    <meta name="description" content="医患通（EHIS），基于BS构架开发的适用于专科、门诊、医院、集团的HIS系统。">
    <link rel="apple-touch-icon-precomposed" href="http://cdn.ehis.cc/2.3/icon72x72@2x.png">
    <link type="text/css" href="{{ asset('css') }}/style.css" rel="stylesheet">
    <script src="{{ asset('js') }}/fun.js" type="text/javascript"></script>

    <link href="{{ asset('css') }}/tiny.css" rel="stylesheet" type="text/css">
</head>
<body><!--头部-->



<div id="header" class="header"><h1><a href="javascript:void(0);" hidefocus="" title="系统状态" onclick="msgbox(this);"
                                       url="index.asp?act=status">EHIS V2</a></h1>
    <div class="left">
        <ul>
            <li class="now"><a href="javascript:void(0);" hidefocus="" onclick="nav(0)"><p><span class="icon">ġ</span>
                    </p>
                    <p>功能</p></a></li>
            <li><a href="javascript:void(0);" hidefocus="" onclick="nav(1)"><p><span class="icon">ņ</span></p>
                    <p>设置</p></a></li>
            <li style="position:relative;">
                <a href="javascript:void(0);" hidefocus="">
                    <p><span class="iconfont">&#xe620;</span></p>
                    <p>{{ session('hospital.name') }}</p></a>
                {{--<ol>--}}
                    {{--<li><a href="">成双医院</a></li>--}}
                    {{--<li><a href="">成双医院</a></li>--}}
                    {{--<li><a href="">成双医院</a></li>--}}
                    {{--<li><a href="">成双医院</a></li>--}}
                    {{--<li><a href="">成双医院成双医院成双医院成双医院成双医院</a></li>--}}
                {{--</ol>--}}
            </li>
        </ul>
    </div>
    <div class="user right">
        <div class="face"><img src="http://api.ehis.cc/2.2/qq7424420.jpg" title="超级管理员"></div>
        <p class="name">医患通,欢迎你！</p>
        <p class="info"><a class="edit" href="javascript:void(0);" hidefocus="" url="user.asp?act=pass&amp;s=1"
                           onclick="getChange(0);fastH(this,'main');"><span class="icon">Ń</span></a><a class="power"
                                                                                                        href="javascript:void(0);"
                                                                                                        hidefocus=""
                                                                                                        url="user.asp?act=power&amp;s=1"
                                                                                                        onclick="getChange(0);fastH(this,'main');"><span
                        class="icon">Ķ</span></a><a class="site" href="javascript:void(0);" hidefocus=""
                                                    url="bind.asp?s=1" onclick="getChange(0);fastH(this,'main');"><span
                        class="icon">ŧ</span></a><a class="exit" href="{{ route('logout') }}"><span
                        class="icon">ş</span></a></p></div>
</div><!--左边-->
<div id="sidebar" class="sidebar" style="background-image: url(&quot;http://cdn.ehis.cc/2.3/weather/9.png&quot;);">
    <ul id="nav_0" class="now">
        <li><p><a id="a_turn" url="{{ route('patients.index') }}" href="javascript:void(0);" hidefocus=""
                  onclick="getChange(this);fastH(this,'main');sidebar(0);"><font id="now_turn"
                                                                                 style="display: none;">0</font><span
                            class="icon">Ķ</span>患者管理</a></p>
            <ol id="bar_0">
                <li><a url="{{ route('patient-tracks.index') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><font id="now_reply"
                                                                             style="display: none;">0</font><span
                                class="icon">į</span>回访记录</a></li>
                <li><a url="{{ route('expenses.index') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><font id="now_take"
                                                                             style="display: none;">0</font><span
                                class="icon">Đ</span>消费记录</a></li>
                <li><a url="{{ route('patient-report') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><span class="icon">Ő</span>患者报表</a></li>
                <li><a url="{{ route('patient-sta') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><span class="icon">ŏ</span>患者统计</a></li>
                <li><a url="{{ route('expenses-sta') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><span class="icon">Ľ</span>消费统计</a></li>
            </ol>
        </li>
        <li><p><a id="a_res" url="{{ route('appointments.index') }}" href="javascript:void(0);" hidefocus=""
                  onclick="getChange(this);fastH(this,'main');sidebar(1);"><font id="now_res"
                                                                                 style="display: none;">0</font><span
                            class="icon">Ĵ</span>预约管理</a></p>
            <ol id="bar_1">
                <li><a url="{{ route('appointment-tracks.index') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><font id="now_track"
                                                                             style="display: none;">0</font><span
                                class="icon">į</span>回访记录</a></li>
                <li><a url="{{ route('app-rep') }}" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><span class="icon">Ő</span>预约报表</a></li>
            </ol>
        </li>
        {{--<li><a id="a_cons" url="cons.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');"><font id="now_cons" style="display: none;">0</font><span--}}
        {{--class="icon">Ĳ</span>咨询记录</a></li>--}}
        {{--<li><a id="a_tel" url="tel.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');"><font id="now_tel" style="display: none;">0</font><span--}}
        {{--class="icon">ĕ</span>电话记录</a></li>--}}
        {{--<li><a id="a_call" url="call.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');"><font id="now_call" style="display: none;">0</font><span--}}
        {{--class="icon">Ĕ</span>回拨记录</a></li>--}}
        {{--<li><p><a url="dia.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');sidebar(2);"><span class="icon">İ</span>对话管理</a></p>--}}
        {{--<ol id="bar_2">--}}
        {{--<li><a url="stat_rep_dia.asp?s=1&amp;to=m" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this,1);fastH(this,'main');"><span class="icon">Ő</span>对话报表</a></li>--}}
        {{--<li><a url="stat_dia.asp?s=1&amp;to=m" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this,1);fastH(this,'main');"><span class="icon">ŏ</span>对话统计</a></li>--}}
        {{--</ol>--}}
        {{--</li>--}}
        {{--<li><p><a url="rank.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');sidebar(3);"><span class="icon">ő</span>竞价管理</a></p>--}}
        {{--<ol id="bar_3">--}}
        {{--<li><a url="stat_rep_rank.asp?s=1&amp;to=m" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this,1);fastH(this,'main');"><span class="icon">Ő</span>竞价报表</a></li>--}}
        {{--<li><a url="stat_rank.asp?s=1&amp;to=m" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this,1);fastH(this,'main');"><span class="icon">ŏ</span>竞价统计</a></li>--}}
        {{--</ol>--}}
        {{--</li>--}}
        {{--<li><a url="sms.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');"><span class="icon">ė</span>短信记录</a></li>--}}
        {{--<li><a url="file.asp?s=1" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,'main');"><span--}}
        {{--class="icon">ū</span>上传记录</a></li>--}}
        {{--<li><a url="log.asp?s=1" href="javascript:void(0);" hidefocus=""--}}
        {{--onclick="getChange(this);fastH(this,'main');"><span class="icon">Š</span>操作记录</a></li>--}}
    </ul>
    <ul id="nav_1">
        <li><a url="{{ route('illnesses.index') }}" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">Ĉ</span>病种管理</a></li>
        <li><a url="{{ route('doctors.index') }}" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">ō</span>医生管理</a></li>
        <li><a url="{{ route('ways.index') }}" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">Ń</span>途径管理</a></li>
        <li><a url="ads.asp?s=1" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">ě</span>媒介管理</a></li>
        <li><a url="website.asp?s=1" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">Ũ</span>站点管理</a></li>
        <li><a url="source.asp?s=1" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">Ě</span>来源管理</a></li>
        <li><a url="{{ route('hospital.index') }}" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="iconfont">&#xe63c;</span>医院管理</a></li>
        <li><p><a url="{{ route('user.index') }}" href="javascript:void(0);"
                  onclick="getChange(this);fastH(this,'main');sidebar(4);"><span class="icon">ĸ</span>用户管理</a></p>
            <ol id="bar_4">
                <li><a url="group.asp?s=1" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><span class="icon">ĵ</span>用户组管理</a></li>
                <li><a url="black.asp?s=1" href="javascript:void(0);" hidefocus=""
                       onclick="getChange(this,1);fastH(this,'main');"><span class="icon">Ĩ</span>黑名单管理</a></li>
            </ol>
        </li>
        <li><a url="code.asp?s=1" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,'main');"><span
                        class="icon">Ɔ</span>网站调用</a></li>
        <li><a url="setting.asp?s=1" href="javascript:void(0);" hidefocus=""
               onclick="getChange(this);fastH(this,'main');"><span class="icon">ņ</span>系统设置</a></li>
    </ul>
</div><!--右边-->
<div id="main" class="main"><!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                              url="main.asp?s=1">首页</a></li>
        </ul>
    </div>
    <div id="wrap" class="wrap"><!--整体内容-->
        <div id="container" class="container">
            <div class="top"><h3 class="left"><span class="icon">Ă</span>首页</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="msgbox(this);" title="任务设置"
                                          url="main.asp?act=think"><span class="icon">Ň</span>设置</a></p></div>
            <div id="box" class="box">
                <div class="user_main">
                    {{--<div class="user_take right"><p></p>--}}
                        {{--<center>—— 竞价成本 ——</center>--}}
                        {{--<p></p>--}}
                        {{--<p>竞价消费：0 元</p>--}}
                        {{--<p></p>--}}
                        {{--<p>预约成本：0 元</p>--}}
                        {{--<p></p>--}}
                        {{--<p>到诊成本：0 元</p>--}}
                        {{--<p></p></div>--}}
                    {{--<div class="user_all right"><p></p>--}}
                        {{--<center>—— 全体业绩 ——</center>--}}
                        {{--<p></p>--}}
                        {{--<p>预约：0 人</p>--}}
                        {{--<p></p>--}}
                        {{--<p>到诊：0 人</p>--}}
                        {{--<p></p>--}}
                        {{--<p>转换：0</p></div>--}}
                    <div class="user_info">
                        <div class="user_face left"><img src="http://api.ehis.cc/2.2/qq7424420.jpg" title="超级管理员"></div>
                        <p>你好，医患通</p>
                        <p></p>
                        <p id="this_main">用户权限：超级管理员</p>
                        <p>登录次数：<em>706</em>次，上次于<em>09-12 18:22</em>在<a href="javascript:void(0);"
                                                                         onclick="local('118.116.85.214');"
                                                                         title="电脑端:118.116.85.214"><em id="call_local">四川省成都市双流区电信</em></a>登陆成功
                        </p>
                        {{--<p>--}}
                            {{--<script>local('118.116.85.214');</script>--}}
                        {{--</p>--}}
                        {{--<p>今日任务：预约回访<a class="red" href="javascript:void(0);" onclick="$('a_res').click();">21</a>条，需要跟踪<a--}}
                                    {{--class="red" href="javascript:void(0);" onclick="$('a_res').click();">0</a>条，咨询回访<a--}}
                                    {{--class="red" href="javascript:void(0);" onclick="$('a_cons').click();">0</a>条，电话回访<a--}}
                                    {{--class="red" href="javascript:void(0);" onclick="$('a_tel').click();">0</a>条</p>--}}
                        {{--<p></p>--}}
                    </div>
                </div>
                {{--<div class="top_main" style="overflow:hidden;">--}}
                {{--<div class="left" style="width:33.3%;">--}}
                {{--<div class="top_title"><h3><span class="icon">İ</span>对话排行</h3></div>--}}
                {{--<ul></ul>--}}
                {{--</div>--}}
                {{--<div class="left" style="width:33.3%;">--}}
                {{--<div class="top_title"><h3><span class="icon">Ĵ</span>预约排行</h3></div>--}}
                {{--<ul></ul>--}}
                {{--</div>--}}
                {{--<div class="right" style="width:33.3%;">--}}
                {{--<div class="top_title" style="margin-right:0;"><h3><span class="icon">Ķ</span>到诊排行</h3></div>--}}
                {{--<ul style="margin-right:0;"></ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="top_main" style="margin:0;overflow:hidden;">--}}
                {{--<div class="left" style="width:33.3%;">--}}
                {{--<div class="top_title"><h3><span class="icon">Ĵ</span>预约今日</h3></div>--}}
                {{--<div class="list">--}}
                {{--<table cellspacing="1" cellpadding="0">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th width="60">--}}
                {{--<center>预约</center>--}}
                {{--</th>--}}
                {{--<th width="*">姓名</th>--}}
                {{--<th width="120">--}}
                {{--<center>病种</center>--}}
                {{--</th>--}}
                {{--<th width="80">--}}
                {{--<center>时间</center>--}}
                {{--</th>--}}
                {{--<th width="80">--}}
                {{--<center>录入</center>--}}
                {{--</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody id="tablebg">--}}
                {{--<tr class="t1">--}}
                {{--<td colspan="5">--}}
                {{--<center>无记录</center>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="left" style="width:33.3%;">--}}
                {{--<div class="top_title"><h3><span class="icon">Ĵ</span>今日预约</h3></div>--}}
                {{--<div class="list">--}}
                {{--<table cellspacing="1" cellpadding="0">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th width="60">--}}
                {{--<center>时间</center>--}}
                {{--</th>--}}
                {{--<th width="*">姓名</th>--}}
                {{--<th width="120">--}}
                {{--<center>途径</center>--}}
                {{--</th>--}}
                {{--<th width="80">--}}
                {{--<center>预约</center>--}}
                {{--</th>--}}
                {{--<th width="80">--}}
                {{--<center>录入</center>--}}
                {{--</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody id="tablebg">--}}
                {{--<tr class="t1">--}}
                {{--<td colspan="5">--}}
                {{--<center>无记录</center>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="right" style="width:33.3%;">--}}
                {{--<div class="top_title" style="margin-right:0;"><h3><span class="icon">Ķ</span>今日到诊</h3></div>--}}
                {{--<div class="list" style="margin-right:0;">--}}
                {{--<table cellspacing="1" cellpadding="0">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th width="60">--}}
                {{--<center>时间</center>--}}
                {{--</th>--}}
                {{--<th width="*">姓名</th>--}}
                {{--<th width="120">--}}
                {{--<center>病种</center>--}}
                {{--</th>--}}
                {{--<th width="80">--}}
                {{--<center>医生</center>--}}
                {{--</th>--}}
                {{--<th width="80">--}}
                {{--<center>录入</center>--}}
                {{--</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody id="tablebg">--}}
                {{--<tr class="t1">--}}
                {{--<td colspan="5">--}}
                {{--<center>无记录</center>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <input type="hidden" name="this_url" id="this_url" value="/main.asp"></div>
        </div>
    </div>
</div><!--底部-->
<div id="footer" class="footer">
    <div class="tips right"><span id="call_track"></span></div>
    <div class="copy"><a href="javascript:void(0);" onclick="weather();" title="刷新"><span class="icon"
                                                                                          style="color:#777;">ę</span></a>
        <span id="call_weather"><script>$('sidebar').style.backgroundImage = 'url("http://cdn.ehis.cc/2.3/weather/9.png")';</script><b>成都</b> 2017年09月13日 星期三 阴 09:05 温度：23℃，体感：22℃，湿度：86%，东北风2级，<b>舒适</b> ：建议着长袖T恤、衬衫加单裤等服装。年老体弱者宜着针织长袖衬衫、马甲和长裤。</span>
    </div>
</div>
{{--<script>window.setTimeout("now_tip()", 100);--}}
{{--if (exist('call_local')) {--}}
{{--window.setTimeout("$('call_local').click()", 150);--}}
{{--}--}}
{{--if (exist('call_weather')) {--}}
{{--window.setTimeout("weather()", 200);--}}
{{--}--}}
{{--if (exist('call_track')) {--}}
{{--window.setTimeout("track()", 250);--}}
{{--}--}}
{{--if (exist('this_user')) {--}}
{{--To('user.asp?act=pass');--}}
{{--}</script>--}}
{{--<script>if (exist('call_dbbak')) {--}}
{{--window.setTimeout("dbbak()", 100);--}}
{{--}</script>--}}
</body>
</html>