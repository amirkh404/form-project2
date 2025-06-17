<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروژه فرم ثبت نام</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">فرم ثبت نام</h2>
        <form action="/register" method="POST" class="space-y-4">
            @if($errors->any())
        <div class="bg-red-100 border-red-400 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
            @csrf
            <div>
                <label for="name" class="block mb-1 text-gray-700">نام</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="name" class="block mb-1 text-gray-700">ایمیل</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="name" class="block mb-1 text-gray-700">شماره تلفن</label>
                <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="name" class="block mb-1 text-gray-700">رمز</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="name" class="block mb-1 text-gray-700">تایید رمز</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transetion duration-300">ثبت نام</button>
            </div>
        </form>
    </div>
</body>
</html>