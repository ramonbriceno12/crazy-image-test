<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center py-16 px-4">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-gray-800">Create an Account</h2>

        @if ($errors->any())
            <div class="p-4 text-sm text-red-600 bg-red-100 rounded">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="w-full px-3 py-2 mt-1 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 mt-1 border rounded-md" required>
            </div>

            <div class="flex gap-4">
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" class="w-full px-3 py-2 mt-1 border rounded-md" required>
                </div>

                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="dob" class="w-full px-3 py-2 mt-1 border rounded-md" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" class="w-full px-3 py-2 mt-1 border rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" class="w-full px-3 py-2 mt-1 border rounded-md" required>
                    <option value="">-- Select Role --</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" name="profile_picture" class="mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 mt-1 border rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 mt-1 border rounded-md" required>
            </div>

            <button type="submit" class="w-full py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md">
                Sign Up
            </button>
        </form>
    </div>

</body>
</html>
