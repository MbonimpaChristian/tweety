<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Rules\NotInteger;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function profile()
    {
        $users = User::get();
        return view('Profile')->with('user',Auth()->user())
        ->with('users',$users);
    }
    public function editProfile()
    {
        $users = User::get();
        return view('editProfile')->with('user',Auth()->user())
        ->with('users',$users);
    }
    public function updateProfile(Request $req)
    {   
        // $this->validate($req,[
        //     'names'=>'required|string',
        //     'username'=>'required|string',
        //     'email'=>'required|string'
        // ]);  
        
     //return gettype($req->input('names'));
     

       $user = Auth()->user()->id;
        $Names = $req->input('names');
        $username = $req->input('username');
        $email = $req->input('email');
// code for use when those one are failed
$validatedData = $req->validate([
    'names'=>['required','string',new NotInteger],
    'username'=>['required','string'],
    'email'=>['required','string']
]);
        // dd($Names);
        // return gettype($Names);
        // return $username;
    //    if(gettype($Names)=="number"){
    //     return back()->with('danger','please your name must be a string');
    //    }
    //    else{
           
    //    }
    //   
    // this used for message validation
    //    else{
    //        return $Names;
    //    }
    //  $username = $req->input('username');
    //     $email = $req->input('email');

    // $user = Auth()->user(); 

        // if(empty($Names)||empty($username)||empty($email))
        // {
        //     return back()->with('danger','please fill all forms');
        // }
        // else
        // {
         $userToUpdate = User::where('id',$user)->update([
             'Names'=>$validatedData["names"],
             'username'=>$validatedData["username"],
             'email'=>$validatedData["email"]
         ]);

        // those when a validation has been failed
        //  if($userToUpdate)
        //  {
        //      return redirect('/profile')->with('success','Profile updated successful');
        //  }
        if($userToUpdate)
         {
             return redirect('/profile')->with('success','Profile updated successful');
         }
        }
    
    
    public function getComment(Request $req)
    {
        $post = $req->input('PostToBeCommented');
        $PostToBeCommented = Post::with('user')->with('comments')->where('id',$post)->first();
        return view('comments')->with('PostToBeCommented',$PostToBeCommented);
        //return $PostToBeCommented;
    }
    public function postComment(Request $req)
    {
        $comment = $req->comment;
        $post = $req->PostToBeCommented;
        if(empty($comment))
        {
            return back()->with('danger','please a comment can t be empty');
        }
        else
        {
            $newComment = Comment::create([
               'user_id'=>Auth()->user()->id,
               'post_id'=>$post,
               'comment'=>$comment
            ]);
            if($newComment)
            {
                return back()->with('success','commented successful');
            }
            else{
                return back()->with('danger','please try again');
            }
        }
    }

    public function follow(Request $req){
        $id=$req->id;
        $follower=Auth()->user();
        $following=User::find($id);
        $follower->following()->attach($following);
        return back()->with('success','following successful');
    }

    public function unfollow(Request $req){
        $id=$req->id;
        $follower=Auth()->user();
        $following=User::find($id);
        $follower->following()->detach($following);
        return back()->with('success','unfollowing successful');
    }

}
