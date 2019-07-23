@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">افزودن زمان خالی اتاق</h1>
        </div>

        <form action="{{ route('classroomFree.store') }}" method="post">
            {{ csrf_field() }}

            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="classroom_id">کلاس</label>
                    <select  name="classroom_id" class="browser-default custom-select">
                        @foreach($classrooms as $classroom)
                            <option value="{{$classroom->id}}" {{ old('classroom') == $classroom->id ? 'selected' : '' }}>{{$classroom->class_number}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="day_id">روز</label>
                    <select  name="day_id" class="browser-default custom-select">
                        @foreach($days as $day)
                            <option value="{{$day->id}}" {{ old('day') == $day->id ? 'selected' : '' }}>{{$day->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="start_time_class">از ساعت</label>
                    <input type="time" class="form-control" id="start_time_class" name="start_time_class" value="{{old('start_time_class')}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="end_time_class">تا ساعت</label>
                    <input type="time" class="form-control" id="end_time_class" name="end_time_class" value="{{old('end_time_class')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

        <form action="{{ url('classroomFree/import') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="import_file" />
            <button type="submit" class="btn btn-primary">ارسال فایل excel</button>
        </form>

    </main>

@endsection