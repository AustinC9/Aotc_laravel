<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $primaryKey ='id';
    public $incrementing = true;
    public $timestamps = true;

    public function book(){
        return $this->belongsTo('App\Models\Book', 'ref_book_id');
    }

}
