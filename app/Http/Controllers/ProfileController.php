<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Get all profiles.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $profile = Profile::all();
        return response()->json($profile, 200);
    }

    /**
     * Get user profile to a specific id.
     *
     * @param {int} $id
     * @return JsonResponse
     */
    public function getProfile($id) {
        $profile = Profile::find($id);

        if (!isset($profile)) {
            return response()->json(['message' => 'Ningún dato encontrado'], 404);
        }
        else {
            return response()->json($profile, 200);
        }
    }

    /**
     * Get all profile data to an user name.
     *
     * @param {String} $user
     * @return JsonResponse
     */
    public function getProfile2($user) {
        $profile = Profile::where('user', $user)->get();
        if (!$profile->count()) {
            return response()->json(['message' => 'Ningún dato encontrado'], 404);
        }
        else {
            return response()->json($profile, 200);
        }
    }

    /**
     * Add profile.
     *
     * @param Request $request
     * @return JsonResponse
     */
   public function addProfile(Request $request) {
        $profile = Profile::create($request->all());
        return response()->json($profile, 200);
   }


    /**
     * Update a specific profile.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
  public function updateProfile(Request $request, $id) {
        $profile = Profile::find($id);
        if (!isset($profile)) {
            return response()->json(['message' => 'Ningún dato encontrado'], 404);
        }
        else {
            $profile->update($request->all());
            return response()->json(['message' => 'Datos actualizados'], 200);
        }
  }

    /**
     * Delete a profile.
     *
     * @param $id
     * @return JsonResponse
     */
  public function deleteProfile($id) {
        $profile = Profile::find($id);
        if (!isset($profile)) {
            return response()->json(['message' => 'Ningún dato encontrado'], 404);
        }
        else {
            $profile->delete();
            return response()->json(['message' => 'Dato eliminado con éxito'], 200);
        }
  }

}
