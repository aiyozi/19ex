<form action="{{url('/jio/loadd')}}" method="post">@csrf
    <tr>
        <td>账号</td>
        <td><input type="text" name="user_name"></td>
    </tr>
    <tr>
        <td>密码</td>
        <td><input type="text" name="user_pwd"></td>
    </tr>
    <tr>
        <td><input type="submit" value="登录"></td>
        <td></td>
    </tr>
</form>