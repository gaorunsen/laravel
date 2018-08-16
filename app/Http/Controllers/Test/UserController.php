<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function lst()
    {
    	$data=[
    		['name'=>'xiaoming','age'=>20],
    		['name'=>'小强','age'=>22],
    		['name'=>'吴老师','age'=>23]
    	];
    	//return"这里是Test/UserController的lst方法";
    	return view('user.lst',['name'=>'aaa','data'=>$data]);
    }

    //给add方法注入一个request对象
    public function add(Request $request)
    {
    		//dd($request);  //var_dump+die

    		// input() 方法;
    		// 获取单个输入值
    		//dd($request->input('name'));

    	//isMethod()方法
    	if ($request->isMethod('get')){
    		//显示视图
    		//return "这里是get请求";
    		return view('lst');
    	}elseif($request->isMethod('post')){
    		//数据处理
    		dd($request->all());
    	}
    }


    public function addd(Request $request)
    {
    		//all()方法
    		//获取所有输入值
    	dd($request->all());
    }
}
