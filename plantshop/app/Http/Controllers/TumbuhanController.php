<?php

namespace App\Http\Controllers;

use App\Models\Tumbuhan;
use App\Models\Category;
use App\Http\Requests\StoreTumbuhanRequest;
use App\Http\Requests\UpdateTumbuhanRequest;

class TumbuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tumbuhans= Tumbuhan::all();
        return view('dashboard.index',[
            'tumbuhans' => $tumbuhans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create',[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTumbuhanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTumbuhanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tumbuhan  $tumbuhan
     * @return \Illuminate\Http\Response
     */
    public function show(Tumbuhan $tumbuhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tumbuhan  $tumbuhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tumbuhan $tumbuhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTumbuhanRequest  $request
     * @param  \App\Models\Tumbuhan  $tumbuhan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTumbuhanRequest $request, Tumbuhan $tumbuhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tumbuhan  $tumbuhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tumbuhan $tumbuhan)
    {
        //
    }
}
