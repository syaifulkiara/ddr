<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Audio;
Use Alert;
class AudioController extends Controller
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
        $audios = Audio::all();
        return view('audio.index', compact('audios'));
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
        $this->validate($request,[
                'nama' => 'required|min:3',
                'file' => 'required|file|mimes:mp3,wav,ogg|max:10048'
        ]);

        $audios               = new Audio;
        $audios->nama         = $request->nama;

         if($request->file('file')) {
             $file              = $request->file('file');
             $filename          = $file->getClientOriginalName();
             $file->move(public_path('audio'), $filename);
             $audios->file  = 'audio/'.$filename;
         }
        $audios->save();
        Alert::success('success','Audio berhasil Ditambah');
        return redirect('audios'); 
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
