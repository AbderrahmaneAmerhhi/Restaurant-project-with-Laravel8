<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $cartContent = \Cart::session($userId)->getContent();
        return view('Cart.index')->with([
            'items' => $cartContent,
            'itemsCount' => $cartContent->count(), // qte
        ]);
    }

    public function addMenuToCart(Request $request, $id)
    {

        $menu = Menu::findOrFail($id);
        // dd($menu);
        $userId = auth()->user()->id;
        \Cart::session($userId)->add(array(
            'id' => $menu->id,
            'name' => $menu->title,
            'price' => $menu->pric,
            "quantity" => $request->quantity ? $request->quantity : 1, // ila jat quatity idkhlha ila majatch i3tiha 1
            "attributes" => array(),
            "associatedModel" => $menu,
        ));
        return redirect()->route('cart.index');
    }
    // update item in cart fuction
    public function updateItemInCart($id, Request $request)
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            )
        ));
        return redirect()->route('cart.index');
    }

    // remove item from cart fuction
    public function removeItemFromCart($id)
    {
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($id);
        return redirect()->route('cart.index');
    }
}
