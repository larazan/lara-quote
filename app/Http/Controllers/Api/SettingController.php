<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $id = 1;
        $setting = Setting::find($id);
        if ($setting) {
            
            return response()->json([
                'status' => 200,
                'setting' => $setting,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }
}
