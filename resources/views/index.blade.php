<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-5">
                <h4>Admin Login</h4>

                <form action="{{ url('/login') }}" method="post">
                    @if (Session::get('error'))
                    <div class="alert alert-danger"> {{ Session::get('error') }} </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                        <span class="text-danger">@error('name')
                            {{ $message }}
                            @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="text-danger">@error('password')
                            {{ $message }}
                            @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark btn-block" type="submit"> Login </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>