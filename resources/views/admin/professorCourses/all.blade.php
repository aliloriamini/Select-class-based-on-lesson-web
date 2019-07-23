@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">دروس ارایه شده</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('professorCourse.create') }}"><button class="btn btn-sm btn-success">افزودن دروس ارایه</button></a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">استاد</th>
                    <th class="text-center">درس</th>
                    <th class="text-center">نوع درس</th>
                    <th class="text-center">ساعات تدریس</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($professorCourses as $professorCourse)
                <tr>
                    <td>{{$professorCourse->professor_id}}</td>
                    <td>{{$professorCourse->course_id}}</td>
                    <td>{{$professorCourse->course_type == 0 ? 'عملی': ''}}{{$professorCourse->course_type == 1 ? 'تیوری': ''}}{{$professorCourse->course_type == 2 ? 'عملی و تیوری ':''}}</td>
                    <td>{{$professorCourse->course_hour}}</td>
                    <td>
                        <form action="{{ route('professorCourse.destroy'  , ['id' => $professorCourse->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('professorCourse.edit' , ['id' => $professorCourse->id]) }}"  class="btn btn-sm btn-primary">ویرایش</a>
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