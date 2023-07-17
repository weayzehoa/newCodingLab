<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QrCode;

class HomeController extends Controller
{
    public function index()
    {
        $qrCode = QrCode::color(0, 0, 255)->generate(env('APP_URL'));
        return view('web.welcome', compact('qrCode'));
    }
}
