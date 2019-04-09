<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//引用user模型
use App\Models\User;
//表单请求验证是laravel框架提供的用户表单数据验证方案，比手工调用validator来说能处理更为复杂的逻辑关系
use App\Http\Requests\UserRequest;

use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    //利用laravel提供的auth中间件过滤，若为通过身份验证，将会被重定向到登录界面
    //在构造函数中调用middleware方法，该方法接收两个参数，第一个为中间件的名称，第二个为过滤的动作，通过except来设定除了指定动作以外，所有其他动作必须登录用户才能访问

     public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

     public function show(User $user)
    {
    	//将用户对象变量$user通过compact转换为一个关联数组，并作为第二个参数传递给view方法，将变量数据传递到视图中显示
    	//show方法添加完成后，在user.show中可以直接使用$user变量来获取view方法传递给视图的用户数据
        return view('users.show', compact('user'));
    }

    public function edit(User $user){
         $this->authorize('update', $user);
    	return view('users.edit',compact('user'));
    }
     /**
     * 传参userrequest将触发表单请求类的自动验证机制，验证发生在Requests\UserRquest的方法rules定制的规则中，只有当验证通过，才会执行控制器update（）方法中的代码，否则抛出异常，并重定向至上一个页面，附带验证失败的信息。
     *
     * @return array
     */

   
     public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
         $this->authorize('update', $user);
        // 赋值 $data 变量，以便对更新数据的操作；
        $data = $request->all();
        //图片上传逻辑处理

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        //执行更新

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
