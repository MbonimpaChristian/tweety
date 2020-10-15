
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
    .fa-thumbs-up {
        font-size:24px;
    }
    .fabutton {
     background: none;
     padding: 0px;
     border: none;
}
.fa-thumbs-down{
        font-size:24px;
    }
</style>
@extends('layouts.layouts')

@section('content')
<div class="col-md-5">
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
                <button class="btn btn-post btn-primary float-right">Publish</button>
            </form>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            @if(count($posts) > 0)
              @foreach($posts as $post)
                <div class="row post_list" style="border-radius:10%; border:1px solid #1ab2ff">
                    <div class="col-md-2">
                        picture
                    </div>
                    <div class="col-md-10">
                        <p><b>{{$post->user->Names}}</b></p>
                        <p>{{$post->post_text}}</p>
                        <div class="row">
                            <div class="col-md-2">
                                Likes:{{ $post->likes->count() }}
                              @if($userLikeCount > 0)
                              @if($userLikes->posts->contains($post->id))
                              <?php $form_class = $post->id ?>
                                 <button class="fabutton" onclick = "document.getElementById('{{ $form_class }}').submit();">
                                    <i class="far fa-thumbs-down"></i>
                                </button>
                                 <form id="{{ $form_class }}" action="/dislike" method="POST" style="display: none">
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="postToDislike" value="{{ $post->id}}" >
                                  {{csrf_field()}}

                              </form>

          @else
          <form action="/like" method="post">
            @csrf
           <input type="hidden" name="Post_id" value="{{$post->id}}">
                <button type="submit"  class="fabutton">
                    <i class="far fa-thumbs-up"></i>
                    {{-- like --}}
                </button>
         </form>
        @endif
                              @else
                              <form action="/like" method="post">
                                @csrf
                               <input type="hidden" name="Post_id" value="{{$post->id}}">
                                    <button type="submit"  class="fabutton">
                                        <i class="far fa-thumbs-up"></i>

                                    </button>
                             </form>
                              @endif
                            </div>
                            <div class="col-md-6 offset-md-4">
                                Comments:{{ $post->comments->count() }}
                                <form action="/comment" method="get">
                                    <input type="hidden" name="PostToBeCommented" value={{ $post->id }}>
                                    <button type='submit' class="btn btn-success">comment</button>
                                </form>
                                @if($post->User_id == Auth()->user()->id)
                                <a href="{{route('posts.edit',$post->id)}}" class="text-primary">Edit</a>
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
                        </div>
                    </div>
                </div>
              @endforeach
            @else
            <h3 class="text-center text-danger">No Posts Yet</h3>
            @endif
        </div>
    </div>
</div>


<div class="col-md-3 offset-md-1">
 <h3><b>Friends</b></h3>
 <br>
     @foreach($users as $user) 
     {{-- @foreach ($followers->$following as $Follower)  --}}
     @if(Auth()->user()->id!= $user->id)
      <div class="row">
          <div class="col-md-8">
          <a><p class="lead"><b>{{$user->username}} </b></p></a>
          </div>
          @if(Auth()->user()->following()->find($user))
          <div class="form-group">
            <a href="{{route('unfollow', ['id'=>$user->id])}}" class="btn btn-post btn-primary float-right">Unfollow</a>
          </div>
          @else
          <div class="form-group">
            <a href="{{route('follow', ['id'=>$user->id])}}" class="btn btn-post btn-primary float-right">follow</a>
          </div>
          @endif
      </div>
     @endif
     {{-- @endforeach --}}
     @endforeach
</div>
{{-- @foreach(auth()->user()->follows as $user)
     @if(Auth()->user()->id!= $user->id)
      <div class="row">
          <div class="col-md-8">
          <a href=""><p class="lead"><b>{{$user->username}} </b></p></a>
          </div>
          {{-- <div class="form-group"> --}}
              {{-- <form method="POST" action="/Profile/{{$user->Names}}/follower">
                @csrf
            <h3 class="btn btn-post btn-primary float-right">Follow</h3>
          {{-- </div> --}}
        {{-- </form>
      </div>
     @endif
     @endforeach --}}
{{-- </div> --}}


@endsection

<!-- Button trigger modal -->


  <!-- Modal -->
