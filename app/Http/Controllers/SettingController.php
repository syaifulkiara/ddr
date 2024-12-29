<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Runtext;
use App\Models\Video;
Use Alert;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $videos   = Video::all();
        $texts    = Runtext::all();
        return view('setting', compact('settings','videos','texts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $settings             = Setting::find('1');
        $settings->judul      = $request->judul;
        $settings->deskripsi  = $request->deskripsi;
        $settings->alamat     = $request->alamat;
        $settings->slogan     = $request->slogan;
        $settings->logo       = $request->logo;
        $settings->save();
        Alert::success('Hore!', 'Update Successfully');
        return redirect('settings');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updatetext(Request $request)
    {
        $texts          = Runtext::find('1');
        $texts->runtext = $request->runtext;
        $texts->save();
        Alert::success('Hore!', 'Update Successfully');
        return redirect('settings');
    }

    public function updatevideo(Request $request)
    {
        $vid               = Video::find('1');
        $vid->code_youtube = $request->code_youtube;
        $vid->autoplay     = $request->autoplay;
        $vid->mute         = $request->mute;
        $vid->save();
        Alert::success('Hore!', 'Update Successfully');
        return redirect('settings');
    }
}
