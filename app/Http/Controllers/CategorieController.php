<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Middleware\authAdmin;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('authAdmin');
    }
    public function index(Request $request)
    {
        //
        if (!empty($request->search)) {
            return view('admin.categories.index')->with([
                'cats' => Categorie::where('title', 'like', "%{$request->search}%")->paginate(10),
                'catsCount' => Categorie::count(),
                'MenusCount' => Menu::count(),
                'sales' => Order::where('paid', 1)->count(),
                'Earning' => Order::sum('total'),
            ]);
        } else {
            return view('admin.categories.index')->with([
                'cats' => Categorie::latest()->paginate(10),
                'catsCount' => Categorie::count(),
                'MenusCount' => Menu::count(),
                'sales' => Order::where('paid', 1)->count(),
                'Earning' => Order::sum('total'),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorieRequest $request)
    {
        //
        $request->validate([
            'title' => 'required|max:20|min:3',
            "Visibility" => 'required',
        ]);
        Categorie::create([
            'title' => $request->title,
            'Visibility' => $request->Visibility,
        ]);
        return redirect()->route('categories.index')->with(['success' => 'Category Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categorie = Categorie::where('id', $id)->first();
        return view('admin.categories.edit')->with(['cat' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategorieRequest  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieRequest $request,/* Categorie $categorie*/ $id)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:20'
        ]);
        $categorie = Categorie::where('id', $id)->first();
        $categorie->update([
            'title' => $request->title,
            'Visibility' => $request->Visibility,
        ]);
        return redirect()->route('categories.index')->with(['success' => 'Category Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categorie = Categorie::where('id', $id)->first();
        $categorie->delete();
        return redirect()->route('categories.index')->with(['success' => 'Category Deleted']);
    }
}
