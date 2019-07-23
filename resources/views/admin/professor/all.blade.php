@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">مدیریت اساتید</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('professor.create') }}"><button class="btn btn-sm btn-success">افزودن استاد</button></a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">شماره پرسنلی</th>
                    <th class="text-center">نام</th>
                    <th class="text-center">نام خانوادگی</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->personal_code }}</td>
                    <td>{{$professor->name}}</td>
                    <td>{{$professor->last_name}}</td>
                    <td>
                        <form action="{{ route('professor.destroy'  , ['id' => $professor->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('professor.edit' , ['id' => $professor->id]) }}"  class="btn btn-sm btn-primary">ویرایش</a>
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection