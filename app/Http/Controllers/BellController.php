<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;
use App\Models\Audio;
use App\Models\Bell;
Use Alert;
class BellController extends Controller
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
        $days = Day::all();
        $audios = Audio::all();
        $bells = Bell::with(['day', 'audio'])->get();
        return view('bell.index', compact('days','audios','bells'));
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

        $bells           = new Bell;
        $bells->id_day   = $request->id_day;
        $bells->jam      = $request->jam;
        $bells->jadwal   = $request->jadwal;
        $bells->id_audio = $request->id_audio;

        $bells->save();
        Alert::success('success','Jadwal berhasil Ditambah');
        return redirect('bells'); 
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
