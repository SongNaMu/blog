<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;
use App\Hit;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    //
    public function viewIndex(){

      $subquery = Hit::select('board_id', DB::raw('count(*) as hit'))
                      ->groupBy('board_id');

      $boards = Board::selectRaw('id, title, user_id, h.hit')
                      ->leftJoinSub($subquery, 'h', function ($join){
                        $join->on('boards.id', '=', 'h.board_id');
                      })
                      ->orderBy('id', 'desc')
                      ->paginate(15);
      return view('index', ['boards' => $boards]);
    }

    //게시글 상세보기
    public function viewBoard(Request $req){
      if(Auth::check()){

        //조회수 유효성 검사
        $hit = $this->hitCheck($req->id);
        //조회 한적이 없는 경우 조회수 테이블에 추가
        if(!isset($hit)){
          Hit::insert([
            'user_id' => Auth::user()->email,
            'board_id' => $req->id
          ]);
        }

        //게시글 정보 db에서 가져오기
        $board = Board::where('id', $req->id)->first();
        $comments = Comment::where('board_id', $req->id)->get();

        return view('viewBoard', ['board' => $board, 'comments' => $comments]);
      }else{
        return back()->with('message', '로그인한 사용자만 이용 가능 합니다.');
      }
    }
    // 조회수 유효성 검사 (현재 로그인한 유저가 해당 개시글을 본적이 있는지 없는지 확인)
    public function hitCheck($board_id){
      $user_id = Auth::user()->email;
      $hit = Hit::where('user_id', $user_id)->where('board_id', $board_id)->first();
      return $hit;
    }

    //글 작성 폼 요청
    public function writeForm(){
      if(Auth::check()){
        return view('writeForm');
      }else{
        return back()->with('message', '로그인한 사용자만 이용 가능 합니다.');
      }
    }
    //게시글 테이블 삽입
    public function insertBoard(Request $req){
      if(Auth::check()){
        $user = User::where('id', Auth::id())->first();
        Board::insert([
          'user_id' => $user->email,
          'title' => $req->title,
          'content' => $req->content
        ]);
        return redirect('/');
      }else{
        return back()->with('message', '로그인한 사용자만 이용 가능 합니다.');
      }
    }

    //게시글 수정 요청
    public function modifyBoard(Request $req){

    }
    //게시글 수정 폼 요청
    public function modifyForm(Request $req){
      if(Auth::check()){
        $board = Board::where('id', $req->id)->first();
        $user = Auth::user();

        if($board->user_id == $user->email){
          return view('modify')->with('board', $board);

        }else{
          return back()->with('message', '권한이 없습니다.');
        }

      }else{
        return back()->with('message', '로그인한 사용자만 이용 가능 합니다.');
      }
    }
}
