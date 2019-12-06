<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //댓글 삽입
    public function insertComment(Request $req){
      if(Auth::check()){
        $user = Auth::user();
        Comment::insert([
          'board_id' => $req->board_id,
          'user_id' => $user->email,
          'contents' => $req->content
        ]);
        return redirect('/board/' . $req->board_id);
      }else{
        return back()->with('message', '로그인한 사용자만 이용 가능 합니다.');
      }
    }

    //댓글 삭제
    public function deleteComment(Request $req){
      if(Auth::check()){
        $comment = Comment::where('id', $req->id)->first();
        if(Auth::user()->email == $comment->user_id){
          $comment->delete();
          return back()->with('message', '댓글이 삭제되었습니다.');
        }else{
          return back()->with('message', '권한이 없습니다.');
        }
        return redirect('/board/' . $req->board_id);
      }else{
        return back()->with('message', '로그인한 사용자만 이용 가능 합니다.');
      }
    }
}
