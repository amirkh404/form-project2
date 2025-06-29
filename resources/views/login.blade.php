<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="/login" method="POST" class="max-w-md mx-auto mt-10 p-6 bg-white rounded">
        @csrf
        <h2 class="text-xl mb-4">ورود</h2>
        @if($errors->any())
            <div class="text-red-500 text-sm mb-4">
                {{$errors->first()}}
            </div>
        @endif

        <div class="mb-4">
            <label for="email">ایمیل</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label for="password">رمز</label>
            <input type="password" name="password" id="password" value="{{old('password')}}" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">ورود</button>
    </form>
</body>
</html>