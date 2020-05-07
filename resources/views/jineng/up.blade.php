<form action="{{url('/jineng/upadd/'.$res->id)}}" method="post" enctype="multipart/form-data">@csrf
    <table>
        <tr>
            <td>姓名</td>
            <td><input type="type" name="name" value="{{$res->name}}">
            <span color="red">{{$errors->first('name')}}</span>
            </td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="age"value="{{$res->age}}">
            <span color="red">{{$errors->first('name')}}</span>
            </td>
        </tr>
        <tr>
            <td>身份证</td>
            <td><input type="text"name="shen"value="{{$res->shen}}">
            <span color="red">{{$errors->first('name')}}</span>
            </td>
        </tr>
        <tr>
            <td>头像</td>
            <td><input type="file" name="logo"></td>
        </tr>
        <tr>
            <td>是否湖北人</td>
            <td><input type="radio" name="is_sex" value="1" {{$res->is_sex=="1"?"checked":""}}>是
            <input type="radio" name="is_sex" value="2"{{$res->is_sex=="2"?"checked":""}}>否
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="XIUGAI"></td>
            <td></td>
        </tr>
    </table>
</form>