@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">ویرایش کاربری</h1>
        </div>

        <form action="{{ route('usage.update' , ['id' => $usage->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">نام کاربری</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="نام کاربری" value="{{ $usage->name }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="code">شماره کاربری</label>
                    <input type="number" class="form-control" id="code" name="code" placeholder="شماره کاربری" value="{{$usage->code}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </main>
@endsection