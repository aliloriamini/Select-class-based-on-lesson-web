@extends('admin.master')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">افزدودن محدودیت های درس</h1>
        </div>

        <form action="{{ route('CourseClassRoom.store') }}" method="post">
            {{ csrf_field() }}

            @include('Admin.section.errors')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="course">درس</label>
                    <select  name="course" class="browser-default custom-select">
                        @foreach($courses as $course)
                            <option value="{{$course->id}}" {{ old('course') == $course->id ? 'selected' : '' }}>{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="usage">کاربری</label>
                    <select  name="usage" class="browser-default custom-select">
                        @foreach($usages as $usage)
                        <option value="{{$usage->code}}" {{ old('usage') == $usage->code ? 'selected' : '' }}>{{$usage->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="chair_number">تعداد صندلی ها</label>
                    <input type="number" class="form-control" id="chair_number" name="chair_number" placeholder="تعداد صندلی ها" value="{{old('chair_number')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="work_table_number">تعداد میز کار</label>
                    <input type="number" class="form-control" id="work_table_number" name="work_table_number" placeholder="تعداد میز کار" value="{{old('work_table_number')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="projector"> پروژکتور</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="projector1" name="projector" value="1"  {{ old('projector')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="projector1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="projector2" name="projector" value="0"  {{ old('projector')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="projector2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="smart_board"> بورد هوشمند</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="smart_board1" name="smart_board" value="1"  {{ old('smart_board')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="smart_board1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="smart_board2" name="smart_board" value="0"  {{ old('smart_board')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="smart_board2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="tv"> تلویزیون</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="tv1" name="tv" value="1"  {{ old('tv')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="tv1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="tv2" name="tv" value="0"  {{ old('tv')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="tv2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="wallboard_writing_board"> پرده نمایش</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="wallboard_writing_board1" name="wallboard_writing_board" value="1"  {{ old('wallboard_writing_board')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="wallboard_writing_board1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="wallboard_writing_board2" name="wallboard_writing_board" value="0"  {{ old('wallboard_writing_board')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="wallboard_writing_board2">ندارد</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="showcase"> تخته نوشتن دیواری</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="showcase1" name="showcase" value="1"  {{ old('showcase')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="showcase1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="showcase2" name="showcase" value="0"  {{ old('showcase')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="showcase2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="moving_board"> تخته متحرک</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="moving_board1" name="moving_board" value="1"  {{ old('moving_board')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="moving_board1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="moving_board2" name="moving_board" value="0"  {{ old('moving_board')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="moving_board2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="sound_system">سیستم صوتی</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="sound_system1" name="sound_system" value="1"  {{ old('sound_system')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="sound_system1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="sound_system2" name="sound_system" value="0"  {{ old('sound_system')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="sound_system2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="visual_system">سیستم تصویری</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="visual_system1" name="visual_system" value="1"  {{ old('visual_system')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="visual_system1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="visual_system2" name="visual_system" value="0"  {{ old('visual_system')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="visual_system2">ندارد</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="gas_cooler">کولر گازی</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="gas_cooler1" name="gas_cooler" value="1"  {{ old('gas_cooler')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="gas_cooler1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="gas_cooler2" name="gas_cooler" value="0"  {{ old('gas_cooler')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="gas_cooler2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="ninety_network"> نود شبکه</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="ninety_network1" name="ninety_network" value="1"  {{ old('ninety_network')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="ninety_network1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="ninety_network2" name="ninety_network" value="0"  {{ old('ninety_network')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="ninety_network2">ندارد</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="wireless_signal_cover">پوشش سیگنال وایرلس</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="wireless_signal_cover1" name="wireless_signal_cover" value="1"  {{ old('wireless_signal_cover')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                        <label class="custom-control-label" for="wireless_signal_cover1">دارد</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="wireless_signal_cover2" name="wireless_signal_cover" value="0"  {{ old('wireless_signal_cover')=="0" ? 'checked='.'"'.'checked'.'"' : '' }} >
                        <label class="custom-control-label" for="wireless_signal_cover2">ندارد</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

        <form action="{{ url('CourseClassRoom/import') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="import_file" />
            <button type="submit" class="btn btn-primary">ارسال فایل excel</button>
        </form>

    </main>

@endsection