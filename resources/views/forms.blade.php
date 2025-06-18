<div class="container">
                <h1>لیست فرم ها</h1>
                <form action="/search-results" method="GET">
                    <input type="text" name="search" placeholder="جست و جو ..." value="{{$search ?? '' }}">
                    <button type="submit">جست و جو</button>
                </form>
            </div>
<table>
        <thead>
            <tr>
                <td>نام</td>
                <td>ایمیل</td>
                <td>شماره تلفن</td>
                <td>تاریخ</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->created_at->format('Y-m-d')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}