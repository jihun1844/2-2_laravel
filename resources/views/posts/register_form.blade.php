<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
    {{-- 새로운 데이터를 넘길때 method="post"  --}}
    {{-- resource 전에는 엑션이 '/register' --}}
    <form action="/posts" method="post">
      @csrf
      <div>
        <label for='name'>제목: <input type="text" name="title"></label><br>
      </div>
      <div>
        <label>내용: <textarea name="content" rows="5" ></textarea></label><br>
      </div>
      <button type="submit">등록</button> 
    </form>
  </div>
</body>
</html>