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