<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog setting</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

@include('..dash.breaks.nav')

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10">
                <form action="{{ route('update',$data->id) }}" method="post">
                    @if (Session::get('error'))
                    <div class="alert alert-danger"> {{ Session::get('error') }} </div>
                    @endif
                    <Label>Fill in details to create a new blog!</Label>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="blog_title" placeholder="title" value="{{ $data->title }}">
                        <span class="text-danger"> @error('blog_title')
                            {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="blog_slug" placeholder="custom slug" value="{{ $data->slug }}">
                        <span class="text-danger"> @error('blog_slug')
                            {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="form-group">
                        <textarea name="blog_description" placeholder="Post description" cols="30" rows="8" class="form-control">{{ $data->description }}</textarea>
                        <span class="text-danger"> @error('blog_description')
                            {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn block"> Update post </button>
                    </div>
                </form>
                <form action="{{ route('deletepost',$data->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn block"> Delete post &times; </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>