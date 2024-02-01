<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Techs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techs = Techs::all();
        return view('admin.techs.index',compact('techs'));;
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
    public function store(Request $request, Techs $tech)
    {
        $data = $request->validate(
            [
            'name' => 'required|unique:categories'
            ]
        );
        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;

        $tech->create($data);


        return redirect()->back()->with('message',"Tecnologia $request->name creata corretamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Techs $techs)
    {
        $data = $request->validate(
            [
            'name' => 'required|unique:categories'
            ]
        );
        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;

        $techs->update($data);


        return redirect()->back()->with('message',"Tecnologia $request->name aggiornata corretamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Techs $tech)
    {
        $tech->delete();
        return redirect()->back()->with('message',"Tecnologia eliminata corretamente");
    }
}
