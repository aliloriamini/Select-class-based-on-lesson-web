@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">مدیریت زمان آزاد استادها</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('prFreeTime.create') }}"><button class="btn btn-sm btn-success">افزودن زمان آزاد استاد</button></a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">روز</th>
                    <th class="text-center">نام استاد</th>
                    <th class="text-center">از ساعت</th>
                    <th class="text-center">تا ساعت</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prFreeTimes as $prFreeTime)
                <tr>
                    <td>{{$prFreeTime->day_name }}</td>
                    <td>{{$prFreeTime->pr_name }}</td>
                    <td>{{$prFreeTime->start_time_pr }}</td>
                    <td>{{$prFreeTime->end_time_pr}}</td>
                    <td>
                        <form action="{{ route('prFreeTime.destroy'  , ['id' => $prFreeTime->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('prFreeTime.edit' , ['id' => $prFreeTime->id]) }}"  class="btn btn-sm btn-primary">ویرایش</a>
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