<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Http\Requests\PlanetRequest;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planet = Planet::all();
        return view('index', ['planets' => $planet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanetRequest $request)
    {
        $planet = new Planet;

        $planet->name = $request->name;
        $planet->en_name = $request->en_name;
        $planet->radius = $request->radius;
        $planet->weight = $request->weight;

        $planet->save();

        return redirect('/planet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planet = Planet::find($id);
        return view('show', ['planet' => $planet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planet = Planet::find($id);
        return view('edit', ['planet' => $planet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanetRequest $request, $id)
    {

        $planet = Planet::find($id);

        $planet->name = $request->name;
        $planet->en_name = $request->en_name;
        $planet->radius = $request->radius;
        $planet->weight = $request->weight;

        $planet->save();

        return redirect('/planet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planet = Planet::find($id);
        $planet->delete();

        return redirect('/planet');
    }
}
