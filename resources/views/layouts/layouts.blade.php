<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/65f93404e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    
    
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitter</title>
</head>
<style>
    body{
        background-color: #fdfdfc;
    }
    .fa-twitter{
        font-size:35px;
        color: 	 #1ab2ff;
    }
    .Icons{
        margin-top: 10%;
    }
    .Home{
        font-size: 20px;
        margin-top: 10%;
    }
    .Home b{
        margin-left: 20px;
        text-align: right;
    }
    .Home:hover{
        border:1px solid #80d4ff;
        background-color: #80d4ff;
        color: 	 #0088cc;
        border-radius: 20px;
        padding:4%;
        cursor: pointer;
    }
    .form-rounded {
     position: relative;
     border-radius: 1rem;
     border-color: none;
     background: #e0ebeb;
    }
</style>
<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-3">
                <i class="fab fa-twitter"></i>
                <br>
                 <div class="row Icons">
                     <div class="col-md-12">
                        <span class="Home"><i class="fas fa-home"></i><b><a href="/dashboard">Home</a></b></span><br><br>
                        <span class="Home"><i class="fas fa-hashtag"></i><b>Explore</b></span><br><br>
                        <span class="Home"><i class="far fa-user"></i><b><a href="/profile">Profile</a></b></span><br><br>

                        <div>
                        <span class="Home"><i class="fas fa-sign-out-alt"></i><a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><b>Logout</b></a>
                        <form action="{{route('logout')}}" method="POST" id="logout-form"
                        style="display: none">
                        {{csrf_field()}}
                    </form>
                        </span>
                        </div>
                    </div>
                 </div>
            </div>
            @yield('content')
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>