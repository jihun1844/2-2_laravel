<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    // public function test() : View{ //test 메소드는 View 타입을 반환함
    //     return view('welcome');
    // }

    public function create() : View{
        return view('register_form');
    }

    public function store(Request $req) : View{
        $name = $req->input("name");
        $email = $req->input("email");
        $birthday = $req->input("birthday");
        $affiliation = $req->input("affiliation");

        return view('register', ['name'=>$name, 'email'=>$email, 'birthday'=>$birthday, 'affiliation'=>$affiliation]);
    }

    public function update() : View{
        return view('update_form');
    }

    public function edit(Request $req) : View{
        $name = $req->input("name");
        $email = $req->input("email");
        $birthday = $req->input("birthday");
        $affiliation = $req->input("affiliation");
        return view('update', ['name'=>$name, 'email'=>$email, 'birthday'=>$birthday, 'affiliation'=>$affiliation]);
    }
    public function index() : View{
        return view('remove_form');
    }

    public function delete(Request $req) : View{
        $name = $req->input("name");
        return view('remove',['name' => $name]);
    }

}
