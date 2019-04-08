<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//引用user模型
use App\Models\User;


class UsersController extends Controller
{
     public function show(User $user)
    {
    	//将用户对象变量$user通过compact转换为一个关联数组，并作为第二个参数传递给view方法，将变量数据传递到视图中显示
    	//show方法添加完成后，在user.show中可以直接使用$user变量来获取view方法传递给视图的用户数据
        return view('users.show', compact('user'));
    }
}
