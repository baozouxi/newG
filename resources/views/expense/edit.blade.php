@extends($layout)


@push('guide')
    <li><a href="javascript:void(0);" onclick="fastH(this);" url="{{ route('patients.index') }}">患者列表</a><span
                class="ider">&gt;</span>
    </li>

    <li><a href="javascript:void(0);" onclick="fastH(this);set_title('消费记录');"
           url="{{ route('expenseWithPatientInfo', ['patient'=>$patient->id]) }}">消费记录</a><span
                class="ider">&gt;</span>
    </li>

    <li>编辑消费</li>
@endpush




@section('content')
    <div class="top"><h3 class="left"><span class="icon">ŷ</span>编辑消费</h3>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')"
                                  url="{{ route('expenseWithPatientInfo', ['patient'=>$patient->id]) }}" id="ref_url"
                                  title="返回"
                                  class="config"><span class="icon">ĭ</span>返回</a></p></div>
    <div id="box" class="box">
        @include('patient.info')


        <form id="form_sub" name="form_sub" method="post"
              action="javascript:fastP('{{ route('expenses.update', ['expense' => $expense->id]) }}');"><label
                    class="inline"><em>*</em>分配医生：</label><select class="select" name="doctor_id" id="doctor_id"
                                                                  style="width:205px;">
                <option value="6">赵中献</option>
                <option value="7">黄小松</option>
                <option value="8">杨惠标</option>
                <option value="10">王奎</option>
                <option value="11">张建儒</option>


            </select><label class="inline"><em>*</em>药量（天）：</label><input type="text" name="dose" id="dose"
                                                                          class="input" value="{{ $expense->dose }}"
                                                                          style="width:435px;" autocomplete="off"
                                                                          disableautocomplete=""
                                                                          onblur="this.style.backgroundColor='#fff';"
                                                                          onfocus="this.style.backgroundColor='#FFFEF1';"><label
                    class="inline"><em>*</em>检查费：</label><input type="text" name="check_price" id="check_price"
                                                                class="input"
                                                                value="{{ $expense->check_price }}" style="width:435px;" autocomplete="off"
                                                                disableautocomplete=""
                                                                onblur="this.style.backgroundColor='#fff';"
                                                                onfocus="this.style.backgroundColor='#FFFEF1';"><label
                    class="inline"><em>*</em>治疗费：</label><input type="text" name="cure_price" id="cure_price"
                                                                class="input"
                                                                value="{{ $expense->cure_price }}" style="width:435px;" autocomplete="off"
                                                                disableautocomplete=""
                                                                onblur="this.style.backgroundColor='#fff';"
                                                                onfocus="this.style.backgroundColor='#FFFEF1';"><label
                    class="inline"><em>*</em>药品费：</label><input type="text" name="drug_price" id="drug_price"
                                                                class="input"
                                                                value="{{ $expense->drug_price }}" style="width:435px;" autocomplete="off"
                                                                disableautocomplete=""
                                                                onblur="this.style.backgroundColor='#fff';"
                                                                onfocus="this.style.backgroundColor='#FFFEF1';"><label
                    class="inline"><em>*</em>住院费：</label><input type="text" name="hospital_price" id="hospital_price"
                                                                class="input"
                                                                value="{{ $expense->hospital_price }}" style="width:435px;" autocomplete="off"
                                                                disableautocomplete=""
                                                                onblur="this.style.backgroundColor='#fff';"
                                                                onfocus="this.style.backgroundColor='#FFFEF1';"><label
                    class="inline">备注：</label><textarea name="content" id="content" class="textarea"
                                                        style="width:500px;height:100px;"
                                                        onblur="this.style.backgroundColor='#fff';"
                                                        onfocus="this.style.backgroundColor='#FFFEF1';">{{ $expense->content }}</textarea>

            <label class="inline"></label>
            <input type="hidden" name="back_url" id="back_url"
                   value="{{ route('expenseWithPatientInfo', ['patient'=>$patient->id]) }}">
            <label class="inline"></label>
            <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
            <label class="inline"></label>
            <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            <button type="reset" class="button"><span class="icon">ň</span>重置</button>
            <button type="button" onclick="To($('back_url').value,'main');" class="button"><span
                        class="icon">ĭ</span>返回
            </button>
        </form>
@endsection