<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//基本路由
/**
* Http 请求类型：[get/post/put/delete...]
*@param [string] $[name][URL地址]
*@param [closure闭包] [PHP的处理程序]
*/
Route::get('/test',function(){
	return '这里是基本路由...';
});

Route::get('/testp/{id}',function($id){
	return"这里是带必选参数的路由...参数是$id";
});

//带可选参数的路由
Route::get('/testop/{id?}',function($id=0){
	return"这里是带可选参数的路由。。。参数是$id";
});

//单参数参数的正则约束
Route::get ('/testrule/{id}',function($id){
	return"这里是参数的正则约束。。。";
})->where('id','\d+');

//多参数的正则约束
Route::get('/testrules/{name}/{age}',function($n,$a){
	return "这里是多参数正则约束。。。name=$n,age=$a";
})->where(['name'=>'\w+','age'=>'\d+']);

//路由到控制器方法
Route::get('/test/fn','TestController@lst');	
Route::get('/user/lst','Test\UserController@lst');


// 中间件
			//进入系统
Route::get('/login',function(){

	session(['uid'=>'100']);
	return "这里是login登录页面...";
});

			//设置
Route::get('/setting',function(){
	return "这里是setting路由...uid=".session('uid');
})->middleware('login');

//Http请求
//Route::get('/user/add','Test\UserController@add'); 
//Route::post('/user/add','Test\UserController@add'); 
//代码优化
	  //匹配
Route::match(['get','post'],'user/add','Test\UserController@add');

Route::get('/user/addd','Test\UserController@addd'); 


//===============================================================
//Http响应

//1. 基本响应
Route::get('/response',function(){
	//        响应体    相应行                        响应头
	return response('hello world',200)//空 默认200
	->header('X-http-one','one')
	->header('content-type','text/html;charset=utf-8');
});


//2. 设置cookie
Route::get('/response/cookie',function(){
	return response('')->withCookie('name','高润森',10);//name为变量名  高润森为变量值  10为过期时间 单位：分钟
});

Route::get('/cookie',function(){
	dd(Cookie::get('name'));//cookie门面
});


//ajax
Route::get('/ajax',function(){
	return view('ajax');
});

Route::get('/response/ajax',function(){
	return response()->json(['name'=>'xiaoqiang','age'=>20]);
});



// //==================================================================================
// //数据库操作

// //1.插入操作
// Route::get('/db/insert',function(){
// 	$rs=DB::insert("insert into it_user values (null,'xiaoning','123456')");
// 	dd($rs);
// });

// //2.查询操作
// Route::get('/db/select',function(){
// 	$data=DB::select("select*fron it_user");
// 	dd($data);
// });

// //3.更新操作
// Route::get('/db/update',function(){
// 	$rows=DB::update("update it_user set name='xiaomei' where id=2");
// 	dd($rows);
// });

// //4.参数绑定
// Route::get('/db/selectp',function(){
// 	$data=DB::select("select*from it_user where id=:id",['id'=>2]);
// 	dd($data);
// });

// //5.删除操作
// Route::get('/db/delete',function(){
// 	$rows=DB::delete("delete from it_user where id=3");
// 	dd($rows);
// });

// //==================================================================================
// //构建器的使用

//1.获取所有记录get
Route::get('/db/get',function(){
	// dd(DB::table('user'));
	$data=DB::table('user')->get();
	dd($data);
});

//2.获取单条记录
Route::get('/db/first',function(){
	$info=DB::table('user')->first();
	dd($info);
});

//3.获取一列数据
Route::get('/db/pluck',function(){
	$data=DB::table('user')->pluck('name');
	dd($data);
});

//3.where字句
Route::get('db/where',function(){
	dd(DB::table('user')->where('id','=','1')->get());
});


//4. insert操作
Route::get('/db/insert',function(){
	$rs=DB::table('user')->insert(['name'=>'xiaohong','password'=>'123456']);
	dd($rs);
});

//5. insertid操作
Route::get('/db/insertid',function(){
	$id = DB::table('user')->insertGetId(['name'=>'xiaozhang','password'=>'123456']);
	dd($id);
});

//6. update操作
Route::get('/db/update',function(){
	$rows=DB::table('user')->where('id','2')->update(['name'=>'xiaomei-new']);
	dd($rows);
});

//7. delete操作
Route::get('/db/delete',function(){
	$rows=DB::table('user')->where('id','>','3')->delete();
	dd($rows);
});










