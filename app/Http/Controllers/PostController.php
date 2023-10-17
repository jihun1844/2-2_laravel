<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //리스트를 보여주는 기능을 수행
        //DB의 posts 테이블의 레코드들을 읽어온다
        $posts = Post::all(); //posts 테이블의 모든 레코드들을 읽어온다
        //Post 객체의 collection 이라는 집합자료형으로 반환해준다
        //select *from posts

        //그렇게 읽어온 레코드들을 뷰페이지에 전달한다
        return view('posts.post_list',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.register_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;

        $post = new Post;
        $post->title = $title;
        $post->content = $content;
        $post->user_id = 1; //사용자 로그인 추가되기전은 하드코딩
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // DB의 posts 테이블에서 id 컬럼값으로 $id 값을 가지는 레코드를 읽어온다
        // 읽어온 그 레코드를 블레이드 뷰 파일에 전달한다
        $post = Post::find($id); //select *from posts where id = $id;
        return view('posts.show_post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // DB posts 테이블에서 id 칼럼의 값이 $id인 레코드를 인출
        $post = Post::find($id); //select * from posts where id = $id;

        // 그 레코드를 편집 폼 페이지를 생성하는 블레이드에게 전달
        return view('posts.edit_post', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //DB posts 테이블에서 id칼럼의 값이 $id인 레코드를 찾아서
        // 사용자가 입력한 title,content로 변경해준다
        // update posts set title = ?, content = ? where id = ?
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content; //$request->input("content)

        $post->save(); //새로적을때, 있던것을 변경할때 모두 save

        //상세보기 페이지로 리다이렉트 한다
        return redirect('/posts/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
