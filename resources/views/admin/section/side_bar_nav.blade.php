<nav class="side_nav col-md-2 d-none d-md-block bg-light sidebar">
    <div class="nav-side-menu">
        <div class="brand">Brand Logo</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li class=" {{ coolText("") }} ">
                    <a href="/admin">
                        <i class="fa fa-dashboard fa-lg"></i> میز کار
                    </a>
                </li>
                <li  data-toggle="collapse" data-target="#products" class="collapsed {{ coolshow1("professor.index","prFreeTime.index","professorCourse.index") }}">
                    <a href="#"><i class="fa fa-user fa-lg"></i> اساتید <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse {{ coolshow("professor.index","prFreeTime.index","professorCourse.index") }}" id="products">
                    <li class=" {{ coolText("professor.index") }} "><a href="/admin/professor">اساتید</a></li>
                    <li class=" {{ coolText("prFreeTime.index") }} "><a href="/admin/prFreeTime">ساعات آزاد</a></li>
                    <li class=" {{ coolText("professorCourse.index") }} "><a href="/admin/professorCourse">دروس ارایه دهنده</a></li>
                </ul>
                <li data-toggle="collapse" data-target="#service" class="collapsed {{ coolshow1("classroom.index","usage.index","classroomFree.index") }}"">
                    <a href="#"><i class="fa fa-home fa-lg"></i> اتاق ها <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse {{ coolshow("classroom.index","usage.index","classroomFree.index") }}" id="service">
                    <li class=" {{ coolText("classroom.index") }} "><a href="/admin/classroom">اتاق</a></li>
                    <li class=" {{ coolText("usage.index") }} "> <a href="/admin/usage">انواع کاربری</a></li>
                    <li class=" {{ coolText("classroomFree.index") }} "><a href="/admin/classroomFree">زمان آزاد اتاق</a></li>
                </ul>
                <li data-toggle="collapse" data-target="#new" class="collapsed {{coolshow3("days.index","daySeparate.index")}}">
                    <a href="#"><i class="fa fa-clock-o fa-lg"></i> روز ها و ساعات کاری <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse {{coolshow2("days.index","daySeparate.index")}}" id="new">
                    <li class=" {{ coolText("days.index") }} "><a href="/admin/days">روز ها و ساعات کاری</a></li>
                    <li class=" {{ coolText("daySeparate.index") }} "><a href="/admin/daySeparate">تقسیم بندی زمان کاری</a></li>
                </ul>
                <li class=" {{ coolText("course.index") }} ">
                    <a href="/admin/course">
                        <i class="fa fa-book fa-lg"></i> دروس
                    </a>
                </li>
                <li class=" {{ coolText("CourseClassRoom.index") }} ">
                    <a href="/admin/CourseClassRoom">
                        <i class="fa fa-book fa-lg"></i>محدودیت های درس
                    </a>
                </li>
                <li class=" {{ coolText("Building.index") }} ">
                    <a href="/admin/Building">
                        <i class="fa fa-building fa-lg"></i>تعریف ساختمان ها
                    </a>
                </li>
                <li class=" {{ coolText("Weekly_Schedule_Maker.index") }} ">
                    <a href="/admin/Weekly_Schedule_Maker">
                        <i class="fa fa-calendar fa-lg"></i> برنامه هفتگی
                    </a>
                </li>
                <li class="">
                    <a href="http://localhost/tms_hosh/tms/tms/">
                        <i class="fa fa-calendar fa-lg"></i> گزارش گیری
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<?php

use Illuminate\Support\Facades\Route;
function coolText($text) {
    return (Route::currentRouteName() == $text)? "active" : " ";
}
function coolshow($text1,$text2,$text3) {
    return ((Route::currentRouteName() == $text1)||(Route::currentRouteName() == $text2)||(Route::currentRouteName() == $text3))? "show" : "";
}
function coolshow1($text1,$text2,$text3) {
    return ((Route::currentRouteName() == $text1)||(Route::currentRouteName() == $text2)||(Route::currentRouteName() == $text3))? "active" : "";
}

function coolshow2($text1,$text2) {
    return ((Route::currentRouteName() == $text1)||(Route::currentRouteName() == $text2))? "show" : "";
}
function coolshow3($text1,$text2) {
    return ((Route::currentRouteName() == $text1)||(Route::currentRouteName() == $text2))? "active" : "";
}