<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\chapter;
use App\truyen;
use Auth;

class chapterController extends Controller
{
    //
    public function getthem(Request $request ,$id)
    {   
        $truyen = truyen::find($id);
        $chapter = chapter::get();
        return view('admin.chapter.them')->with(['chapter'=>$chapter,'truyen'=>$truyen]);
    }
    public function postthem(Request $request,$id)
    {
        $truyen = truyen::find($id);
        $chapter = new chapter;
        $chapter->idtruyen =$id;
        $chapter->ten = $request->ten;
        $chapter->noidung = $request->noidung;
        $chapter->save();
        return redirect('admin/truyen/sua/'.$id)->with('thongbao','Thêm Thành Công');
    }
    public function getsua(Request $request,$id)
    {
    
     $chapter = chapter::find($id);
	 $truyen = truyen::find($id);
     return view('admin.chapter.sua')->with(['chapter'=>$chapter,'truyen'=>$truyen]);
    }
    public function postsua(Request $request,$id)
    {
    	$truyen = truyen::find($id);
    	$chapter = chapter::find($id);
    	$chapter->ten = $request->ten;
        $chapter->noidung = $request->noidung;
        $chapter->save();
        return redirect('admin/chapter/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getxoa(Request $request,$id)
    {
    	$chapter = chapter::find($id);
        $chapter->delete();
        return redirect('admin/truyen/sua/1002')->with('thongbao','Xóa Thành Công');
    }
} 
