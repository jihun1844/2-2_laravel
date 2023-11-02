<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>게시글 상세 보기</title>
  <script type="text/javascript">
    function send_delete(num){
      const result = confirm("Are you sure?");
      if(result == false){
        return false;
      }
      
      //이 html 문서에서 이름이 _method인 DOM객체를 찾아서
      //그 객체의 value값을 "delete"로 변경하고 return true 하면
      //서버로 요청이 발송 된다
      const formTag = document.getElementsById(num);
      const tags = formTag.getElementsByName("_method");
      tags[0].value = "delete";
      return false;

    }
  </script>
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
    </form>
    <div>
      <h2>댓글 리스트({{$post->comments->count()}})</h2>
        <table>
          <tr>
            <th> 연번</th><th>내용</th><th>작성자</th><th>작성일</th>
          </tr>
          @foreach($post->comments as $comment)
          <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" method="post" id="{{$loop->index+1}}">
            
            <tr>
              <td>{{$loop->index+1}}</td>
              <td><input type="text" value="{{$comment->content}}" name="content"></td>
              <td>{{$comment->user_id}}</td>
              <td>{{$comment->created_at}}</td>
              <td><input type="submit" value="수정"></td>
              <td><input type="submit" onclick="send_delete({{$loop->index+1}})" value="삭제"></td>
              @csrf

              @method("put")
            </tr>
          </form>
          @endforeach
        </table>
    </div>

    <a href="/posts">돌아가기</a>
  </div>
  
</body>
</html>