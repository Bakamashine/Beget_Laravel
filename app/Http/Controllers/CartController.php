<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use \App\MonstersTraits;
    public function up() {
        $cart = CartModel::where('users_id', '=', \Auth::user()->id)
        ->with('monster')        
        ->with("gallery")
        ;
        return view('cart', ['data' => $cart->get()]);
    }
    
    public function delete(Request $request) {
        CartModel::destroy($request->id);
        return back();
    }
}
