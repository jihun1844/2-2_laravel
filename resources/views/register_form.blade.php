<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>회원가입</title>
</head>
<body>
  <div>
    {{-- 새로운 데이터를 넘길때 method="post"  --}}
    {{-- resource 전에는 엑션이 '/register' --}}
    <form action="/users" method="post">
      @csrf
      <div>
        <label for='name'>이름: </label>
        <input type="text" name="name" id="name"> 
      </div>
      <div>
        <label for='birthday'>생년월일(YYYY/MM/DD): </label>
        <input type="date" name="birthday" id="birthday"> 
      </div>
      <div>
        <label for='email'>이메일: </label>
        <input type="email" name="email" id="email"> 
      </div>
      <div>
        <label for='affiliation'>소속: </label>
        <input type="text" name="affiliation" id="affiliation"> 
      </div>
      <button type="submit">등록</button> 
    </form>
  </div>
</body>
</html>