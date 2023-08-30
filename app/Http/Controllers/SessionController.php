<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function showSessions($courseId)
{
    $course = Course::with('sessions')->find($courseId);
    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }
    return response()->json(['sessions' => $course->sessions], 200);
 
}
public function showCourseSessions($id)
{
    $course = Course::find($id);

    if (!$course) {
        return response()->json(['message' => 'Course not found'], 404);
    }

    $sessions = $course->sessions;

    return view('detailse', ['sessions' => $sessions, 'course' => $course]);
}

    //add session
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'notify' => 'required|boolean',
            // أي سمات أخرى تحتاجها للجلسة
        ]);
    
        $session = Session::create($data);
    
        return response()->json(['message' => 'Session created successfully', 'session' => $session], 201);
    }
    
    //update session 
    public function update(Request $request, $id)
    {
        $session = Session::find($id);
    
        if (!$session) {
            return response()->json(['message' => 'Session not found'], 404);
        }
    
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'notify' => 'required|boolean',
            // أي سمات أخرى تحتاجها للجلسة
        ]);
    
        $session->update($data);
    
        return response()->json(['message' => 'Session updated successfully', 'session' => $session], 200);
    }
    
    //delete session
    public function destroy($id)
    {
        $session = Session::find($id);
    
        if (!$session) {
            return response()->json(['message' => 'Session not found'], 404);
        }
    
        $session->delete();
    
        return response()->json(['message' => 'Session deleted successfully'], 200);
    }
    
}
