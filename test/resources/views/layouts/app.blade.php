<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-7xl mx-auto flex justify-between">
            <a href="/" class="font-bold text-lg text-gray-800">Laravel App</a>
            <div>
                <a href="{{ route('students.index') }}" class="text-blue-600 hover:underline">Students</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>
