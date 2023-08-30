<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        // return response()->json(['courses' => $courses], 200);
        return view('layout', ['course' => $course]);

    }

    
    public function show($id)
    {
        $course = Course::with('sessions')->find($id);
    
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }
    
       //  return response()->json(['course' => $course], 200);
        return view('welcome', ['course' => $course]);

    }
    //لجلب اسماء طلاب في دورة  ا 
    public function showCourseStudents($id)
    {
        $course = Course::find($id);
    
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }
    
        $students = $course->students;
    
        return view('NameStudents', ['students' => $students, 'course' => $course]);
    }
    

    //لجلب دورات كورس ما 
    public function getSessionsForCourseId($courseId)
{
    $course = Course::with('sessions')->find($courseId);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    $sessions = $course->sessions;

    return response()->json(['sessions' => $sessions], 200);
}

// لجلب اسم المدرس 
public function Tshow($id)
{
    $course = Course::with('sessions', 'teacher')->find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    return response()->json(['course' => $course], 200);
}

// اضافة دورة 
public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'teacher_id' => 'required|exists:teachers,id',
        'course_date' => 'required|date',
        'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        // أي سمات أخرى تحتاجها للدورة
    ]);

    $course = Course::create($data);

    return response()->json(['message' => 'Course created successfully', 'course' => $course], 201);
}

// تعديل دورة 
public function update(Request $request, $id)
{
    $course = Course::find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    $data = $request->validate([
        'name' => 'required|string',
        'teacher_id' => 'required|exists:teachers,id',
        'course_date' => 'required|date',
        'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        // أي سمات أخرى تحتاجها للدورة
    ]);

    $course->update($data);

    return response()->json(['message' => 'Course updated successfully', 'course' => $course], 200);
}

// حذف دورة 
public function destroy($id)
{
    $course = Course::find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    $course->delete();

    return response()->json(['message' => 'Course deleted successfully'], 200);
}

}
