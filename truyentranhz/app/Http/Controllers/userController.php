<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\request as Httprequest;
use App\user;
use DB;

class userController extends Controller
{
    public function getdanhsach()
    {   
     $user = user::all();
     return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getthem()
    {   
       return view('admin.user.them');
       
    }
    public function postthem(Request $request)
    { 
        
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu tối đa 32 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
        ]);
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm thành công');

    }
    public function getsua(Request $request ,$id)
    {
     $user = user::find($id);
     return view('admin.user.sua')->with(['user'=>$user]);
    }
    public function postsua(Request $request,$id)
    {
         $this->validate($request,[
            'name'=>'required|min:3'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
        ]);
        $user = user::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        if($request->changePassword == "on")
        {
            $this->validate($request,[
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu tối đa 32 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
        ]);
            
            $user->password = bcrypt($request->password);

        }
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');

    }
    
    public function getxoa($id)
    {
     $user = user::find($id);
     $user->delete();
     return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getdangnhapAdmin()
    {
        return view('admin.login');
    }
    
    public function postdangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu không được quá 32 ký tự'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/truyen/danhsach');
        }
        else
        {   
            
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getlogout()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

}

