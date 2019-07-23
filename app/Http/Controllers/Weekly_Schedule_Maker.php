<?php

namespace App\Http\Controllers;

use App\classroom;
use App\CourseClassRoom;
use App\prFreeTime;
use function Complex\add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class Weekly_Schedule_Maker extends Controller
{

    public function index()
    {
        //////////////////          sort classroom & classroom_course_needed
        $classrooms = Classroom::orderBy('chair_number','desc')->orderBy('work_table_number','desc')->orderBy('projector','desc')
            ->orderBy('smart_board','desc')->orderBy('tv','desc')->orderBy('wallboard_writing_board','desc')->
            orderBy('showcase','desc')->orderBy('moving_board','desc')->orderBy('sound_system','desc')->orderBy('visual_system','desc')
            ->orderBy('gas_cooler','desc')->orderBy('ninety_network','desc')->orderBy('wireless_signal_cover','desc')->get();

        $course_classrooms = CourseClassroom::orderBy('chair_number','desc')->orderBy('work_table_number','desc')->orderBy('projector','desc')
            ->orderBy('smart_board','desc')->orderBy('tv','desc')->orderBy('wallboard_writing_board','desc')->
            orderBy('showcase','desc')->orderBy('moving_board','desc')->orderBy('sound_system','desc')->orderBy('visual_system','desc')
            ->orderBy('gas_cooler','desc')->orderBy('ninety_network','desc')->orderBy('wireless_signal_cover','desc')->get();;
        //////////////////////////////////////////////////////////////////////

        /////////////           multi_array_search         /////////////////
        function multi_array_search($array, $search)
        {
            if ($array) {
            // Create the result array
            $result = array();
                // Iterate over each array element
                foreach ($array as $key => $value) {

                    // Iterate over each search condition
                    foreach ($search as $k => $v) {

                        // If the array element does not meet the search condition then continue to the next element
                        if (!isset($value[$k]) || $value[$k] != $v) {
                            continue 2;
                        }

                    }

                    // Add the array element's key to the result array
                    $result[] = $key;

                }

                // Return the result array
                return $result;
            }
        }
        ///////////////////////////////////////////////////////

        ///////////////             global variables
        $interference_classes = array();
        $free_class = null;
        $free_pr = null;
        $pr_repeat = null;
        $course_repeat = null;
        $pr_max_class_day = null;
        $course_max_class_day = null;
        $course_contain= array();
        $course_class_contain = array();
        $error_course = array();
        /////////////////////////////////////////////////////////////
        //////////////          main mind program
        while (count($course_contain) != count($course_classrooms)) {
            $class_number = 0;
            foreach ($classrooms as $classroom) {
                $class_number = 1 + $class_number;

                foreach ($course_classrooms as $course) {
                    if (!in_array($course, $course_contain)) {
                        $class_day = null;
                        $course_day = DB::table('professor_courses')->where('course_id', $course->course)->value('CourseProfessorSameTime');
                        while ($course_day >= 1) {

                            $day = $course_day % 10;
                            $course_day = $course_day / 10;
                            $class_day = DB::select('SELECT day_id,start_time_class,end_time_class,classroom_id FROM classroom_frees WHERE classroom_id = ? && day_id = ?', [$classroom->id, $day]);
                            $cr_separates = DB::select('SELECT start_time,end_time,pr_name,sp.name,course_id,course_type FROM day_separates as sp,pr_free_times,professor_courses as pc WHERE sp.name = ?
                        && day_name = ? && start_time>start_time_pr && end_time<end_time_pr && course_id = ? && pr_name=professor_id', [$day, $day, $course->course]);
                            //1 class needed
                            if ($classroom->usage == $course->usage && $classroom->chair_number >= $course->chair_number &&
                                $classroom->work_table_number >= $course->work_table_number
                            ) {
                                //2 class needed
                                if (($course->projector != 1 || $classroom->projector == 1) &&
                                    ($course->smart_board != 1 || $classroom->smart_board == 1) &&
                                    ($course->tv != 1 || $classroom->tv == 1) &&
                                    ($course->wallboard_writing_board != 1 || $classroom->wallboard_writing_board == 1) &&
                                    ($course->showcase != 1 || $classroom->showcase == 1) &&
                                    ($course->moving_board != 1 || $classroom->moving_board == 1) &&
                                    ($course->sound_system != 1 || $classroom->sound_system == 1) &&
                                    ($course->visual_system != 1 || $classroom->visual_system == 1) &&
                                    ($course->gas_cooler != 1 || $classroom->gas_cooler == 1) &&
                                    ($course->ninety_network != 1 || $classroom->ninety_network == 1) &&
                                    ($course->wireless_signal_cover != 1 || $classroom->wireless_signal_cover == 1)
                                ) {
                                    //3 class day and hour match

                                    foreach ($cr_separates as $cr_separate) {
                                        $hour_art = 0;
                                        $hour_thr = 0;
                                        if (!in_array($course, $course_contain) && $class_day != null && $class_day[0]->start_time_class < $cr_separate->start_time
                                            && $class_day[0]->end_time_class > $cr_separate->end_time
                                        ) {
                                            $course_amount_hours = multi_array_search($course_class_contain, array("course" => $course->course));
                                            $course_hour = DB::select('SELECT hour_thr,hour_art FROM courses WHERE id = ?', [$course->course]);

                                            if ($course_class_contain != null) {
                                                $free_class = multi_array_search($course_class_contain, array("start_time" => $cr_separate->start_time,
                                                    "end_time" => $cr_separate->end_time, "classroom" => $classroom->id, "day" => $day));
                                                $free_pr = multi_array_search($course_class_contain, array("start_time" => $cr_separate->start_time,
                                                    "end_time" => $cr_separate->end_time, "pr_name" => $cr_separate->pr_name, "day" => $day, "accepted" => 1));
                                                $pr_repeat = multi_array_search($course_class_contain, array("pr_name" => $cr_separate->pr_name, "day" => $day, "accepted" => 1));
                                                $pr_max_class_day = DB::table('professors')->where('id', $cr_separate->pr_name)->value('pr_day_repeat');
                                                $course_max_class_day = DB::table('courses')->where('id', $course->course)->value('day_rep');
                                                $course_repeat = multi_array_search($course_class_contain, array("course" => $course->course, "day" => $day, "accepted" => 1));

                                                if ($course_amount_hours != null) {
                                                    foreach ($course_amount_hours as $course_amount_hour) {
                                                        $time_class_have = date('H', strtotime($course_class_contain[$course_amount_hour]['end_time']))-
                                                            date('H', strtotime($course_class_contain[$course_amount_hour]['start_time']));
                                                        switch ($course_class_contain[$course_amount_hour]['course_type']){
                                                            case 0: $hour_art = $hour_art + $time_class_have;break;
                                                            case 1: $hour_thr = $hour_thr + $time_class_have;break;
                                                            case 2: $hour_thr = $hour_thr + $time_class_have;
                                                                    $hour_art = $hour_art + $time_class_have;
                                                        }
                                                    }
                                                }
//
                                            }
                                            if (($free_class == null && $free_pr == null && count($pr_repeat) <= $pr_max_class_day) &&
                                                count($course_max_class_day) <= $course_repeat || $course_class_contain == null
                                                && ($course_hour[0]->hour_thr >= $hour_thr || !($cr_separate->course_type == 0))
                                                && ($course_hour[0]->hour_art >= $hour_art || !($cr_separate->course_type == 1))) {
                                                switch ($cr_separate->course_type){
                                                    case 0: $hour_art = $hour_art + date('H', strtotime($cr_separate->end_time)) - date('H', strtotime($cr_separate->start_time));break;
                                                    case 1: $hour_thr = $hour_thr + date('H', strtotime($cr_separate->end_time)) - date('H', strtotime($cr_separate->start_time));break;
                                                    case 2: $hour_thr = $hour_thr + date('H', strtotime($cr_separate->end_time)) - date('H', strtotime($cr_separate->start_time));
                                                        $hour_art = $hour_art + date('H', strtotime($cr_separate->end_time)) - date('H', strtotime($cr_separate->start_time));
                                                }
                                                if($course_hour[0]->hour_thr <= $hour_thr && $course_hour[0]->hour_art <= $hour_art)
                                                {
                                                    array_push($course_contain, $course);
                                                }
                                                array_push($course_class_contain, array("classroom" => $classroom->id, "course" => $course->course,
                                                    "start_time" => $cr_separate->start_time, "end_time" => $cr_separate->end_time,
                                                    "pr_name" => $cr_separate->pr_name, "day" => $day, "accepted" => 1,
                                                    "full_time"=>date('H', strtotime($cr_separate->end_time)) - date('H', strtotime($cr_separate->start_time)),
                                                    "course_type"=>$cr_separate->course_type));
                                            } elseif ($free_class != null) {
                                                array_push($interference_classes, array("course_have_place" => $free_class[0]
                                                , "course_want_class" => $course->course, "pr_name" => $cr_separate->pr_name,
                                                    "course_type"=>$cr_separate->course_type));

                                            }

                                        }

                                    }

                                }

                            }
                        }
                        /////////////////////////////////////check for same times

                        if (!in_array($course, $course_contain) && $interference_classes != null) {

                            $test = multi_array_search($interference_classes, array("course_want_class" => $course->course));
                            if ($test != null && ($classroom->chair_number <= $course->chair_number || count($classrooms) == $class_number)) {

                                if ( $error_course == null || $interference_classes[$test[0]]['course_want_class'] != $error_course[0]->course) {
                                    if (multi_array_search($course_class_contain,array("course" =>$course->course,"accepted" => 0,
                                        "start_time"=> $course_class_contain[$interference_classes[$test[0]]['course_have_place']]['start_time'],
                                            "end_time"=> $course_class_contain[$interference_classes[$test[0]]['course_have_place']]['end_time'])) == null)
                                    {
                                        $last_course = array_pop($course_class_contain);
                                        array_pop($course_contain);
                                        while ($last_course['start_time'] == $course_class_contain[$interference_classes[$test[0]]['course_have_place']]['start_time']) {
                                            $last_course = array_pop($course_class_contain);
                                            array_pop($course_contain);
                                        }

                                        $last_item = array_pop($course_class_contain);
                                        $last_item['accepted'] = 0;
                                        array_pop($course_contain);
                                        array_push($course_class_contain, array("classroom" => $last_item['classroom'],
                                            "course" => $course->course,
                                            "start_time" => $last_item['start_time'],
                                            "end_time" => $last_item['end_time'],
                                            "pr_name" => $interference_classes[$test[0]]['pr_name'],
                                            "day" => $last_item['day'],
                                            "accepted" => 1,
                                            "full_time"=>date('H', strtotime($last_item['end_time'])) - date('H', strtotime($last_item['start_time'])),
                                            "course_type"=>$interference_classes[$test[0]]['course_type']));

                                        array_push($course_class_contain, $last_item);
                                        array_push($course_contain, $course);
                                        array_push($error_course, $course);
                                        continue 2;
                                    }
                                }
                            }
                            elseif ($test == null && ($classroom->chair_number <= $course->chair_number && count($classrooms) == $class_number)) {
                                $course_problem = DB::table('courses')->where('id', $course->course)->value('name');
                                alert()->error(' کلاسی معتبر برای درس ' . $course_problem . ' پیدا نشده ', 'درس نامعتبر')->persistent('بستن');
                                return view('admin/Weekly_Schedule/Weekly_Schedule_Maker');
                            }

                        }
                    }
                }
                /////////////////////////////////////////////       if we cant find place for same time course make error
                $test2 = multi_array_search($course_class_contain, array("accepted" => 0));
                if ($error_course != null && $course_classrooms[$course_class_contain[$test2[0]]['course']]['chair_number']>= $classroom->chair_number)
                {
                    $course_problem = DB::table('courses')->where('id', $error_course[0]['course'])->value('name');
                    alert()->error(' کلاسی معتبر برای درس ' . $course_problem . ' پیدا نشده ', 'درس نامعتبر')->persistent('بستن');
                    return view('admin/Weekly_Schedule/Weekly_Schedule_Maker');
                }

            }
        }
        ////////////////////////////////////////////////////////////////////////
        ///
        ///
        /////////////////////////////////////////       send data to data_base
//        foreach ($course_class_contain as $course_class){
//            if ($course_class['accepted'] == 1) {
//                DB::table('timetables')->insertGetId(array('name' => '3971001', 'course_id' => $course_class['course'], 'professor_id' => $course_class['pr_name'],
//                    'start_time' => $course_class['start_time'], 'end_time' => $course_class['end_time'],
//                    'classroom_id' => $course_class['classroom'], 'day' => $course_class['day']));
//            }
//        }


//                return $course_contain;
//                return $course_classrooms;
                return $course_class_contain;
//                return $interference_classes;


//        return ($course_classrooms[0]->id);
//        return "a";
//        return view('admin/Weekly_Schedule/Weekly_Schedule_Maker');
    }
}
