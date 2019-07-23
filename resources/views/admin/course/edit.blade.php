@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش درس</h1>
        </div>

        <form action="{{ route('course.update', ['id' => $course->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="college_name">نام دانشکده</label>
                    <input type="text" class="form-control" id="college_name" name="college_name" placeholder="نام دانشکده" value="{{ $course->college_name }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="name">نام درس</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="نام درس" value="{{$course->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="group_name">نام گروه</label>
                    <input type="text" class="form-control" id="group_name" name="group_name" placeholder="نام گروه" value="{{$course->group_name}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="course_type">نوع درس</label>
                    <input type="text" class="form-control" id="course_type" name="course_type" placeholder="نوع درس" value="{{ $course->course_type }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="section">مقطع تحصیلی</label>
                    <input type="text" class="form-control" id="section" name="section" placeholder="مقطع تحصیلی" value="{{$course->section}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="term">ترم</label>
                    <input type="text" class="form-control" id="term" name="term" placeholder="ترم" value="{{$course->term}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="stu_number">تعداد دانشجویان</label>
                    <input type="number" class="form-control" id="stu_number" name="stu_number" placeholder="تعداد دانشجویان ثبت نامی" value="{{ $course->stu_number }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="theoretical">تعداد واحد نظری</label>
                    <input type="number" class="form-control" id="theoretical" name="theoretical" placeholder="تعداد واحد نظری" value="{{$course->theoretical}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="artificial">تعداد واحد عملی</label>
                    <input type="number" class="form-control" id="artificial" name="artificial" placeholder="تعداد واحد عملی" value="{{$course->artificial}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="coefficient_thr">ضریب واحد نظری</label>
                    <input type="number" class="form-control" id="coefficient_thr" name="coefficient_thr" placeholder="ضریب واحد نظری" value="{{ $course->coefficient_thr }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="coefficient_art">ضریب واحد عملی</label>
                    <input type="number" class="form-control" id="coefficient_art" name="coefficient_art" placeholder="ضریب واحد عملی" value="{{$course->coefficient_art}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="hour_thr">تعداد ساعات درس نظری</label>
                    <input type="number" class="form-control" id="hour_thr" name="hour_thr" placeholder="تعداد ساعات درس نظری" value="{{$course->hour_thr}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="hour_art">تعداد ساعات درس عملی</label>
                    <input type="number" class="form-control" id="hour_art" name="hour_art" placeholder="تعداد ساعات درس عملی" value="{{ $course->hour_art }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="course_day">روز هایی که درس میتواند تشکیل شود</label>
                    <input type="number" class="form-control" id="course_day" name="course_day" placeholder="روز هایی که درس میتواند تشکیل شود" value="{{$course->course_day}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="day_rep">تکرار زمانی مجاز بر حسب روز </label>
                    <input type="number" class="form-control" id="day_rep" name="day_rep" placeholder="تکرار زمانی مجاز بر حسب روز " value="{{$course->day_rep}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>

@endsection