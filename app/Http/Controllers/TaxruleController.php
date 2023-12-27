<?php

namespace App\Http\Controllers;

use App\Models\Taxrule;
use Illuminate\Http\Request;

class TaxruleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tax_rule = Taxrule::query()->findOrFail(1);
        return view('admin.tax_rule.index', compact('tax_rule'));
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
    public function show(Taxrule $taxrule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taxrule $taxrule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tax = Taxrule::query()->findOrFail($id);
        $tax->update(['tax_rule' => $request->tax_rule]);
        return redirect()->back()->with(['sucess' => 'Successfully Updated Tax Rule']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taxrule $taxrule)
    {
        //
    }
}
