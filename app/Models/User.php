<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    // public function latestPosts()
    // {   //이 user가 작성한 posts 중에 가장 큰 놈
    //     return $this->hasOne(Post::class)->latestOfMany();
    // }

    public function latestPosts()
    {   //이 user가 작성한 posts 중에 가장 작은 놈
        return $this->posts()->one()->ofMany('id', 'max');
    }

    public function oldestPosts()
    {   //이 user가 작성한 posts 중에 가장 큰 놈
        return $this->hasOne(Post::class)->oldestOfMany();
    }

    //내가 작성한 개시글의 모든 댓글 가져오기
    //users --- posts --- comments
    //   user_id, post_id, id, id
    public function postcomments(){
        //여러개의 코멘트를 포스트를 통해서 가진다
        //return $this->hasManyThrough(Comment::class, Post::class);
        return $this->hasManyThrough(Comment::class, Post::class, 'user_id', 'post_id', 'id', 'id');
    }
}
