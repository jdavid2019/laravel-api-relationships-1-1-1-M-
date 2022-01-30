<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    /**
     * All license
     *
     * @return JsonResponse
     */
    public function index() {
        $license = License::all();
        return response()->json($license, 200);
    }

    /**
     * Get License data include students and lessons
     * @return JsonResponse
     */
    public function getLicenseStudentAndLessons() {
        $license = License::select('licenses.*','students.*','lessons.*')
                            ->join('lessons', 'licenses.lesson_id', '=', 'lessons.id')
                            ->join('students', 'licenses.student_id', '=', 'students.id')
                            ->get();
        return response()->json($license, 200);
    }

    /**
     * Get License data using its id.
     *
     * @param $id
     * @return JsonResponse
     */
    public function getLicenseData($id) {
        $license = License::find($id);

        if (!isset($license)) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
        else {
            return response()->json($license, 200);
        }
    }

    /**
     * Add a new student License.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addLicense(Request $request) {
        $license = License::create($request->all());
        return response()->json($license, 200);
    }

    /**
     * Update license data.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function updateLicenseData(Request $request, $id) {
        $license = License::find($id);

        if (!isset($license)) {
            return response()->json(['message' => 'Matricula no encontrada'], 404);
        }
        else {
            $license->update($request->all());
            return response()->json("Data actualizada correctamente", 200);
        }
    }

    /**
     * Delete license.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function deleteLicenseData(Request $request, $id) {
        $license = License::find($id);

        if (!isset($license)) {
            return response()->json(['message' => 'Matricula no encontrada'], 404);
        }
        else {
            $license->delete();
            return response()->json(['message' => 'Data eliminada correctamente'], 200);
        }
    }
}
