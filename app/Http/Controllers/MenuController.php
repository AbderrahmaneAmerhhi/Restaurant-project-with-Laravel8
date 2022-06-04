<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Categorie;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMenuRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
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
            return view('admin.Menu.index')->with([
                'menus' => Menu::where('title', 'like', "%{$request->search}%")->orWhere('id', 'like', "%{$request->search}%")->orWhere('description', 'like', "%{$request->search}%")->paginate(6),
                'cats' => Categorie::all(),
                'catsCount' => Categorie::count(),
                'MenusCount' => Menu::count(),
                'POPULARMenusCount' => Menu::where('POPULAR', 1)->count(),
                'Earning' => Order::sum('total'),
            ]);
        } else {
            return view('admin.Menu.index')->with([
                'menus' => Menu::latest()->paginate(6),
                'cats' => Categorie::all(),
                'catsCount' => Categorie::count(),
                'MenusCount' => Menu::count(),
                'POPULARMenusCount' => Menu::where('POPULAR', 1)->count(),
                'Earning' => Order::sum('total'),
            ]);
        }
    }


    public function getMenuByCategory($id)
    {
        $category = Categorie::where('id', $id)->first();
        return view('admin.Menu.index')->with([
            'menus' => $category->Menus()->latest()->paginate(6),
            'cats' => Categorie::all(),
            'catsCount' => Categorie::count(),
            'MenusCount' => Menu::count(),
            'POPULARMenusCount' => Menu::where('POPULAR', 1)->count(),
            'Earning' => Order::sum('total'),
        ]);
    }
    public function POPULAR($id)
    {
        $menu = Menu::where('id', $id)->first();
        $menu->POPULAR = 1;
        $menu->save();
        return redirect()->route('Menu.index')->with(['success' => 'Menu Added to POPULAR Menus ']);
        # code...
    }
    // function bach kanhyd menu mn POPULAR
    public function NONPOPULAR($id)
    {
        $menu = Menu::where('id', $id)->first();
        $menu->POPULAR = 0;
        $menu->save();
        return redirect()->route('Menu.index')->with(['success' => 'Menu Removed From POPULAR Menus ']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.Menu.create')->with(['cats' => Categorie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:20',
            'description' => 'required|min:5',
            'pric' => 'numeric|Nullable',
            'old_price' => 'numeric|Nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:7000',
            'categorie_id' => 'required|numeric',
        ]);
        if ($request->has('image')) {
            $file = $request->image;
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menu'), $imageName);
        }
        if ($request->pric === "" && $request->old_price === "") {
            $request->pric = 0;
            $request->old_price = 0;
        } elseif ($request->pric === "") {
            $request->pric = 0;
        } elseif ($request->old_price == "") {
            $request->old_price = 0;
        }
        Menu::create([
            'title' => $request->title,
            'description' => $request->description,
            'pric' => $request->pric,
            'old_price' => $request->old_price,
            'image' => $imageName,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->route('Menu.index')->with(['success' => 'menu Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Menu $menu*/$id)
    {
        //
        $menu = Menu::where('id', $id)->first();
        return view('admin.Menu.edit')->with([
            'menu' => $menu,
            "cats" => Categorie::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        //

        $menu = Menu::where('id', $id)->first();
        $request->validate([
            'title' => 'required|min:3|max:20',
            'description' => 'required|min:5',
            'pric' => 'numeric|Nullable',
            'old_price' => 'numeric|Nullable',
            'image' => 'image|mimes:png,jpg,jpeg|max:7000',
            'categorie_id' => 'required|numeric',
        ]);
        if ($request->has('image')) {
            $image_path = public_path("images/menu/" . $menu->image);
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $file = $request->image;
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menu'), $imageName);
            $menu->image = $imageName;
        }
        if ($request->pric === "" && $request->old_price === "") {
            $request->pric = 0;
            $request->old_price = 0;
        } elseif ($request->pric === "") {
            $request->pric = 0;
        } elseif ($request->old_price == "") {
            $request->old_price = 0;
        }
        $menu->update([
            'title' => $request->title,
            'description' => $request->description,
            'pric' => $request->pric,
            'old_price' => $request->old_price,
            'image' => $menu->image,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->route('Menu.index')->with(['success' => 'menu updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('Menu.index')->with(['sucess' => 'Menu Deleted']);
    }
}
