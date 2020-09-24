
<style>
   .post{
       margin-top: 40px;
       padding: 5%;
       border:1px solid #1ab2ff;
       border-radius: 10%;
   }
   .post textarea{
       border: none;
       background-color: #ffffe6;
       border-bottom: 1px solid #000; 
   }
   .post textarea:focus{
      border: none;
       background-color: #ffffe6;
       border-bottom: 1px solid #000;
   }
    .btn-primary{
        background-color: #1ab2ff;
    }
    .jumbotron{
        background-color: #ffffe6;
    }
    .post_list{
        padding: 10px;
        margin-top: 5%;
        border: 1px solid #000;
    }
</style>
@extends('layouts.layouts')

@section('content')
<div class="col-md-5 ">
    <div class="row">
        <div class="col-md-9 offset-md-2 post">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
        
            <div class="alert alert-{{ $msg }}  alert-dismissible fade show" role="alert">
                {{ Session::get($msg) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @endforeach
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
                <textarea name="post" placeholder="what's new?" cols="40" rows="2"></textarea>
                <br><br>
                <button class="btn btn-post btn-primary float-right">Post</button>
            </form>
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 offset-md-2">
           @if(count($posts) > 0)
           @foreach($posts as $post)
      
            <div class="row post_list">
                <div class="col-md-2">
                    picture
                </div>
                <div class="col-md-10">
                    <p><b>{{$post->user->Names}}</b></p>
                <p>{{$post->post_text}}</p>
                </div>
                @if($post->user_id == Auth()->user()->id)
            <a href="{{route('posts.edit',$post->id)}}" class="text-primary">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php $form_class = $post->id ?>
            <a class="text-danger" href="" onclick="var result = confirm('Are you sure you want delete this post?'); if( result ){ event.preventDefault(); document.getElementById('{{ $form_class }}').submit(); }else{event.preventDefault();}">
                Delete
            </a>
            <form id="{{ $form_class }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}}

            </form>
               @endif
            </div>
            @endforeach
           @else
           <h3 class="text-center text-danger">No Posts Yet</h3>
           @endif
        </div>
    </div>
</div>

  
<div class="col-md-3 offset-md-1">
 <h3 class="text-center"><b>Friends</b></h3>
 <br>
     @foreach($users as $user)
     @if(Auth()->user()->id!= $user->id)
      <div class="row">
          <div class="col-md-4">
          <p class="lead"><b>{{$user->username}}</b></p>
          </div>
          <div class="col-md-4 offset-md-4">
            <a href="{{route('login')}}" class="btn-tweet btn-round-lg btn-lg">follow</a>
          </div>
      </div>
     @endif
     @endforeach
</div>    
@endsection

<!-- Button trigger modal -->

  
  <!-- Modal -->
  