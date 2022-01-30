<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Get all Students.
     *
     * @return JsonResponse
     */
    public function index() {
        $student = Student::all();
        return response()->json($student, 200);
    }

    /**
     * Get all students and profile.
     *
     * @return JsonResponse
     */
    public function getAllStudentsAndProfiles() {
        $student = Student::select('students.*','profiles.*')->join('profiles', 'students.profile_id', '=', 'profiles.id')->get();
        if (empty($student->count())) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        else {
            return response()->json($student, 200);
        }
    }

    /**
     * Get student data depends on its id.
     *
     * @param {int} $id
     * @return JsonResponse
     */
    public function getStudentsToIdSimple($id): JsonResponse {
        $student = Student::find($id);
        if (!isset($student)) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        else {
            return response()->json($student, 200);
        }
    }

    /**
     * Get student data depends on its id (JOINED VERSION).
     *
     * @param {int} $id
     * @return JsonResponse
     */
    public function getStudentsToIdJoined($id): JsonResponse {
        $student = Student::select('students.*', 'profiles.*')->where('students.id', $id)->join('profiles', 'students.profile_id', '=', 'profiles.id')->get();

        if (!$student->count()) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        else {
            return response()->json($student, 200);
        }
    }


    /**
     * Add student data.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addStudent(Request $request) {
        $student = Student::create($request->all());
        return response()->json(['message' => 'Data agregada correctamente'], 200);
    }

    public function updateStudent($id, Request $request) {
        $student = Student::find($id);

        if (!isset($student)) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        else {
            $student->update($request->all());
            return response()->json(['message' => 'Estudiante actualizado correctamente'], 200);
        }
    }

    public function deleteStudent($id, Request $request) {
        $student = Student::find($id);
        if (!isset($student)) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        else {
            $student->delete();
            return response()->json(['message' => 'Estudiante eliminado correctamente'], 200);
        }
    }
}
