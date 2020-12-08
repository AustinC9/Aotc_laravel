<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primary = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $with = ["user", "likes"];

    public function user()
    {
        return $this->belongsTo("App\Models\User", 'ref_author_id');
    }
    public function comments()
    {
        return $this->hasMany("App\Models\Comment", 'parent_id');
    }
    public function likes()
    {
        return $this->hasMany("App\Models\Likes", 'post_id', 'id');
    }
    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub('select post_id, sum(liked) likes, sum(!liked) dislikes from likes
        group by post_id','likes','likes.post_id', 'posts.id' );
// left join (select post_id, sum(liked) likes, sum(!liked) dislikes from likes
// group by post_id)   likes on likes.post_id = posts.id
    }
    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            ['liked' => $liked]
        );
    }


    public function dislike($user = null)
    {
        return ($this->like($user, false));
    }
    public function isLikedBy(User $user)
    {
        return (bool)$user->likes
        ->where('post_id', $this->id)
        ->where('liked', true)
        ->count();
    }
    public function isDisLikedBy(User $user)
    {
        return (bool)$user->likes
        ->where('post_id', $this->id)
        ->where('liked', false)
        ->count();
    }
    
}
