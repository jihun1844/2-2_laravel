<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="post" action="/remove">
    @csrf
    @method("delete")
    <select name="name">
      <option >김민재</option>
      <option >허리</option>
      <option >케인</option>
    </select>
    <button type="submit">삭제</button>
  </form>
  
</body>
</html>