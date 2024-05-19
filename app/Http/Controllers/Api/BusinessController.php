<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    //

    public function permission()
    {
        $result = BusinessSetting::where('key', '=', 'permission');
        if ($result) {
            
            return response()->json([
                'status' => 200,
                'result' => $result,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }

    public function privacy()
    {
        $result = BusinessSetting::where('key', '=', 'privacy_policy');
        if ($result) {
            
            return response()->json([
                'status' => 200,
                'result' => $result,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }

    public function terms()
    {
        $result = BusinessSetting::where('key', '=', 'terms_and_conditions');
        if ($result) {
            
            return response()->json([
                'status' => 200,
                'result' => $result,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }

    public function about()
    {
        $result = BusinessSetting::where('key', '=', 'about_us');
        if ($result) {
            
            return response()->json([
                'status' => 200,
                'result' => $result,
            ], 200);

        } else {
            
            return response()->json([
                'status' => 404,
                'message' => 'No record found',
            ], 404);

        }
    }
}
