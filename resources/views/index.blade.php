<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
    @vite('resources/css/app.css')
</head>
<body class="text-center px-8 py-12">
    <h1> Hello There!! </h1><br><br>
    <a href="{{ route('authors.index') }}" class="btn">
    View Authors
    </a>
</body>
</html>