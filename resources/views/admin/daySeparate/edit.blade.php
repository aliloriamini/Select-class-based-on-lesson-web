@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش تقسیم بندی</h1>
        </div>

        <form action="{{ route('daySeparate.update' , ['id' => $daySeparate->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="usage">روز</label>
                    <select  name="name" class="browser-default custom-select">
                        @foreach($days as $day)
                            <option value="{{$day->id}}" {{ $daySeparate->name == $day->id ? 'selected' : '' }}>{{$day->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="start_time">از ساعت</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{$daySeparate->start_time}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="end_time">تا ساعت</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{$daySeparate->end_time}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="available">مجاز</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="available1" name="available" value="1"  {{ $daySeparate->available=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="available1">هست</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="available2" name="available" value="0"  {{ $daySeparate->available=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="available2">نیست</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>


@endsection