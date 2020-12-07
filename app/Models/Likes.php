<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\User;


class Likes extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'id';
    public $incremenitng = true;
    public $timestamps = true;
    protected $guarded = [];
    protected $fillable = ['liked'];
    //protected $with = ['user'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function post() {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
