<form action="{{url('/jineng/indexadd')}}" method="post" enctype="multipart/form-data">@csrf
    <table>
        <tr>
            <td>姓名</td>
            <td><input type="type" name="name" id="name">
            <span color="red">{{$errors->first('name')}}</span>
            </td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="age">
            <span color="red">{{$errors->first('name')}}</span>
            </td>
        </tr>
        <tr>
            <td>身份证</td>
            <td><input type="text"name="shen">
            <span color="red">{{$errors->first('name')}}</span>
            </td>
        </tr>
        <tr>
            <td>头像</td>
            <td><input type="file" name="logo"></td>
        </tr>
        <tr>
            <td>是否湖北人</td>
            <td><input type="radio" name="is_sex" value="1">是
            <input type="radio" name="is_sex" value="2">否
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="submit"></td>
            <td></td>
        </tr>
    </table>
</form>
<script src="/static/jquery.js"></script>
<script>
$(document).on("blur","#name",function(){
    var _this=$(this);
    var name=_this.val();
    $.get("/jineng/ajax",{name:name},function(res){
        if(res=="ok"){
            alert("该名称可以使用");
        }else{
            alert("改名称已有");
        }
    })
})
</script>