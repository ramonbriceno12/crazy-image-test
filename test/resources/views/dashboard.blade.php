<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-16 px-4">
    <div class="p-8 max-w-md w-full bg-white rounded-xl shadow-xl text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Welcome, {{ auth()->user()->name }}!
        </h1>

        @if(auth()->user()->role === 'admin')
            <p class="text-lg text-blue-600">You are logged in as <strong>Administrator</strong>.</p>
        @elseif(auth()->user()->role === 'manager')
            <p class="text-lg text-green-600">You are logged in as <strong>Manager</strong>.</p>
        @endif

        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</body>
</html>
