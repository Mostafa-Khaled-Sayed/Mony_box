<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Country::query()->get();
        return view('admin.country.index', compact('data'));
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
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'wallet_name');
            $image = time() . '.' . $request->file('image')->extension();
            $data['image'] = $image;
            $request->file('image')->move(public_path('upload/country/'), $image);
            $country = Country::query()->create($data);
            if ($country) {
                foreach ($request->wallet_name as $wallets) {
                    Wallet::query()->create([
                        'country_id' => $country->id,
                        'wallet_name' => $wallets,
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with(['success' => 'Successfully Created Country And Wallet']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $country = Country::query()->find($id);
            $data = $request->except('_token', 'wallet_name');
            DB::beginTransaction();
            if ($request->has('image')) {
                $image = time() . '.' . $request->file('image')->extension();
                $data['image'] = $image;
                $request->file('image')->move(public_path('upload/country/'), $image);
            }
            $country->fill($data)->save();
            if ($country) {
                Wallet::query()->where('country_id', $id)->delete();
                foreach ($request->wallet_name as $wallets) {
                    Wallet::query()->create([
                        'country_id' => $country->id,
                        'wallet_name' => $wallets,
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with(['success' => 'Successfully Updated Country And Wallet']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($id) {
            Country::query()->findOrFail($id)->delete();
            return redirect()->back()->with(['success' => 'Successfully Deleted Country And Wallet']);
        }
    }
}
