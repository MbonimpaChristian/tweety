<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->input('post');
        if(empty($post)){
            return back()->with('danger','please post something');
        }else{
            $newPost = Post::create([
              'user_id'=>Auth()->user()->id,
              'post_text'=>$post
            ]);
            if($newPost){
                return back()->with('success','post posted successful');  
            }else{
                return back()->with('danger','please try again'); 
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postToEdit = Post::find($id);
        return view('editPost')->with('postToEdit',$postToEdit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $postToUpdate = $request->input('post');
        if(empty($postToUpdate)){
            return back()->with('danger','please provide a post'); 
        }else{
            $newPost = Post::where('id',$post->id)->update([
                'post_text'=>$postToUpdate
            ]);
            if($newPost){
                return redirect('/dashboard')->with('success','post updated successful');  
            }else{
                return back()->with('danger','please try again'); 
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            return redirect('/dashboard')->with('success','post deleted successful');  
        }else{
            return back()->with('danger','please try again'); 
        }
    }
}
