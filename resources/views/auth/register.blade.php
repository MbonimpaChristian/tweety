<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/65f93404e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
     .left{
        float: left;
        background-color: #1ab2ff;
        min-width: 50%;
    }
    .row1{
        flex: 1;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 50%
    }
    .column{
        color: #fff;
        display: inline-block;
        font-size: 18px;
        margin-top: 20px;

    }
    .fa-twitter{
        font-size:35px;
        color: 	 #1ab2ff;
    }
    .col-right{
        margin-top: 20%;
    }
    .btn-round-lg{
        border-radius: 22.5px;
        border-color: transparent;
        padding: 2% 40%;
        background-color: #1ab2ff;
        color: #fff;
    }
    .btn-round-lg:hover{
        text-decoration: none;
        background-color: #0088cc;
        color: #fff;
    }
    .btn-round-lg2:hover{
        background-color: 	 #ccebff;
        text-decoration: none;
        color: #1ab2ff;
    }
    .btn-round-lg2{
        border-radius: 22.5px;
        border:2px solid #1ab2ff;
        padding: 2% 40%;
        background-color: #fff;
        color: #1ab2ff;
    }
</style>
<body>
   <div class="container-fluid">
    <div class="row">
     <div class="col-md-6 left">
       <div class="row row1">
        <div class="column col-md-12">
            <i class="fas fa-search"></i>
            <span><b>Follow Your Interests</b></span>
        </div>    
        <div class="column col-md-12">
            <i class="fas fa-user-friends"></i>
            <span><b>Hear what people are talking about</b></span>
        </div>
        <div class="column col-md-12">
            <i class="fas fa-comment-dots"></i>
             <span><b>Join the conversation</b></span>
        </div>
    </div> 
    <br><br><br><br><br><br><br><br><br><br><br>
     </div>
    <div class="col-md-4 offset-md-1">
        <div class="col-right">
            <i class="fab fa-twitter"></i><br><br>
            <h2 class="text-center" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"><b>SIGN UP</b></h2>
        <form action="{{route('register')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Names</label>
                <div class="{{$errors->has('Names') ? 'has-error':''}}">
                <input type="text" name="Names" class="form-control" placeholder="Enter your Names">
                @if($errors->has('Names'))
                <span class="help-block">
                <strong class="text-danger">{{$errors->first('Names')}}</strong>
                </span>
                @endif
            </div>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <div class="{{$errors->has('username') ? 'has-error':''}}">
                    <input type="text" autocomplete="off" name="username" class="form-control" placeholder="choose a username">
                    @if($errors->has('username'))
                <span class="help-block">
                <strong class="text-danger">{{$errors->first('username')}}</strong>
                </span>
                @endif
            </div>
                  </div>
                <div class="form-group">
                  <label>Email address</label>
                  <div class="{{$errors->has('email') ? 'has-error':''}}">
                  <input type="email" class="form-control"placeholder="Enter email" name="email">
                  @if($errors->has('email'))
                <span class="help-block">
                <strong class="text-danger">{{$errors->first('email')}}</strong>
                </span>
                @endif
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="{{$errors->has('password') ? 'has-error':''}}">
                  <input type="password" autocomplete="off" class="form-control" placeholder="Password" name="password">
                  @if($errors->has('password'))
                  <span class="help-block">
                  <strong class="text-danger">{{$errors->first('password')}}</strong>
                  </span>
                  @endif
                  </div>
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" class="form-control" placeholder="Repeat Password" name="password_confirmation">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                  <p class="text-center"><a href="{{route('login')}}"  style="text-decoration: none">Already have an account?</a></p>
              </form>
        </div>
     </div>
     <!--sign up Modal-->
 
     {{-- <div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
        {{-- <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Sign Up for Twitter</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Names</label>
                        <input type="text" name="Names" class="form-control" placeholder="Enter your Names">
                      </div>
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control"placeholder="Enter email" name="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div> --}}
      </div>

     <!-- end of sign up Modal-->    
    </div>    
   </div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>