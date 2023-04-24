<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

@include('..dash.breaks.nav')

<body>

    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Blog name</th>
                        <th>slug</th>
                        <th>creation date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $posts)
                    <tr>
                        <td> <a href="{{ route('set', $posts->id) }}" class="text-dark">{{ $posts->title }}</a> </td>
                        <td> {{ $posts->slug }} </td>
                        <td> {{ $posts->created_at }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>