<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    @vite('resources/css/app.css') <!-- if using Vite -->
</head>
<body class="bg-gray-100 text-gray-700 font-sans">

    <header class="bg-white p-4 shadow">
        <h1 class="text-2xl font-bold">Library Management</h1>
    </header>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

</body>
</html>