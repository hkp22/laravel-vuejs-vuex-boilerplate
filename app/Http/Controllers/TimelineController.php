<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => 'timeline index',
        ], 200);
    }
}
