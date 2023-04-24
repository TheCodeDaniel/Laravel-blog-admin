<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new blog</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

@include('..dash.breaks.nav')

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <form action="{{ url('create') }}" method="post">
                    @if (Session::get('error'))
                    <div class="alert alert-danger"> {{ Session::get('error') }} </div>
                    @endif

                    @if (Session::get('success'))
                    <div class="alert alert-success"> {{ Session::get('success') }} </div>
                    @endif
                    <Label>Fill in details to create a new blog!</Label>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="blog_title" placeholder="title" value="{{ old('blog_title') }}">
                        <span class="text-danger"> @error('blog_title')
                            {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="blog_slug" placeholder="custom slug" value="{{ old('blog_slug') }}">
                        <span class="text-danger"> @error('blog_slug')
                            {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="form-group">
                        <textarea name="blog_description" placeholder="Post description" cols="30" rows="10" class="form-control"></textarea>
                        <span class="text-danger"> @error('blog_description')
                            {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn block"> Create post &plus; </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>