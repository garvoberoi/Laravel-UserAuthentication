<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>LOG IN</title>
</head>
<body>
<div class="login-body">
    <div>
        @if(Session::has('failure')) 
            {{ session('failure') }} 
        @endif
        @if(Session::has('success')) 
            {{ session('success') }} 
        @endif
        <div class="main-cont">
            <h2>LOG IN</h2>
            <form action="{{route('loginUser')}}" method="POST">
                @csrf
                <input type="email" placeholder="Email" name="email" class="input-login" value="{{old('email')}}">
                <input type="password" placeholder="Password" name="password" class="input-login">
                <button type="submit" class="login-btn">Log In</button>
            </form>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        <h3>Not a user yet? <a href="/signup">Register Here</a></h3>
    </div>    
</div>
</body>
</html>