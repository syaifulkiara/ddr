<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Video;
use App\Models\Runtext;
class MainController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $videos   = Video::all();
        $texts    = Runtext::all();
        return view('main', compact('settings','videos','texts'));
    }

    public function get_runtext(Request $request)
    {
        $texts = RunText::all();
        $runtextStrings = $texts->pluck('runtext')->implode(';');
        return response()->json(['runtext' => $runtextStrings]);
    }

}
