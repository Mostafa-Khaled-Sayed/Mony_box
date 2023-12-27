<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lwwcas\LaravelCountries\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::query()->get();
        // return $countries;
        return view('admin.country.index', compact('countries'));
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
            $data = $request->except('_token');
            $image = time() . '.' . $request->file('image')->extension();
            $data['image'] = $image;
            $request->file('image')->move(public_path('upload/country/'), $image);
            $country = Country::query()->create($data);
            return redirect()->back()->with(['success' => 'Successfully Created Country And Wallet']);
        } catch (\Exception $ex) {
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
            $data = $request->except('_token');
            if ($request->has('image')) {
                $image = time() . '.' . $request->file('image')->extension();
                $data['image'] = $image;
                $request->file('image')->move(public_path('upload/country/'), $image);
            }
            $country->fill($data)->save();

            return redirect()->back()->with(['success' => 'Successfully Updated Country And Wallet']);
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
            Country::query()->findOrFail($id)->delete();
            return redirect()->back()->with(['success' => 'Successfully Deleted Country And Wallet']);
        }
    }
}
