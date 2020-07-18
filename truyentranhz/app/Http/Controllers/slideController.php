<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\images;
use App\slide;
use DB;
use Auth; 

class slideController extends Controller
{
    public function getdanhsach()
    {   
        $slide =  slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getthem()
    {   
        return view('admin.slide.them');
       
    }
    public function postthem(Request $request)
    { 
        $this->validate($request,[
           'Ten' =>'required',
           'NoiDung'=>'required',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);
       $slide = new slide;
       $image = new images();
       $slide->Ten = $request->Ten;
       $slide->NoiDung = $request->NoiDung;
       if($request->has('link'))
        $slide->link = $request->link;
       if( $request->hasFile('Hinh'))
            {
                $file=$request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str::random(4)."_".$name;
                while(file_exists("upload/slide/".$Hinh))
                {
                    $Hinh = str::random(4)."_".$name;
                }
                $file->move("upload/slide",$Hinh);
                $slide->Hinh = $Hinh;
                $image->img =$Hinh;
                $image->save();
            }
                else
                {
                    $slide->Hinh = "";
                }
                $slide->save();
                return redirect('admin/slide/them')->with('thongbao','Thêm slide thành công');
    }
    public function getsua(Request $request ,$id)
    {
        $slide = slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
     
    }
    public function postsua(Request $request,$id)
    {
        $this->validate($request,[
           'Ten' =>'required',
           'NoiDung'=>'required',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);
       $slide = slide::find($id);
       $image = new images();
       $slide->Ten = $request->Ten;
       $slide->NoiDung = $request->NoiDung;
       if($request->has('link'))
        $slide->link = $request->link;
       if( $request->hasFile('Hinh'))
            {
                $file=$request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str::random(4)."_".$name;
                while(file_exists("upload/slide/".$Hinh))
                {
                    $Hinh = str::random(4)."_".$name;
                }
                $file->move("upload/slide",$Hinh);
                unlink("upload/slide/".$slide->Hinh);
                $slide->Hinh = $Hinh;
                $image->img = $Hinh;
                $image->save();
            }
                $slide->save();
                return redirect('admin/slide/sua/'.$id)->with('thongbao','Thêm slide thành công');
    }
    
    public function getxoa($id)
    {
     $slide = slide::find($id);
     unlink("upload/slide/".$slide->Hinh);
     $slide->delete();
     return redirect('admin/slide/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
