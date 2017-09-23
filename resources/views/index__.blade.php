<!DOCTYPE html>
<!-- saved from url=(0028)http://test.ehis.cc/main.asp -->
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

<body>
    <!--头部-->

    <div id="header" class="header">
        <h1><a href="javascript:void(0);" hidefocus="" title="系统状态" onclick="msgbox(this);" url="index.asp?act=status">EHIS V2</a></h1>
        <div class="left">
            <ul>
                <li class="now">
                    <a href="javascript:void(0);" hidefocus="" onclick="nav(0)">
                        <p><span class="icon">ġ</span></p>
                        <p>功能</p>
                    </a>
                </li>
                @if(check_node('setting'))
                    <li>
                        <a href="javascript:void(0);" hidefocus="" onclick="nav(1)">
                            <p><span class="icon">ņ</span></p>
                            <p>设置</p>
                        </a>
                    </li>
                @endif
                
            </ul>
        </div>
        <div class="user right">
            <div class="face"><img src="{{ getIcon() }}" title="超级管理员"></div>
            <p class="name">{{ session('name')  }},欢迎你！</p>
            <p class="info"><a class="edit" href="javascript:void(0);" hidefocus="" url="{{ route('user.edit',['id'=>session('user_id')]) }}" onclick="getChange(0);fastH(this,&#39;main&#39;);"><span class="icon">Ń</span></a><a class="power" href="javascript:void(0);" hidefocus="" url="user.asp?act=power&amp;s=1" onclick="getChange(0);fastH(this,&#39;main&#39;);"><span class="icon">Ķ</span></a><a class="site" href="javascript:void(0);" hidefocus="" url="bind.asp?s=1" onclick="return false;getChange(0);fastH(this,&#39;main&#39;);"><span class="icon">ŧ</span></a><a class="exit" href="{{ route('exit') }}"><span class="icon">ş</span></a></p>
        </div>
    </div>
    <!--左边-->
    <div id="sidebar" class="sidebar" style="background-image: url(http://cdn.ehis.cc/2.3/weather/4.png);">
        <ul id="nav_0" class="now">
         {{--@foreach($nav as $navItem)--}}
        {{--@if(isset($navItem['nav_child']))--}}
            {{--<li>--}}
                {{--<p>--}}
                    {{--<a id="a_turn" url="{{ $navItem['url'] }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar({{ $navItem['id'] }});">--}}
                        {{--<font id="now_turn" style="display: none;">0</font><span class="icon">{{ $navItem['icon'] }}</span>{{ $navItem['name'] }}</a>--}}
                {{--</p>--}}
                {{--<ol id="bar_{{ $navItem['id'] }}">--}}
                {{--@foreach($navItem['nav_child'] as $child)--}}
                    {{--<li>--}}
                        {{--<a url="{{ $child['url'] }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);">--}}
                            {{--<font id="now_reply" style="display: none;">0</font><span class="icon">{{ $child['icon'] }}</span>{{ $child['name'] }}</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}

                {{--</ol>--}}
            {{--</li>--}}
        {{--@else--}}
            {{--<li>--}}
                {{--<a id="a_cons" url="{{ $navItem['url'] }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);">--}}
                    {{--<font id="now_cons" style="display: none;">0</font><span class="icon">{{ $navItem['icon'] }}</span>{{ $navItem['name'] }}</a>--}}
            {{--</li>--}}
        {{--@endif--}}
        {{----}}
        {{--@endforeach--}}
          {{--</ul>--}}

        {{--@if(check_node('setting'))--}}
        {{--<ul id="nav_1">--}}
            {{--@foreach($setting_nav as $navItem)--}}
            {{--@if(isset($navItem['nav_child']))--}}
                {{--<li>--}}
                    {{--<p>--}}
                        {{--<a id="a_turn" url="{{ $navItem['url'] }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar({{ $navItem['id'] }});">--}}
                            {{--<font id="now_turn" style="display: none;">0</font><span class="icon">{{ $navItem['icon'] }}</span>{{ $navItem['name'] }}</a>--}}
                    {{--</p>--}}
                    {{--<ol id="bar_{{ $navItem['id'] }}">--}}
                    {{--@foreach($navItem['nav_child'] as $child)--}}
                        {{--<li>--}}
                            {{--<a url="{{ $child['url'] }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);">--}}
                                {{--<font id="now_reply" style="display: none;">0</font><span class="icon">{{ $child['icon'] }}</span>{{ $child['name'] }}</a>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}

                    {{--</ol>--}}
                {{--</li>--}}
            {{--@else--}}
                {{--<li>--}}
                    {{--<a id="a_cons" url="{{ $navItem['url'] }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);">--}}
                        {{--<font id="now_cons" style="display: none;">0</font><span class="icon">{{ $navItem['icon'] }}</span>{{ $navItem['name'] }}</a>--}}
                {{--</li>--}}
            {{--@endif--}}
            {{----}}
            {{--@endforeach--}}


        {{--</ul> --}}
        {{--@endif--}}

     <li>
                <p>
                    <a id="a_turn" url="{{ route('patient.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar(0);">
                        <font id="now_turn" style="display: none;">0</font><span class="icon">Ķ</span>患者管理</a>
                </p>
                <ol id="bar_0">
                    <li>
                        <a url="{{ route('patienttrack.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);">
                            <font id="now_reply" style="display: none;">0</font><span class="icon">į</span>回访记录</a>
                    </li>
                    <li>
                        <a url="{{ route('take.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);">
                            <font id="now_take" style="display: none;">0</font><span class="icon">Đ</span>消费记录</a>
                    </li>
                    <li><a url="{{ route('patientReport') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">Ő</span>患者报表</a></li>
                    <li><a url="{{ route('patientStatistics') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">ŏ</span>患者统计</a></li>
                    <li><a url="{{ route('takeStatistics') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">Ľ</span>消费统计</a></li>
                </ol>
            </li>

            <li>
                <p>
                    <a id="a_res" url="{{ route('book.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar(1);">
                        <font id="now_res" style="display: none;">0</font><span class="icon">Ĵ</span>预约管理</a>
                </p>
                <ol id="bar_1">
                    <li>
                        <a url="{{ route('booktrack.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);">
                            <font id="now_track" style="display: none;">0</font><span class="icon">į</span>回访记录</a>
                    </li>
                    <li><a url="{{ route('bookSheet') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">Ő</span>预约报表</a></li>
                    <li><a url="{{ route('bookStatistics') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">ŏ</span>预约统计</a></li>
                </ol>
            </li>
            <li>
                <a id="a_cons" url="{{ route('consult.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);">
                    <font id="now_cons" style="display: none;">0</font><span class="icon">Ĳ</span>咨询记录</a>
            </li>
            <li>
                <a id="a_tel" url="{{ route('tel-consult.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);">
                    <font id="now_tel" style="display: none;">0</font><span class="icon">ĕ</span>电话记录</a>
            </li>
            <li>
                <a id="a_call" url="{{ route('recall.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);">
                    <font id="now_call" style="display: none;">0</font><span class="icon">Ĕ</span>回拨记录</a>
            </li>
            <li>
                <p><a url="{{ route('dialog.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar(2);"><span class="icon">İ</span>对话管理</a></p>
                <ol id="bar_2">
                    <li><a url="{{ route('dialogSheet') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">Ő</span>对话报表</a></li>
                    <li><a url="{{ route('dialogStatistics') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">ŏ</span>对话统计</a></li>
                </ol>
            </li>
            <li>
                <p><a url="{{ route('rank-record.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar(3);"><span class="icon">ő</span>竞价管理</a></p>
                <ol id="bar_3">
                    <li><a url="{{ route('rankReport') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">Ő</span>竞价报表</a></li>
                    <li><a url="{{ route('rankStatistics') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">ŏ</span>竞价统计</a></li>
                </ol>
            </li>
            <li><a url="{{ route('sms.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">ė</span>短信记录</a></li>
            <li><a url="{{ route('uploadList') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">ū</span>上传记录</a></li>
            <!-- <li><a url="log.asp?s=1" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">Š</span>操作记录</a></li> -->
        </ul>
        <ul id="nav_1">
            <li><a url="{{ route('disease.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">Ĉ</span>病种管理</a></li>
            <li><a url="{{ route('doctor.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">ō</span>医生管理</a></li>
            <li><a url="{{ route('way.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">Ń</span>途径管理</a></li>
            <li><a url="{{ route('ad.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">ě</span>媒介管理</a></li>
            <li><a url="{{ route('nav.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">Ɔ</span>导航菜单</a></li>
            <li><a url="{{ route('node.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">Ɔ</span>权限节点</a></li>
            <li>
                <p><a url="{{ route('user.index') }}" href="javascript:void(0);" onclick="getChange(this);fastH(this,&#39;main&#39;);sidebar(4);"><span class="icon">ĸ</span>用户管理</a></p>
                <ol id="bar_4">
                    <li><a url="{{ route('role.index') }}" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">ĵ</span>用户组管理</a></li>
                   <!--  <li><a url="black.asp?s=1" href="javascript:void(0);" hidefocus="" onclick="getChange(this,1);fastH(this,&#39;main&#39;);"><span class="icon">Ĩ</span>黑名单管理</a></li> -->
                </ol>
            </li>
            <li><a url="code.asp?s=1" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">Ɔ</span>网站调用</a></li>
            <li><a url="setting.asp?s=1" href="javascript:void(0);" hidefocus="" onclick="getChange(this);fastH(this,&#39;main&#39;);"><span class="icon">ņ</span>系统设置</a></li>
        </ul> --}}
    </div>
    <!--右边-->
    <div id="main" class="main">
        <!--导航-->
        @include('index_include')
    </div>
    <!--底部-->
    <div id="footer" class="footer">
        <div class="tips right"></div>
        <div class="copy"><a href="javascript:void(0);" onclick="weather();" title="刷新"><span class="icon" style="color:#777;">ę</span></a> <span id="call_weather">天气加载中...</div>
    </div>
    <script>
    window.setTimeout("now_tip()", 100);
    if (exist('call_local')) {
        window.setTimeout("$('call_local').click()", 150);
    }
    if (exist('call_weather')) {
        window.setTimeout("weather()", 200);
    }
    if (exist('call_track')) {
        window.setTimeout("track()", 250);
    }
    if (exist('this_user')) {
        To('user.asp?act=pass');
    }
    </script>
    <script>
    if (exist('call_dbbak')) {
        window.setTimeout("dbbak()", 100);
    }
    </script>
</body>

</html>
