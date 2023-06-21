<?php

namespace App\Http\Controllers;

use App\Models\track;
use Illuminate\Http\Request;

class trackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks=Track::all();
        return view('tracks.index', compact('tracks')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name='track create';
        $route=route('tracks.store');
        $button='Register';
        return view('tracks.create',compact('name','route','button'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'music' => 'required|mimes:mp3',
        ]);
        $path=$request->music->store('public/music');
        $track=Track::create([
            'name' =>$request->name,
            'path' =>$path,
        ]);
        $track->save();
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(track $track)
    {
        $name='track edit';
        $route=route('tracks.update',['track'=>$track]);
        $button='update';
        return view('tracks.edit', compact('name','route','button','track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, track $track)
    {
        $request->validate([
            'name' => 'required|max:100',
            'music' => 'required|mimes:mp3',
        ]);
        $path=$request->music->store('public/music');
        $track->fill([
            'name' =>$request->name,
            'path' =>$path,
        ]);
        $track->save();
        return redirect()->route('tracks.index')->with('success','Edited with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(track $track)
    {
        $track->delete();
        
        return redirect()->route('tracks.index')->with('success', 'Deleted with success');
    }
}
