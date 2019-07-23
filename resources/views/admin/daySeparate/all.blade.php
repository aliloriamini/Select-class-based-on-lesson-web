@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">تقسیم بندی روز ها</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('daySeparate.create') }}"><button class="btn btn-sm btn-success">افزودن تقسیم بندی</button></a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">روز</th>
                    <th class="text-center">از ساعت</th>
                    <th class="text-center">تا ساعت</th>
                    <th class="text-center">مجاز بودن</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($daySeparates as $daySeparate)
                <tr>
                    <td>{{$daySeparate->name }}</td>
                    <td>{{$daySeparate->start_time }}</td>
                    <td>{{$daySeparate->end_time}}</td>
                    <td>{{$daySeparate->available == 1 ? 'مجاز است': 'مجاز نیست'}}</td>
                    <td>
                        <form action="{{ route('daySeparate.destroy'  , ['id' => $daySeparate->id]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('daySeparate.edit' , ['id' => $daySeparate->id]) }}"  class="btn btn-sm btn-primary">ویرایش</a>
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