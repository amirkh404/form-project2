<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتایج جست و جو</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg">
        <h2 class="text-xl font-bold mb-4">نتایج جست و جست:"{{$search}}"</h2>
        @if(($users->isEmpty()))
        <p class="text-gray-500">هیچ کاربری یافت نشد</p>
        @else
            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <td class="w-full border border-gray-300 px-4 py-2">نام</td>
                        <td class="w-full border border-gray-300 px-4 py-2">ایمیل</td>
                        <td class="w-full border border-gray-300 px-4 py-2">شماره تلفن</td>
                        <td class="w-full border border-gray-300 px-4 py-2">تاریخ</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->name}}</td>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->email}}</td>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->phone}}</td>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->created_at->format('Y-m-d')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="m-4">
            <a href="/forms" class="text-blue-600 hover:underline">بازگشت به فرم جست و جو</a>
        </div>
    </div>
    
</body>
</html>