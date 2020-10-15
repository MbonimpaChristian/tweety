@extends('layouts.layouts')

@section('content')
<div class="col-md-6">
    <div class="row">
        <div class="col-md-8">
            <h3>{{$user->Names}}</h3>
             <b>{{$user->username}}</b>
        </div>
     
    </div>
    <br>
    <div class="row">
        @include('layouts.messages')
        <div class="col-md-12">
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
            <h4 class="text-center">Edit Your Profile</h4>
            <form action="/updateProfile" method="POST">
                @csrf
                <div class="form-group">
                  <label>Names</label>
                <input type="text"  name="names" value="{{$user->Names}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>username</label>
                  <input type="text" name="username" value="{{$user->username}}" class="form-control">
                  </div>
                <div class="form-group">
                    <label>Email</label>
                  <input type="email" name="email" value="{{$user->email}}" class="form-control">
                  </div>

                <button type="submit" class="btn btn-primary btn-block">Edit your Profile</button>
              </form>
        </div>
    </div>
</div>
<div class="col-md-2 offset-md-1">
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
        {{-- @foreach($users as $user)
        @if(Auth()->user()->id!= $user->id)
         <div class="row">
             <div class="col-md-7">
             <a href=""><p class="lead"><b>{{$user->username}}</b></p></a>
             </div>
             <div class="form-group">
                <h3 class="btn btn-post btn-primary float-right">Follow</h3>
              </div>
         </div>
        @endif --}}
        @endforeach
   </div>
@endsection