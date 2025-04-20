<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;

class FirebaseController extends Controller
{
    public function charts(FirebaseService $firebaseService)
    {
        $data = $firebaseService->getUserStatistics();
        return view('admin.firebase.charts', compact('data'));
    }
}
