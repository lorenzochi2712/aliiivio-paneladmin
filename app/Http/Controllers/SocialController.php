<?php

namespace App\Http\Controllers;

use App\Services\SocialMediaService;

class SocialController extends Controller
{
    public function index(SocialMediaService $service)
    {
        $followers = $service->getFollowers();
        return view('admin.social.followers', compact('followers'));
    }
}
