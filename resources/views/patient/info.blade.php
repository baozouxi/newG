<table cellspacing="1" cellpadding="0">
    <thead>
    <tr>
        <th width="90">
            <center>姓名</center>
        </th>
        <th width="45">
            <center>性别</center>
        </th>
        <th width="45">
            <center>年龄</center>
        </th>
        <th width="100">
            <center>手机</center>
        </th>
        <th width="120">
            <center>地区</center>
        </th>
        <th width="100">
            <center>病种</center>
        </th>
        <th width="100">
            <center>媒介</center>
        </th>
        <th width="90">
            <center>就诊医生</center>
        </th>
        <th width="120">
            <center>到诊时间</center>
        </th>
    </tr>
    </thead>
    <tbody id="tablebg">
    <tr class="t1">
        <td>
            <center>{{ $patient->name }}</center>
        </td>
        <td>
            <center>{{ $patient->gender == \App\Http\CommonRuleInterface::MALE ? '男' : '女' }}</center>
        </td>
        <td>
            <center>{{ $patient->age  }}</center>
        </td>
        <td>
            <center>{{ $patient->phone }}</center>
        </td>
        <td>
            <center>{{ area($patient->province, $patient->city,$patient->town)['city'] }}{{ area($patient->province, $patient->city,$patient->town)['town'] }}</center>
        </td>
        <td>
            <center>{{ $patient->illness->name }}</center>
        </td>
        <td>
            <center>电视广告</center>
        </td>
        <td>
            <center>赵中献</center>
        </td>
        <td>
            <center>{{ $patient->created_at->format('Y-m-d H:i') }}</center>
        </td>
    </tr>
    <tr class="t1">
        <td colspan="9">阿斯大苏打啊的撒大师</td>
    </tr>
    </tbody>
</table>