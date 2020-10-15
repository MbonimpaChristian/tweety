@extends('layouts.layouts')

@section('content')
<div class="col-md-6">
    <div class="row">
        <div class="col-md-8">
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
            <h3>{{$user->Names}}</h3>
             <b>{{$user->username}}</b>
        </div>
        <div class="col-md-4">
           <a href="/editProfile" class="btn btn-primary btn-block">Edit Profile</a>
        </div>
    </div>
</div>
<div class="col-md-2 offset-md-1">
    <h3><b>Friends</b></h3>
    <br>
        @foreach($users as $user)
        @if(Auth()->user()->id!= $user->id)
         <div class="row">
             <div class="col-md-7">
             <a href=""><p class="lead"><b>{{$user->username}}</b></p></a>
             </div>
             <div class="form-group">
                <h3 class="btn btn-post btn-primary float-right">Follow</h3>
              </div>
         </div>
        @endif
        @endforeach
   </div>
@endsection
