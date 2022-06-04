<?php

namespace App\Http\Controllers;

use App\Models\jadorMenu;
use App\Http\Requests\StorejadorMenuRequest;
use App\Http\Requests\UpdatejadorMenuRequest;

class JadorMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('JadorMenu.index')->with([
            'MenuJadors' => jadorMenu::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejadorMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejadorMenuRequest $request)
    {


        $request->validate([
            'user_id' => 'required|numeric',
            'menu_id' => 'required|numeric',
        ]);
        jadorMenu::create([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,

        ]);
        return redirect()->route('resto.index')->with(['success' => 'The Menu has been added to favourites ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadorMenu  $jadorMenu
     * @return \Illuminate\Http\Response
     */
    public function show(jadorMenu $jadorMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadorMenu  $jadorMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(jadorMenu $jadorMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejadorMenuRequest  $request
     * @param  \App\Models\jadorMenu  $jadorMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejadorMenuRequest $request, jadorMenu $jadorMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadorMenu  $jadorMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jadorMenu = jadorMenu::findOrFail($id);
        $jadorMenu->delete();
        return redirect()->route('Jador.index')->with(['success' => 'The Menu has been deleted from favourites']);
    }
}
