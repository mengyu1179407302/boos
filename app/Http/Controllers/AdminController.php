<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

    	return view('admin.index');

    }

    /*
    *后台注册
    */
    public function enroll()
    {

    	return view('admin.enroll');
    }

    /*
    *处理注册
    */
    public function doenroll(Request $Request)
    {

          $users = new User;

          $users->name = request()->name;

         

          $users->password = Hash::make(request()->password);

          

          if($users->save()){

          	  return redirect('login');

          }else{

              return back();                                                       

          }
    }

    /*
    * 后台登陆
    */
    public function login()
    {

    	return view('admin.login');

    }

    public function dologin(Request $request)
    {

         //获取用户的数据
		$user = User::where('name', $request->name)->first();

		if(!$user){

			return back()->withInput();
		}

		//校验密码
		if(Hash::check($request->password, $user->password)){
			//写入session
			session(['name'=>$user->name, 'id'=>$user->id]);

			return redirect('/admin');

		}else{

			return back()->withInput();
		}

    }

     /*
     *退出登录
     */
     public function logout(Request $request)
     {

        $request->session()->flush();

        return redirect('admin');

     }

     /*
     *后台修改密码
     */
     public function changepw()
     {

       return view('admin.password');

     }

     /*
     *修改密码操作
     */
    public function pass(Request $request)
    {
     $user = User::where('name', \Session::get('name'))->first();

     if(!(Hash::check($request->oldpass, $user->password)))
     {
        
            return back()->with('error','旧密码输入错误');
     }

     if($request->password !== $request->repassword){
              
           return back()->with('error','密码不一致');

      }

     $user->password = Hash::make(request()->password);

     if($user->save()){
 
         $request->session()->flush();

         return redirect('login');  

     }else{

        return back()->with('error','修改失败');
     }  
}
}
