<?php

namespace App\Http\Controllers;

use App\Models\Offer_game;
use Illuminate\Http\Request;

class OfferGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offer_games = Offer_game::query()->with(['game'])->get();
        return view('admin.game.offer_game', compact('offer_games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('admin.game.create_offer_game', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            if ($data) {
                $image_name = time() . "." . $request->file('image')->extension();
                $data['image'] = "upload/game/$image_name";
                $request->file('image')->move(public_path("upload/game/"), $image_name);

                $background_image = time() . time() . "." . $request->file('background_image')->extension();
                $data['background_image'] = "upload/game/$background_image";
                $request->file('background_image')->move(public_path("upload/game/"), $background_image);


                Offer_game::query()->create($data);
                return redirect()->back()->with(['success' => 'Successfully Created Category Name']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer_game $offer_game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offer_game = Offer_game::query()->findOrFail($id);
        return view('admin.game.edit_offer_game', compact('offer_game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            if ($data) {
                $offer_game = Offer_game::query()->findOrFail($id);

                if ($request->hasFile('image')) {
                    $image_name = time() . "." . $request->file('image')->extension();
                    $data['image'] = "upload/game/$image_name";
                    $request->file('image')->move(public_path("upload/game/"), $image_name);
                }

                if ($request->hasFile('background_image')) {
                    $background_image = time() . time() . "." . $request->file('background_image')->extension();
                    $data['background_image'] = "upload/game/$background_image";
                    $request->file('background_image')->move(public_path("upload/game/"), $background_image);
                }

                $offer_game->update($data);
                return redirect()->back()->with(['success' => 'Successfully Created Category Name']);
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
        Offer_game::query()->findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Successfully Deleted Offer Game']);
    }
}
