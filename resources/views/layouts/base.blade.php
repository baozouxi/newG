<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="{{ route('index') }}">首页</a><span class="ider">&gt;</span></li>
        @stack('guide')
    </ul>

    @stack('button')

</div>
<div id="wrap" class="wrap"><!--整体内容-->
    <div id="container" class="container">
        @yield('content')
    </div>
</div>
