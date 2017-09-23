@if ($paginator->hasPages())
    <tr class="t1">
        <td colspan="20">
            <center>
                记录:{{ $paginator->total() }} 分页:
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())

                    <a href="javascript:void(0);" url="{{ $paginator->previousPageUrl() }}" onclick="fastH(this,'box')">2</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <b>{{ $page }}</b>
                            @else
                                <a href="javascript:void(0);" url="{{ $url }}" onclick="fastH(this,'box')">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="javascript:void(0);" url="/reply.asp?p=2" title="下一页" onclick="fastH(this,'box')">下一页</a>
                    <a href="javascript:void(0);" url="/reply.asp?p=2" title="最后一页" onclick="fastH(this,'box')">尾页</a>

                @endif
            </center>
        </td>
    </tr>

@else

    <tr><td colspan="20">记录:{{ $paginator->total() }}条</td></tr>

@endif
