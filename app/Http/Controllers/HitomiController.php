<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class HitomiController extends Controller
{
    //댓글리스트 가져오기
    public function getList(Request $req){
      //echo $req;
      $comment_list = Comment::where('post_num', $req->post_num)->get();

      //echo $req->post_num . '<br>';
      echo $comment_list;
    }

    //댓글 저장
    public function insertComment(Request $req){
      Comment::insert([
        'post_num' => $req->postnum,
        'user_id' => $req->user_id,
        'password' => $req->password,
        'contents' => $req->contents,
        'parents_comment' => $req->parents_comment,
      ]);
    }
}
