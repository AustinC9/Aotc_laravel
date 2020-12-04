<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primrary = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $with = ["user"];

    public function user(){
        return $this->belongsTo("App\Models\User", 'ref_author_id');
    }
    public function comments(){
        return $this->hasMany("App\Models\Comment",'parent_id');
    }

}
