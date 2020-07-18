<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\truyen;
use App\chapter;
use Auth;

class commentController extends Controller
{
    public function getxoa($id,$idtruyen)
    {
        $comment = comment::find($id);
        $comment->delete();

        return redirect('admin/truyen/sua/'.$idtruyen)->with('thongbao','Xóa Comment Thành Công');
    }
    public function postcomment($id,Request $request)
    {
    	$idtruyen = $id;
    	$truyen = truyen::find($id);
    	$comment = new comment;
    	$comment->idtruyen = $idtruyen;
    	$comment->idUser = Auth::user()->id;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();
    	return redirect("chitiet/{$id}"."html");
    }
}
