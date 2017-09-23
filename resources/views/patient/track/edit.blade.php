@extends($layout)


@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this);" url="{{ route('patients.index') }}">患者管理</a><span
                class="ider">&gt;</span>
    </li>
    <li><a href="javascript:void(0);" onclick="fastH(this);"
           url="{{ route('trackWithPatientInfo', ['patient'=>$patient->id]) }}">回访记录</a><span class="ider">&gt;</span>
    </li>
    <li>新增回访</li>
@endpush



@section('content')
    <div class="top"><h3 class="left"><span class="icon">ŷ</span>编辑回访</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                  url="{{ route('trackWithPatientInfo', ['patient'=>$patient->id]) }}" id="ref_url"
                                  title="返回"
                                  class="config"><span class="icon">ĭ</span>返回</a></p></div>
    <div id="box" class="box">

        @include('patient.info')

        <form id="form_sub" name="form_sub" method="post"
              action="javascript:fastP('{{ route('patient-tracks.update', ['patientTrack'=>$patientTrack->id]) }}');"><label
                    class="inline"><em>*</em>下次回访日期：</label>
            <input type="text" name="next" id="next" class="Wdate" value="{{ $patientTrack->next->format('Y-m-d H:i') }}" style="width:205px;"
                   autocomplete="off" disableautocomplete=""
                   onblur="this.style.backgroundColor='#fff';"
                   onfocus="this.style.backgroundColor='#FFFEF1';">
            <script>$('next').className = 'Wdate';
                $('next').onfocus = function () {
                    WdatePicker({dateFmt: 'yyyy-MM-dd HH:00', minDate: '%y-%M-%d', maxDate: '%y-{%M+1}-%d'});
                }</script>
            {{--<input name="state" id="state" class="checkbox" type="checkbox" value="1"><label--}}
            {{--for="state"><i>取消跟踪</i></label>--}}
            <label
                    class="inline"><em>*</em>记录上传：</label><input type="text" name="filepath" id="filepath"
                                                                 class="input" value="" style="width:430px;"
                                                                 autocomplete="off" disableautocomplete=""
                                                                 onblur="this.style.backgroundColor='#fff';"
                                                                 onfocus="this.style.backgroundColor='#FFFEF1';"
                                                                 readonly="true">
            <script>$('filepath').setAttribute('readOnly', true);</script>
            <button type="button" onclick="msgbox(this);" title="上传资料" url="upload.asp?act=main&amp;to=filepath"
                    class="button"><i class="icon">Ī</i>上传
            </button>
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
            <label class="inline">回访信息：</label><textarea name="content" id="content" class="textarea"
                                                         style="width:500px;height:100px;"
                                                         onblur="this.style.backgroundColor='#fff';"
                                                         onfocus="this.style.backgroundColor='#FFFEF1';">{{ $patientTrack->content }}</textarea><input
                    type="hidden" name="id" id="id" value="0"><input type="hidden" name="aid" id="aid"
                                                                     value="1"><input type="hidden" name="up"
                                                                                      id="up" value="data"><label
                    class="inline"></label><input type="hidden" name="back_url" id="back_url"
                                                  value="reply.asp?s=1&amp;aid=1&amp;m=turn"><label
                    class="inline"></label>
            <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
            <label class="inline"></label>
            <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
            <button type="reset" class="button"><span class="icon">ň</span>重置</button>
            <button type="button" onclick="To($('back_url').value,'main');" class="button"><span
                        class="icon">ĭ</span>返回
            </button>
        </form>
        <input type="hidden" name="this_url" id="this_url"
               value="{{ route('trackWithPatientInfo', ['patient'=>$patient->id]) }}">
@endsection