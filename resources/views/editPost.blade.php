@extends('layouts.layouts')

@section('content')
<div class="col-md-6">
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
<form action="{{route('posts.update',[$postToEdit->id])}}" method="POST">
  @csrf
  <input type="hidden" name="_method" value="put">
  <div class="form-group">
    <h3 class="text-center">Edit Post</h3>
    <textarea class="form-control" rows="3" name="post">
        {{$postToEdit->post_text}}
    </textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update Post</button>
</form>
</div>
@endsection