<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players=Player::all();
        return view('players.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name='player create';
        $route=route('players.store');
        $button='Register';
        return view('players.create',compact('name','route','button'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',

        ]);
        $player=Player::create ([
            'name' =>$request->name,
        ]);
        $player->save();
        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $name='player edit';
        $route=route('players.update',['player'=>$player]);
        $button='update';
        return view('players.edit', compact('name','route','button','player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);
        $player->fill ([
            'name' =>$request->name,  
        ]);
        $player->save();
        return redirect()->route('players.index')->with('success','Edited with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Deleted with success');
    }
}
