@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش استاد</h1>
        </div>

        <form action="{{ route('professor.update' , ['id' => $professor->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="personal_code">شماره پرسنلی</label>
                    <input type="text" class="form-control" id="personal_code" name="personal_code" placeholder="شماره پرسنلی" value="{{ $professor->personal_code }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="نام" value="{{$professor->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">نام خانوادگی</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="نام خانوادگی" value="{{$professor->last_name}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="max_time_work">حداکثر کل ساعات تدریس استاد</label>
                    <input type="text" class="form-control" id="max_time_work" name="max_time_work" placeholder="حداکثر کل ساعات تدریس استاد" value="{{
                    $professor->max_time_work}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="pr_day_repeat">تکرار زمانی مجاز بر حسب روز</label>
                    <input type="number" class="form-control" id="pr_day_repeat" name="pr_day_repeat" placeholder="تکرار زمانی مجاز بر حسب روز" value="{{
                    $professor->pr_day_repeat}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>

@endsection