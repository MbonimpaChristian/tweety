<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/65f93404e5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    
    
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #ffffe6;
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
    }
    .btn-round-lg{
        border-radius: 22.5px;
        border-color: transparent;
        padding: 4% 30%;
        background-color: #1ab2ff;
        color: #fff;
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
                        <span class="Home"><i class="fas fa-home"></i><b>Home</b></span><br><br>
                        <span class="Home"><i class="fas fa-hashtag"></i><b>Explore</b></span><br><br>
                        <span class="Home"><i class="far fa-bell"></i><b>Notifications</b></span><br><br>
                        <span class="Home"><i class="far fa-envelope"></i><b>Messages</b></span><br><br>
                        <span class="Home"><i class="far fa-bookmark"></i><b>BookMarks</b></span><br><br>
                        <span class="Home"><i class="fas fa-list"></i><b>List</b></span><br><br>
                        <span class="Home"><i class="far fa-user"></i><b>Profile</b></span><br><br>
                        <div>
                            <button class="btn-tweet btn-round-lg btn-lg">Tweet</button>
                         </div>
                     </div>
                     <br>
                     


                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{route('logout')}}" method="POST" id="logout-form"
                        style="display: none">
                        {{csrf_field()}}
                    </form>

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