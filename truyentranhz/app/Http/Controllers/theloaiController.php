<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use Auth;

class theloaiController extends Controller
{
    //
    public function getdanhsach()
    {   
        $theloai = theloai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getthem()
    {   
        $theloai = theloai::orderby('id','desc')->get(); 
        return view('admin.theloai.them')->with(['theloai'=>$theloai]);
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'ten'=> 'required|min:3|max:100'
            ],
            [
                'ten.required'=>'Bạn chưa nhập tên thể loại',
                'ten.min'=>'Tên thể loại phải có độ dài lớn hơn 3 ký tự',
                'ten.max'=>'Tên thể loại phải có độ dài nhở hơn 100 ký tự'
            ]);
        $theloai = new theloai;
        $theloai->ten = $request->ten;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm Thành Công');
    }
    public function getsua(Request $request ,$id)
    {
    	 $theloai = theloai::find($id);
        return view('admin.theloai.sua')->with(['theloai'=>$theloai
            ]);
    }

    public function postsua(Request $request,$id)
    {
        $theloai = theloai::find($id);
        $this->validate($request,
            [
                'ten'=>'required|unique:theloai,ten|min:3|max:100'
            ],
            [
                'ten.required'=>'Chưa Nhập Tên Thể Loại',
                'ten.unique'=>'Thể Loại Đã Tồn Tại',
                'ten.min'=>'Tên thể loại phải có độ dài lớn hơn 3 ký tự',
                'ten.max'=>'Tên thể loại phải có độ dài nhở hơn 100 ký tự'
            ]);
        $theloai->ten=$request->ten;
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getxoa($id)
    {
        $theloai = theloai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
