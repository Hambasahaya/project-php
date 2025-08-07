<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Http\Requests\StorepesananRequest;
use App\Http\Requests\UpdatepesananRequest;

class PesananController extends Controller
{
    public function index() {}
    public function create() {}

    public function show(pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatepesananRequest $request, pesanan $pesanan)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pesanan $pesanan)
    {
        //
    }
}
