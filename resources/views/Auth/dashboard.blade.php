<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>DASHBOARD</title>
</head>
<body>
<div class="login-body">
    <div>
    <!--@if(Session::has('failure')) 
        {{ session('failure') }} 
    @endif-->
        <div class="main-cont">
            <h2>Welcome to Dashboard, {{$data->name}}</h2>
            
            <!--@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach-->
        </div>
        <h4>Want to logout? <a href="/logout">LOG OUT</a></h4>
    </div>
</div>
</body>
</html>