<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>회원가입 완료 후 정보 확인</title>
</head>
<body>
  <h1>회원가입이 완료되었습니다</h1>
  <h2>{{$name}}님의 등록 정보는 다음과 같습니다</h2>
  <div>
     <label for="">이메일: {{$email}}</label>
  </div><br>
  <div>
    <label for="">생년월일: {{$birthday}}</label>
  </div><br>
  <div>
    <label for="">소속: {{$affiliation}}</label>
  </div><br>
  
  
  
 

</body>

</html>