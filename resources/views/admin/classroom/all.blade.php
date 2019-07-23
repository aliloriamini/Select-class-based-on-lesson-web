@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">مدیریت اتاق ها</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('classroom.create') }}"><button class="btn btn-sm btn-success">افزودن اتاق</button></a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">شماره اتاق</th>
                    <th class="text-center">کاربری</th>
                    <th class="text-center">ساختمان</th>
                    <th class="text-center">طبقه</th>
                    <th class="text-center">تعداد صندلی</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classrooms as $classroom)
                <tr>
                    <td>{{$classroom->class_number }}</td>
                    <td>{{$classroom->usage}}</td>
                    <td>{{$classroom->building}}</td>
                    <td>{{$classroom->floor}}</td>
                    <td>{{$classroom->chair_number}}</td>
                    <td>
                        <form action="{{ route('classroom.destroy'  , ['id' => $classroom->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('classroom.edit' , ['id' => $classroom->id]) }}"  class="btn btn-sm btn-primary">ویرایش</a>
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