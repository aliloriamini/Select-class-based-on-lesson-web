@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">مدیریت محدودیت های درس</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('CourseClassRoom.create') }}"><button class="btn btn-sm btn-success">افزودن محدودیت های درس</button></a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">درس</th>
                    <th class="text-center">کاربری</th>
                    <th class="text-center">تعداد صندلی</th>
                    <th class="text-center">پروژکتور</th>
                    <th class="text-center">تخته هوشمند</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($CourseClassRooms as $CourseClassRoom)
                <tr>
                    <td>{{$CourseClassRoom->course }}</td>
                    <td>{{$CourseClassRoom->usage}}</td>
                    <td>{{$CourseClassRoom->chair_number}}</td>
                    <td>{{$CourseClassRoom->projector?'دارد':'ندارد'}}</td>
                    <td>{{$CourseClassRoom->smart_board?'دارد':'ندارد'}}</td>
                    <td>
                        <form action="{{ route('CourseClassRoom.destroy'  , ['id' => $CourseClassRoom->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('CourseClassRoom.edit' , ['id' => $CourseClassRoom->id]) }}"  class="btn btn-sm btn-primary">ویرایش</a>
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