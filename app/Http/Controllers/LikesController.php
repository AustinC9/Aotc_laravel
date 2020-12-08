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
    public function allLikesForAPost($postid){
        return Likes::where('post_id', $postid)->get();
    }
    public function createlike(Request $request){
        $user = $request->user();
        $like = new Likes;
        $like->liked = 1;
        $like->post_id = request('post_id');
        $like->user_id = $user->id;
        $like->save();
        return Posts::all();
    }

    public function destroylike(Request $request){
        $user = $request->user();
        Likes::where('post_id',$request->post_id)->where('user_id', $user->id)->delete();
        return Posts::all();
    }
    public function createdislike(Request $request){
        $user = $request->user();
        $like =  new Likes;
        $like->liked = 0;
        $like->post_id = request('post_id');
        $like->user_id = $user->id;
        $like->save();
        return Posts::all();
    }
    public function destroydislike(Request $request){
        $user = $request->user();
        Likes::where('post_id',$request->post_id)->where('user_id', $user->id)->delete();
        return Posts::all();
    }
}
