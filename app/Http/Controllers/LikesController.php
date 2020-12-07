<?php

namespace App\Http\Controllers;
use App\Models\Likes;
use App\Models\Posts;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function index(){
        return Likes::all();
    }
    public function create(Request $request){
        $like = new Likes;
        $like->post_id = request('posts');
        $like->user_id = request('users');
        $like->save();
        return Posts::all();
    }
    public function destroy(Request $request){
        Likes::find($request->id)->delete();
        return Posts::all();
    }
}
