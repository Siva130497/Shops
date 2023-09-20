<?php

namespace App\Http\Controllers;

use App\Models\Sale;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'location' => 'required|string',
            'type' => 'required|in:1,2',
            'pay' => 'required|in:1,2',
            'customer_id' => 'required',
            'product_id' => 'required',
            'count' => 'required|integer',
        ]);

        Sale::create($validatedData);

        return redirect()->route('sales.index')->with('success', 'Sale created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::findOrFail($id);

        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.create', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'location' => 'required|string',
            'type' => 'required|in:1,2',
            'pay' => 'required|in:1,2',
            'customer_id' => 'required',
            'product_id' => 'required',
            'count' => 'required|integer',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($validatedData);

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully');
    }
}
