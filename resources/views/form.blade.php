<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/')}}/register" method="post">
        @csrf
       
    <div class="container">
        
        <x-input type="text" name="name" label="Please enter your name" />
        <x-input type="email" name="email" label="Please enter your email" />
        <x-input type="password" name="password" label="Please enter your password" />
        <x-input type="password" name="password_confir" label="Confirm Password." />
        
        <button class="btn btn-primary">
            Submit
        </button>
    </div>
    </form>
</body>
</html>