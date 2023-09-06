@extends('layout/app')
@section('titel','index')

@section('content')
    <h3>بيانات موظفي العيادة</h1>
    <table>
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الإسم</th>
                <th>رقم الهاتف</th>
                <th>البريد الإلكتروني</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->user_full_name }}</td>
                    <td>{{ $user->user_mobile }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">تعديل البيانات </a>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">عرض كامل البيانات</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل بالفعل تريد حذف هذا الموظف?')">حذف الموظف</button>
                            </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection