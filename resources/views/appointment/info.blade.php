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
            <center>途径</center>
        </th>
        <th width="90">
            <center>预约医生</center>
        </th>
        <th width="120">
            <center>预约时间</center>
        </th>
    </tr>
    </thead>
    <tbody id="tablebg">
    <tr class="t1">
        <td>
            <center>{{ $appointment->name }}</center>
        </td>
        <td>
            <center>{{ $appointment->gender == \App\Http\CommonRuleInterface::MALE ? '男': '女' }}</center>
        </td>
        <td>
            <center>{{ $appointment->age }}</center>
        </td>
        <td>
            <center>{{ $appointment->phone }}</center>
        </td>
        <td>
            <center>{{ area($appointment->province, $appointment->city,$appointment->town)['city'] }}{{ area($appointment->province, $appointment->city,$appointment->town)['town']  }}</center>
        </td>
        <td>
            <center>肾病综合征</center>
        </td>
        <td>
            <center>PC商务通</center>
        </td>
        <td>
            <center>赵中献</center>
        </td>
        <td>
            <center>{{ $appointment->book_date->format('Y-m-d H:i') }}</center>
        </td>
    </tr>
    <tr class="t1">
        <td colspan="9">{{ $appointment->content }}</td>
    </tr>
    </tbody>
</table>