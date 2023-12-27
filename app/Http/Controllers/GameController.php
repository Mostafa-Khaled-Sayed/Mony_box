<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Game;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Game::query()->get();
        return view('admin.game.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::query()->get();
        return view('admin.game.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $image =  time() . '.' . $request->file('image')->extension();
            $data['image']  = "upload/games/$image";
            $request->file('image')->move(public_path("upload/games/"), $image);

            $background_image =  time() . time() . '.' . $request->file('background_image')->extension();
            $data['background_image']  = "upload/games/$image";
            $request->file('background_image')->move(public_path("upload/games/"), $background_image);
            $status = Game::query()->create($data);

            if ($status) {
                return redirect()->route('games.index')->with(['success' => 'Successfully Created Game']);
            } else {
                return redirect()->back()->with(['error' => 'Not Created Game']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $game = Game::query()->findOrFail($id);
        $countries = Country::query()->get();
        return view('admin.game.edit', compact('game', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $game = Game::query()->findOrFail($id);
            $data = $request->except('_token');
            if ($request->hasFile('image')) {
                $image =  time() . '.' . $request->file('image')->extension();
                $data['image']  = "upload/game/$image";
                $request->file('image')->move(public_path("upload/games/"), $image);
            }

            if ($request->hasFile('background_image')) {
                $background_image =  time() . time() . '.' . $request->file('background_image')->extension();
                $data['background_image']  = "upload/game/$image";
                $request->file('background_image')->move(public_path("upload/games/"), $background_image);
            }
            $status = $game->update($data);
            if ($status) {
                return redirect()->route('games.index')->with(['success' => 'Successfully Updated Game']);
            } else {
                return redirect()->back()->with(['error' => 'Not Updated Game']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($id) {
            Game::query()->findOrFail($id)->delete();
            return redirect()->route('games.index')->with(['success' => 'Successfully Deleted Game']);
        }
    }
}
