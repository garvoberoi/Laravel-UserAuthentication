<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>SIGN UP</title>
</head>
<body>
<div class="login-body">
    <div>
    @if(Session::has('failure')) 
        {{ session('failure') }} 
    @endif
        <div class="main-cont">
            <h2>SIGN UP</h2>
            <form action="{{route('registerUser')}}" method="POST">
                @csrf
                <input type="text" placeholder="Username" name="name" class="input-login" value="{{old('name')}}">
                <input type="text" placeholder="Email" name="email" class="input-login" value="{{old('email')}}">
                <input type="password" placeholder="Password" name="password" class="input-login">
                <input type="password" placeholder="Confirm Password" name="confirm_password" class="input-login">
                <button type="submit" class="login-btn">Sign In</button>
            </form>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        <h4>Already a User? <a href="/login">LOG IN</a></h4>
    </div>
</div>
</body>
</html>