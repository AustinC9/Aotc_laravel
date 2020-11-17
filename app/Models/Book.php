<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
