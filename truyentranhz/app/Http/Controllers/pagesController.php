<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\theloai_truyen;
use App\theloai;
use App\truyen;
use App\slide;
use App\user;
use App\chapter;

class pagesController extends Controller
{
    //
    function __construct()
    {
    	$theloai = theloai::all();
    	$slide = slide::all();
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }
    }
    function trangchu()
    {
        $theloai_truyen = theloai_truyen::all();
    	$theloai = theloai::all();
    	return view('pages.trangchu',['theloai'=>$theloai,'theloai_truyen'=>$theloai_truyen]);
    }
    function lienhe()
    {
    	$theloai = theloai::all();
    	return view('pages.lienhe',['theloai'=>$theloai]);
    }
    function truyen()
    {
        $truyen = truyen::all();
        $theloai = theloai::all();
        return view('pages.truyen',['theloai'=>$theloai,'truyen'=>$truyen]);
    }
    function getdangnhap()
    {
        return view('pages.dangnhap');
    }
    function postdangnhap(Request $request)
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
            return redirect('trangchu');
        }
        else
        {   
            
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
        
    }
    function getdangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }
    function getnguoidung()
    {
        
        return view('pages.nguoidung');
    }
    function postnguoidung(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
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
        return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công');
    }

    function getdangky()
    {
        return view('pages.dangky');
    }
    function postdangky(Request $request)
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
        $user->quyen = 0;
        $user->save();

        return redirect('dangky')->with('thongbao','Đăng ký thành công');

    }
    public function getsua(Request $request ,$id)
    {
     $user = user::find($id);
     return view('admin.user.sua')->with(['user'=>$user]);
    }
    public function getaction()
    {
        $truyen = truyen::all();
        $theloai = theloai::all();
        return view('pages.action',['theloai'=>$theloai,'truyen'=>$truyen]);
    }
    public function getfantansy()
    {
        $truyen = truyen::all();
        $theloai = theloai::all();
        return view('pages.fantansy',['theloai'=>$theloai,'truyen'=>$truyen]);
    }
    public function getchitiet($id)
    {
        $truyen = truyen::find($id);
        $tinnoibat = truyen::where('NoiBat',1)->take(4)->get();
        return view('pages.chitiet',['truyen'=>$truyen,'tinnoibat'=>$tinnoibat]);
    }
    public function getchapter($id)
    {
        $truyen = truyen::all();
        $tinnoibat = truyen::where('NoiBat',1)->take(4)->get();
        $chapter = chapter::find($id);
        return view('pages.chapter',['truyen'=>$truyen,'chapter'=>$chapter,'tinnoibat'=>$tinnoibat]);

    }
    public function gettimkiem(Request $request)
    {
        // $tukhoa = $request->tukhoa;
        $tukhoa=$request->get('tukhoa');
        $truyen = truyen::where('TieuDe','like','%'.$tukhoa.'%')->orWhere('TomTat','like','%'.$tukhoa.'%')->orWhere('TacGia','like','%'.$tukhoa.'%');
        return view('pages.timkiem',['tukhoa'=>$tukhoa,'truyen'=>$truyen]);
    }
    
}
