<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>نتایج جست و جو</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6" dir="rtl">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg">
        <h2 class="text-xl font-bold mb-4">نتایج جست و جست:"{{$search}}"</h2>
        @if(($users->isEmpty()))
        <p class="text-gray-500">هیچ کاربری یافت نشد</p>
        @else
            <table class="w-full border border-gray-300 table-auto text-right">
                <thead>
                    <tr class="bg-gray-200">
                        <td class="w-full border border-gray-300 px-4 py-2">نام</td>
                        <td class="w-full border border-gray-300 px-4 py-2">ایمیل</td>
                        <td class="w-full border border-gray-300 px-4 py-2">شماره تلفن</td>
                        <td class="w-full border border-gray-300 px-4 py-2">تاریخ</td>
                        <td class="w-full border border-gray-300 px-4 py-2">عملیات</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->name}}</td>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->email}}</td>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->phone}}</td>
                    <td class="w-full border border-gray-300 px-4 py-2">{{$user->created_at->format('Y-m-d')}}</td>
                    <td class="px-4 py-2 border"><form id="delete-form-{{$user->id}}" method="POST" action="{{ route('users.destroy',$user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="text-red-600 hover:text-red-800 delete-btn" data-id="{{$user->id}}">حذف</button>
                        </form></td>                   
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="m-4">
            <a href="/forms" class="text-blue-600 hover:underline">بازگشت به فرم جست و جو</a>
        </div>
    </div>
<script src="{{ asset('js/alert.js') }}"></script>
</body>
</html>