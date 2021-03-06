@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش روز</h1>
        </div>

        <form action="{{ route('days.update' , ['id' => $day->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">روز</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="نام کاربری" value="{{ $day->name }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="start_time">زمان شروع روز کاری</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{$day->start_time}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="end_time">زمان پایان روز کاری</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{$day->end_time}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>

@endsection