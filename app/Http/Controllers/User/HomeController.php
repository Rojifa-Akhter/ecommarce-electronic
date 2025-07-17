<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();
        if ($about) {
            $about->images = json_decode($about->images, true);
        }
        return view('user.home', compact('about'));
    }
}
