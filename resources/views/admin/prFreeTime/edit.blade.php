@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش تقسیم بندی</h1>
        </div>

        <form action="{{ route('prFreeTime.update' , ['id' => $prFreeTime->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="day_name">روز</label>
                    <select  name="day_name" class="browser-default custom-select">
                        @foreach($days as $day)
                            <option value="{{$day->id}}" {{ $prFreeTime->day_name == $day->id ? 'selected' : '' }}>{{$day->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pr_name">نام استاد</label>
                    <select  name="pr_name" class="browser-default custom-select">
                        @foreach($professors as $professor)
                            <option value="{{$professor->id}}" {{ $prFreeTime->pr_name == $professor->id ? 'selected' : '' }}>{{$professor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="start_time_pr">از ساعت</label>
                    <input type="time" class="form-control" id="start_time_pr" name="start_time_pr" value="{{$prFreeTime->start_time}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="end_time_pr">تا ساعت</label>
                    <input type="time" class="form-control" id="end_time_pr" name="end_time_pr" value="{{$prFreeTime->end_time_pr}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>


@endsection