<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //create 메서드로 레코드를 생성할때, 그 레코드의 칼럼 이름들
    //대량 할당을 사용할때, 개발자가 하용하는 컬럼 값만 취해서 레코드로 생성하기 위해서
    //예를 들어, requst에 created_at, updated_at값이 있어도 그에 해당하는
    //칼럼이 posts테이블에 존재하지만, 그값은 취하지 않고 레코드를 생성한다

    //시발 셤문제 나옴 이거 둘중에 하나 쓰면됨
    //protected $fillable = ['title', 'content', 'user_id']; //화이트 리스트
    protected $guarded = ['created_at', 'updated_at'];// 블랙 리스트



    public function comments(){
         //return $this->hasMany(Comment::class, 'post_id', 'id');
         //자동으로 인식 하지만 인식 못하면 직접 입력 = 'post_id', 'id'
        return $this->hasMany(Comment::class);
    }

    public function latestComment(){
        return $this->hasOne(Comment::class)->latestOfMany();
    }

    public function oldestComment(){
        return $this->hasOne(Comment::class)->oldestOfMany();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
