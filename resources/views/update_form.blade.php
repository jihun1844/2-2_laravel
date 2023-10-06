<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="post" action="/users/{{$user['id']}}">
    <p>id: {{$user["id"]}}</p>
    <p>이름: <input type="text" name="name" value="{{$user['name']}}"> </p>
    <p>이메일: <input type="text" name="email" value="{{$user["email"]}}"> </p>
    <p>생일: <input type="text" name="birthday" value="{{$user['birthday']}}"> </p>
    @csrf
    @method('put')
    <input type="submit" value="수정완료">
  </form>
</body>
</html>