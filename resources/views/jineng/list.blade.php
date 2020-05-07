<table>
    <tr>
        <td>id</td>
        <td>名称</td>
        <td>年龄</td>
        <td>头像</td>
        <td>是否是湖北</td>
        <td>操作</td>
    </tr>
    @foreach($res as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->age}}</td>
        <td><img src="{{env('UPLOADS_URL')}}{{$v->logo}}" width="20" alt=""></td>
        <td>{{$v->is_sex==1?"是":""}}
        {{$v->is_sex==2?"否":""}}
        </td>
        <td>
        <a href="{{url('/jineng/dele/'.$v->id)}}"id="aa">删除</a>
        <a href="{{url('/jineng/up/'.$v->id)}}">修改</a>
        </td>
        
    </tr>
    @endforeach
    {{$res->links()}}
</table>
<script src="/static/jquery.js"></script>
<script>
$(document).on("click","#aa",function(){
    var _this=$(this);
    var url=_this.attr("href");
    if(window.confirm("是否删除"))
    $.get(url,function(res){
        _this.parents("tr").remove();
    })
    return false;
})
$(document).on("click",".page-link a",function(){
    var url=$(this).attr("href");
    $.get(url,function(res){
        $("body").html(res);
    })
    return false;
})
</script>