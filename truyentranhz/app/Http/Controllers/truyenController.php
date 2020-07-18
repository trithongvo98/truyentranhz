<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\truyen;
use App\theloai_truyen;
use App\images;
use Illuminate\Support\Str;
use App\comment;
use App\chapter;
use DB;
use Auth;

class truyenController extends Controller
{
    public function getdanhsach()
    {   
        $truyen = truyen::orderBy('id','DESC')->get();
        $all_theloai = theloai::get();

        $theloai = DB::table('theloai_truyen')
        ->join('theloai','theloai_truyen.idtheloai','theloai.id')
        ->select('theloai.Ten as tenTheLoai','theloai_truyen.truyentranh_id as id')->get();
        return view('admin.truyen.danhsach',[
            'truyen'=>$truyen,
            'theloai'=>$theloai,
            'all_theloai'=>$all_theloai,
        ]);
    }
    public function getthem()
    {   
        $chapter = chapter::all();
        $theloai = theloai::all();
        $all_theloai = theloai::get();
        $truyen = truyen::orderby('id','DESC')->get(); 
        return view('admin.truyen.them')->with(['truyen'=>$truyen,'theloai'=>$theloai,'all_theloai'=>$all_theloai,'chapter'=>$chapter]);
    }
    public function postthem(Request $request)
    { 
        $this->validate($request,
            [
                'TieuDe'=> 'required|min:3|max:100',
                'TomTat'=>'required',
                'TacGia'=>'required'
            ],
            [
                'TieuDe.required'=>'Bạn chưa nhập tên thể loại',
                'TieuDe.min'=>'Tên thể loại phải có độ dài lớn hơn 3 ký tự',
                'TieuDe.max'=>'Tên thể loại phải có độ dài nhở hơn 100 ký tự',
                'TomTat'=>'Bạn chưa nhập tóm tắt truyện',
                'TacGia'=>'Bạn chưa nhập tác giả'
            ]);
        $truyen = new truyen;
        $image = new images();
        $truyen->TieuDe = $request->TieuDe;
        $truyen->TomTat = $request->TomTat;
        $truyen->TacGia = $request->TacGia;
        if( $request->hasFile('Hinh'))
            {
                $file=$request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str::random(4)."_".$name;
                while(file_exists("upload/truyen/".$Hinh))
                {
                    $Hinh = str::random(4)."_".$name;
                }
                $file->move("upload/truyen",$Hinh);
                $truyen->Hinh = $Hinh;
                $image->img =$Hinh;
                $image->save();
            }
                else
                {
                    $truyen->Hinh = "";
                }

                 $truyen->save();       
        return redirect('admin/truyen/them')->with('thongbao','Thêm Thành Công');
    }
    public function getsua(Request $request ,$id)
    {
     $all_theloai = theloai::get();
     $chapter = chapter::all();
     $theloai = theloai::all();
     $truyen = truyen::find($id);
     return view('admin.truyen.sua')->with(['truyen'=>$truyen,'theloai'=>$theloai,'all_theloai'=>$all_theloai
     ,'chapter'=>$chapter]);
    }
    public function postsua(Request $request,$id)
    {
    $truyen = truyen::find($id);
    $this->validate($request,
            [
                'TieuDe'=> 'required|min:3|max:100',
                'TomTat'=>'required',
                'TacGia'=>'required'
            ],
            [
                'TieuDe.required'=>'Bạn chưa nhập tên thể loại',
                'TieuDe.min'=>'Tên thể loại phải có độ dài lớn hơn 3 ký tự',
                'TieuDe.max'=>'Tên thể loại phải có độ dài nhở hơn 100 ký tự',
                'TomTat'=>'Bạn chưa nhập tóm tắt truyện',
                'TacGia'=>'Bạn chưa nhập tác giả'
            ]);
        $image = new images();
        $truyen->TieuDe = $request->TieuDe;
        $truyen->TomTat = $request->TomTat;
        $truyen->TacGia = $request->TacGia;
        $truyen->NoiBat = $request->NoiBat;
        if( $request->hasFile('Hinh'))
            {
                $file=$request->file('Hinh');
                $name = $file->getClientOriginalName();
                $Hinh = str::random(4)."_".$name;
                while(file_exists("upload/truyen/".$Hinh))
                {
                    $Hinh = str::random(4)."_".$name;
                }
                $file->move("upload/truyen",$Hinh);
                $truyen->Hinh = $Hinh;
                $image->img =$Hinh;
                $image->save();
            }
            $truyen->save();
            return redirect('admin/truyen/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }

    public function gettruyendadang()
    {   
        $truyen = truyen::orderBy('id','DESC')->get();
        $all_theloai = theloai::get();

        $theloai = DB::table('theloai_truyen')
        ->join('theloai','theloai_truyen.idtheloai','theloai.id')
        ->select('theloai.Ten as tenTheLoai','theloai_truyen.truyentranh_id as id')->get();
        return view('admin.truyen.truyendadang',[
            'truyen'=>$truyen,
            'theloai'=>$theloai,
            'all_theloai'=>$all_theloai,
        ]);
    }
    public function getthemTL(Request $request ,$id)
    {
     $theloai_truyen = theloai_truyen::get();
     $all_theloai = theloai::get();
     $theloai = theloai::all();
     $truyen = truyen::find($id);
     return view('admin.truyen.themTL')->with(['truyen'=>$truyen,'theloai'=>$theloai,'all_theloai'=>$all_theloai,
        'theloai_truyen'=>$theloai_truyen]);
    }

    public function postthemTL(Request $request,$id)
    {   
        $theloai= theloai::all();
        $truyen = truyen::find($id);
        $theloai_truyen = new theloai_truyen;
        $theloai_truyen->truyentranh_id =$id;
        $theloai_truyen->idtheloai = $request->theloai;
        $theloai_truyen->save();
        return redirect('admin/truyen/truyendadang')->with('thongbao','đã thêm thành công');
    }
    public function postxoaTL(Request $request , $id)
    {
        $theloai= theloai::all();
        $truyen = truyen::find($id);
        $theloai_truyen->truyentranh_id =$id;
        $theloai_truyen->idtheloai = $request->theloai;
        $theloai_truyen->delete();
        return redirect('admin/truyen/truyendadang')->with('thongbao','đã xóa thành công');
    }
    
    public function getxoa($id)
    {
    $truyen = truyen::find($id);
    $truyen->delete();
    return redirect('admin/truyen/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
