<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
{
    $teachers = Teacher::all();
    return response()->json(['teachers' => $teachers], 200);
}

public function show($id)
{
    $teacher = Teacher::find($id);

    if (!$teacher) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }

    return response()->json(['teacher' => $teacher], 200);
}

    //اضافة معلم 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:6',
            // أي سمات أخرى تحتاجها للمعلم
        ]);
    
        $teacher = Teacher::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            // أي سمات أخرى
        ]);
    
        return response()->json(['message' => 'Teacher created successfully', 'teacher' => $teacher], 201);
    }
    
    //تعديل دورة 
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
    
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
    
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'password' => 'sometimes|min:6',
            // أي سمات أخرى تحتاجها للمعلم
        ]);
    
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
    
        $teacher->update($data);
    
        return response()->json(['message' => 'Teacher updated successfully', 'teacher' => $teacher], 200);
    }
    
    //حذف دورة 
    public function destroy($id)
{
    $teacher = Teacher::find($id);

    if (!$teacher) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }

    $teacher->delete();

    return response()->json(['message' => 'Teacher deleted successfully'], 200);
}

}
