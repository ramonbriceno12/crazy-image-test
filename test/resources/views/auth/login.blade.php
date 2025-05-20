<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-16 px-4">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>

        @if (session('error'))
            <div class="p-4 text-sm text-red-600 bg-red-100 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 mt-1 border rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 mt-1 border rounded-md" required>
            </div>

            <button type="submit" class="w-full py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                Login
            </button>
        </form>
    </div>

</body>
</html>
