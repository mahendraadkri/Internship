<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-sm">
                <a class="navbar-brand" href="#" style="color: white">WsCube Tech</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsinleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}" style="color: white">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register')}}" style="color: white">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/customer')}}" style="color: white">Customer</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <form action="{{ route('customer.store') }}" method="post">
    @csrf
    <h2 class="textcenter text-primary">{{$title}}</h2>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required value="{{$customer ? $customer->name: ''}}">
    


    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="{{$customer ? $customer->email: ''}}">

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male" {{ optional($customer)->gender == "M" ? "selected" : "" }}>Male</option>
        <option value="female" {{ optional($customer)->gender == "F" ? "selected" : "" }}>Female</option>
        <option value="other" {{ optional($customer)->gender == "O" ? "selected" : "" }}>Other</option>
    </select>

   

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required value="{{$customer ? $customer->address: ''}}">
    

    <label for="state">State:</label>
    <input type="text" id="state" name="state" required value="{{$customer ? $customer->state: ''}}">

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" required value="{{$customer ? $customer->country: ''}}">

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required value="{{$customer ? $customer->dob: ''}}">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>

    <button type="submit">Register</button>
</form>
</body>
</html>
