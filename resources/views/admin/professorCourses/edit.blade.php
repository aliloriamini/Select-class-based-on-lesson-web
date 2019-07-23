@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش دروس ارایه</h1>
        </div>

        <form action="{{ route('professorCourse.update' , ['id' => $professorCourse->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="professor_id">استاد</label>
                    <select  name="professor_id" class="browser-default custom-select">
                        @foreach($professors as $professor)
                            <option value="{{$professor->id}}" {{ $professorCourse->professor == $professor->id ? 'selected' : '' }}>{{$professor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="course_id">درس</label>
                    <select  name="course_id" class="browser-default custom-select">
                        @foreach($courses as $course)
                            <option value="{{$course->id}}" {{ $professorCourse->course == $course->id ? 'selected' : '' }}>{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="course_type">نوع درس</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="course_type1" name="course_type" value="0"  {{ $professorCourse->course_type=="0" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="course_type1">عملی</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="course_type2" name="course_type" value="1"  {{ $professorCourse->course_type=="1" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="course_type2">تیوری</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="course_type3" name="course_type" value="2"  {{ $professorCourse->course_type=="2" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="course_type3">عملی و تیوری</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="course_hour">ساعات تدریس</label>
                    <input type="text" class="form-control" id="course_hour" name="course_hour" value="{{$professorCourse->course_hour}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>


@endsection