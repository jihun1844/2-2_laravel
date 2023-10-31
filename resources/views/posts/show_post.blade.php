<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>게시글 상세 보기</title>
</head>
<body>
  <div>
    제목: {{$post->title}} 
  </div>
  <div>
    내용: {{$post->content}}
  </div>
  <div>
    작성자: {{$post->user_id}}
  </div>
  <div>
    생성일: {{$post->created_at}}
  </div>
  <div>
    수정일: {{$post->updated_at}}
  </div>
  <div>
    <form style="display:inline-block" action="/posts/{{$post->id}}/edit" method="get">
      <input type="submit" value="수정"/>
    </form>
    <form style="display:inline-block" onsubmit="return confirm('정말 삭제 할꺼?')" action="" method="post">
      @csrf
      @method("delete")
      <input type="submit" value="삭제"/>
    </form>

    <hr>
    <h4>댓글등록</h4>
    <form action="/posts/{{$post->id}}/comments" method="post">
      @csrf
      <div>
        <textarea name="content" id="" cols="30" rows="1"></textarea>
      </div>
      <input type="submit" value="등록">
      <hr>


      <div>
        <h2>댓글 리스트({{$count}})</h2>
          <table>
            <tr>
              <th> 연번</th><th>내용</th><th>작성자</th><th>작성일</th>
            </tr>
            @foreach($?? as $comment)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$comment->content}}</td>
              <td>{{$comment->user_id}}</td>
              <td>{{$comment->created_at}}</td>
            </tr>
            @endforeach
          </table>
      </div>



    </form>

    <a href="/posts">돌아가기</a>
  </div>
</body>
</html>