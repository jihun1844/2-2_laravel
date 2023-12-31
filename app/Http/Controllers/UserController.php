<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /* Display a listing of the resource.
     */
    protected static $users =[['id'=>1,'name'=>'고길동','birthday'=> '1990/02/21','email'=> 'godi@ds.com'],
                        ['id'=>2,'name'=>'홍길동','birthday'=> '1980/07/21','email'=> 'godi1@ds.com'],
                        ['id'=>3,'name'=>'김진즈','birthday'=> '2000/03/21','email'=> 'godi2@ds.com'],
                        ['id'=>4,'name'=>'이홍나','birthday'=> '2001/04/21','email'=> 'godi3@ds.com'],
                        ['id'=>5,'name'=>'사아이','birthday'=> '2002/05/21','email'=> 'godi4@ds.com']
    ]; //DB에서 읽어온 정보를 $users 변수에 할당했다고 가정


    public function index()
    {
       /* 1. DB에서 사용자 정보를 가져온다
        2. 가져온 사용자 정보를 blade 파일에 넘겨주면서 실행
        3. */
        return view('welcome', ['users' => UserController::$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        /*
        1. Request 객체로 부터 사용자가 폼에 입력한 값을 꺼낸다
        2. 1에서 꺼낸 값을 DB에 넣는다
        3. 등록결과 페이지를 만들어서 반환한다  
        */
        $name = $req->input("name");
        $birthday = $req->input("birthDay");
        $email = $req->input("email");
        $affiliation = $req->input("affiliation");
        //return view('register', ['name'=>$name, 'email'=>$email, 'birthday'=>$birthday,
                                 //'affiliation'=>$affiliation]);
        //DB에 저장하고 
        //저장된 레코드의 primary key 컬럼 값을 가지고 와서
        // /users/pk 값으로 get방식으로 다시 요청해라 지시
        return redirect('/users/3'); //새로 등록된 회원의 id가 3번이라 가정
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
            1. $id를 가지고 DB에서 레코드 하나를 인출한다
                select * from users where id = $id
            2. 인출된 그 정보를 변수 $user에 할당
            3. 그$user 값을 blade에 전달 하면서 실행
        */
        $userFound = null;
        foreach(UserController::$users as $user){
            if($user["id"] == $id){
                $userFound = $user;
                break;
            }
        }
        // $userFound : [id => 1, 'name'=>홍길동]
        // 못찾았으면 $userFound는 null 값을 가짐
        // 이때 null대신에 빈 배열[] 을 넘겨 주자
        $userFound = $userFound != null ? $userFound : [];
        //                        'user' id의 배열 전부가 들어가서 user_info에 넘어감
        return view('user_info', ['user'=>$userFound]);

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //1. id 값에 해당하는 사용자 정보를 DB에서 읽어 온다
        //2. 읽어온 그 사용자 정보를 blade 파일에 넘겨주면서 그 blade를 실행
        $userFound = null;
        foreach(UserController::$users as $user){
            if($user["id"] == $id){
                $userFound = $user;
                break;
            }
        }
        return view('update_form', ['user' => $userFound]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //1. Request 객체에서 사용자가 입력한 값을 빼와야 한다
        //2. 위에서 빼온 값으로 $id에 해당하는 DB레코드를 찾아서 Update를 한다
        //3. 사용자 상세보기 view로 연결시켜 준다
        $name = $request->input("name");
        $birthday = $request->input("birthday");
        $email = $request->input("email");
        
        $updateUser = null;
        foreach(UserController::$users as $user){
            if($user["id"] == $id){
                $user["name"] == $name;
                $user["email"] == $email;
                $user["birthday"] == $birthday;
                $updateUser = $user;
                break;
            }
        }
        return view('user_info', ['user' => $updateUser]);
        //return view('user_info', ['user'=>$updateUser]);
        //클라이언트에게 결과 페이지를 보려면 이 URL로 다시 get방식으로 요청하라는지시
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1. PRIMARY KEY 컬럼 값으로 $id 값을 가지는 
        //    레코드를 DB에서 찾아서 삭제
        //2. 리스트 페이지를 생성해 반환
        for($i = 0; $i< sizeof(static::$users);$i++){
            if(static::$users[$i]['id']==$id){
                unset(static::$users[$i]);
            }
        }
        return view('welcome', ['users' => static::$users]);
        
    }
}
