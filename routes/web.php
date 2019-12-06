<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BoardController@viewIndex');

//로그인 폼과 로그인 요청
Route::get('/login', 'LoginController@loginform');
Route::post('/login', 'LoginController@login');
//로그아웃
Route::get('/logout', 'LogoutController@logout');
//회원가입 폼과 회원가입 요청
Route::get('/register', 'RegisterController@registerform');
Route::post('/register', 'RegisterController@register');

//게시글 상세보기
Route::get('/board/{id}', 'BoardController@viewBoard');
//글 작성폼 요청
Route::get('/writeForm', 'BoardController@writeForm');
//게시글 테이블 삽입 요청
Route::post('/board/insert', 'BoardController@insertBoard');

//댓글 insert
Route::post('/comment/insert', 'CommentController@insertComment');
//댓글 deleteComment
Route::get('/comment/delete/{id}', 'CommentController@deleteComment');

//게시글 수정폼 요청
Route::get('/modify/{id}', 'BoardController@modifyForm');
//게시글 수정 요청
Route::post('/modify/{id}', 'BoardController@writeForm');

//파일 업로드
//Route::post('/modify/{id}', 'BoardController@writeForm');
/*
//크롬 익스텐션이
route::get('/extention', 'ExtentionController@test');

//사전 api 테스트
route::get('/dictest',   'ExtentionController@dictest');

//크롤링 테스트
route::get('/ct',   'CrawlingController@test');
*/
//------------------------------------------------------------------------------

route::get('/list/{post_num}', 'HitomiController@getList');
route::get('/insert', 'HitomiController@insertComment');
