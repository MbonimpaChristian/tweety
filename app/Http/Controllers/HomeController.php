<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;


class HomeController extends Controller
{
    public function index()
    {
    $users = User::get();
    $posts = Post::with('user')->latest()->get();
     $user_id = Auth()->user()->id;
     $userLikes = Like::where('User_id',$user_id)->with('posts')->first();
     $userLikeCount = Like::where('User_id',$user_id)->with('posts')->count();
    //  if(!$userLikes || $userLikes->posts()->count() == 0)
    //  {
    //       return view('app')->with('posts',$posts)->with('users',$users);
    //  }
    //  else
    //  {
        return view('app')->with('posts',$posts)->with('users',$users)
        ->with('userLikes',$userLikes)->with('userLikeCount',$userLikeCount);
    //  }
    }
    public function like(Request $req)
    {

        $user_id = Auth()->user()->id;
        $post_id = $req->input('Post_id');
        $userLikeAccount = Like::where('User_id',$user_id)->first();
        if(!$userLikeAccount)
        {
            $LikeAccount = Like::create([
               'User_id'=>$user_id
            ]);
          if($LikeAccount)
          {
              $LikeAccount->posts()->attach($post_id);
          }
          return back();
        }
        else
        {
            if(!$userLikeAccount->posts->contains($post_id))
            {
                $userLikeAccount->posts()->attach($post_id);
                return back();
            }
        }



    }
    public function dislike(Request $req)
    {
        $user_id = Auth()->user()->id;
        $userLikeAccount = Like::where('User_id',$user_id)->first();
        $postToDislike = $req->input('postToDislike');
        $userLikeAccount->posts()->detach($postToDislike);
        return back();

    }

}
