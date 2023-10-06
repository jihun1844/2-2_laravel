<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @if (count($user) == 0)
    <h2>사용자를 찾을수 없습니다</h2>
  @else
    <h2>사용자 상세 정보</h2>
  @endif

  <div>
    <p>id: {{$user["id"]}}</p>
    <p>이름: {{$user["name"]}}</p>
    <p>이메일: {{$user["email"]}}</p>
    <p>생일: {{$user["birthday"]}}</p>
    <form action="/users/{{$user['id']}}" method="post">
      @csrf
      @method("delete")
      <input type="submit" value="삭제">
    </form>
    
    <a href="/users/{{$user['id']}}/edit">
      <input type="submit" value="수정">
    </a>


  </div>
</body>
</html>