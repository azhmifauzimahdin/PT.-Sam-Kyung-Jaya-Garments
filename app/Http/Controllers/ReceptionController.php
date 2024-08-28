<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reception = Reception::paginate(10);
        return view('receptions.index', [
            'title' => 'Reception',
            'receptions' => $reception
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        return view('receptions.create', [
            'title' => 'Create Reception',
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_id' => 'required',
            'amount' => 'required',
            'rack' => 'required',
            'vendor' => 'required',
            'date' => 'required',
        ]);

        Reception::create($validateData);

        $product = Product::find($validateData['product_id']);
        $product->update([
            'stock' => $product->stock + $validateData['amount']
        ]);

        return redirect()->route('receptions.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reception $reception)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reception $reception)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reception $reception)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reception $reception)
    {
        //
    }
}
