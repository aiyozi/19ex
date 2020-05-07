<?php

namespace App\Http\Controllers\Jineng;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Shen;
class JinengController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("jineng.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $page=request()->page?:1;
        $res=Redis::get("res_".$page);
        dump($res);
        if(!$res){
            $res=Shen::paginate(2);
            $res=serialize($res);
            Redis::setex("res_".$page,7*24*60,$res);
        }
       $res=unserialize($res);
        return view("jineng.list",['res'=>$res]);
    }
    public function up($id){
        $res=Shen::find($id);
        return view("jineng.up",['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function indexadd(Request $request)
    {
        $data=request()->except(['_token']);
        $request->validate([
            "name"=>"required|unique:shen",
            "age"=>"required|regex:/^\d{1,130}$/",
            "shen"=>"required|regex:/^\d{14}$/",
        ],[
            "name.required"=>"名称不为空",
            "name.unipue"=>"名称已有",
            "age.required"=>"年龄不为空",
            "age.regex"=>"年龄1-130",
            "shen.required"=>"身份证不为空",
            "shen.regex"=>"身份证号为14位",
        ]);
        if($request->hasFile("logo")){
            $data['logo']=$this->upload("logo");
        }
        $res=Shen::insert($data);
        if($res){
            return redirect("/jineng/list");
        }

    }
    public function upload($file){
        $file=request()->file($file);
        if($file->isValid()){
            $path=$file->store("uploads");
            return $path;
        }
        exit("文件上传错误");
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dele($id)
    {
        $res=Shen::destroy($id);
        if($res){
            return redirect("/jineng/list");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upadd(Request $request,$id)
    {
        $data=request()->except(['_token']);
        if($request->hasFile("logo")){
            $data['logo']=$this->upload("logo");
        }
        $res=Shen::where("id",$id)->update($data);
        if($res){
            return redirect("/jineng/list");
        }
    }
    public function ajax(Request $request){
        $name=request()->name;
        // dd($name);
        $res=Shen::where("name",$name)->first();
        if($res){
            echo"no";
        }else{
            echo"ok";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
