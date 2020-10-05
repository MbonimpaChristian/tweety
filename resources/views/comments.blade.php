@extends('layouts.layouts')

@section('content')
<div class="col-md-8">
    <div class="row">
        <div class="col-md-8">
          <h6>{{$PostToBeCommented->user->Names}} Posted:</h6>
          <p>{{ $PostToBeCommented->post_text }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
           <h4>Post A Comment</h4>
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
           <form action="/comment" method="post">
            @csrf
            <input type="hidden" name="PostToBeCommented" value="{{ $PostToBeCommented->id }}">
             <div class="form-group">
                <textarea class="form-control" name="comment"></textarea>
             </div>
             <button class="btn btn-primary">Comment</button>
           </form>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-8">
           <h4 class="text-center">Comments</h4>
           @if($PostToBeCommented->comments()->count() > 0)
              <ul class="list-group">
                @foreach($PostToBeCommented->comments as $comment)
                  <li class="list-group-item">{{  $comment->user->Names}} : {{ $comment->comment }}</li>
                @endforeach
              </ul>
              @else
              <div class="alert alert-danger">
                <h5>This Post has no comments yet</h5>
                <div>
           @endif
        </div>
      </div>
</div>
@endsection
