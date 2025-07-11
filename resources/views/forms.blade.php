<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@if(session('success'))
    <meta name="success-message" content="{{ session('success') }}">
@endif
    <title>لیست کاربران</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 " dir="rtl">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl">
        @auth
              <button id="delete-account-btn" class="bg-red-600 text-white px-4 py-2 rounded text-right">حذف حساب</button>
        @endauth
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">کاربران ثبت نام شده</h1>
                <form class="flex items-center gap-2 mb-6" action="/results" method="GET">
                    <input class="w-full px-4 py-2 border border-gray-300 rounded-md" type="text" name="search" placeholder="جست و جو ..." value="{{$search ?? '' }}">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300" type="submit">جستوجو</button>
                </form>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 table-auto text-right mb-6">
                        <thead class="text-center">
                            <tr class="bg-gray-200 text-gray-700">
                                <td class="px-4 py-2 border">نام</td>
                                <td class="px-4 py-2 border">ایمیل</td>
                                <td class="px-4 py-2 border">شماره تلفن</td>
                                <td class="px-4 py-2 border">تاریخ</td>
                                <td class="px-4 py-2 border">عملیات</td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($users as $user)
                            <tr id="user-row-{{ $user->id }}" class="border-b">
                            <td class="px-4 py-2 border">{{$user->name}}</td>
                            <td class="px-4 py-2 border">{{$user->email}}</td>
                            <td class="px-4 py-2 border">{{$user->phone}}</td>
                            <td class="px-4 py-2 border">{{$user->created_at->format('Y-m-d')}}</td>
                            <td class="px-4 py-2 border"><form id="delete-form-{{$user->id}}" method="POST" action="{{ route('users.destroy',$user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:text-red-800 delete-btn" data-id="{{$user->id}}">حذف</button>
                                </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$users->links()}}
            </div>
<script src="{{ asset('js/alert.js') }}"></script>
</body>
</html>