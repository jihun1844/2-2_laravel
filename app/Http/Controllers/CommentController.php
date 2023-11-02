<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $post_id)
    {
        //$request에서 content를 추출하고 comments테이블에 하나의 레코드로 삽입
        $content = $request->content;
        // Eloquent Model을 이용해 db에 삽입하는 방법
        // 1. Comment 객체 생성후, save 메서드 호출
        // 2. Comments::create 메서드 호출, 
        //         대량 할당을 위해 $fillable 프리퍼티 또는 $guarded정의 필요

        Comment::create([
            'content' => $content,
            'user_id' => 1,
            //지금은 하드코딩
            'post_id' => $post_id
        ]);

        //게시글 상세보기 페이지 뷰로 redirection
        return redirect('/posts/' .$post_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $post_id, string $comment_id)
    {
        //$comment_id에 해당하는 레코드를 comments 페이블에서 인출하고
        //Comment 모델 객체로 생성한다
        $comment = Comment::find($comment_id);
        $comment->content = $request->content;
        $comment->save();
        //그 모델 객체의 content를 $request에 있는 content 값으로 변경하고
        //그 모델객체의  매서드를 호출한다

        return redirect('/posts/' . $post_id);
        //이 댓글의 게시글 상세보기 페이지로 redirect
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
