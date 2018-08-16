<?php

namespace App\Http\Controllers;

//引用空间类元素
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    //
    public function lst()
    {
    	return "这里是Test控制器的lst方法";
    }
}
