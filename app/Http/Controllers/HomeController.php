<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {

        return view('index')->with([
            'menus' => Menu::all(),
            'propmenus' =>  Menu::where('POPULAR', 1)->get(),
            'reviews' => Comment::all(),
        ]);
    }
}
