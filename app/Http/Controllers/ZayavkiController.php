<?php

namespace App\Http\Controllers;

use App\Models\ZayavkiModel;
use Illuminate\Http\Request;

class ZayavkiController extends Controller
{
    
    use \App\MonstersTraits;
    public function add() {
        $cart = json_encode(
            \App\Models\CartModel::where('users_id', '=', \Auth::user()->id)->get()
        );
        
        ZayavkiModel::create([
                'users_id' => \Auth::user()->id,
                'monsters' => $cart,
                ]);
        return redirect()->route('home');
    }   
    
    public function show($bb) {
        $array = ZayavkiModel::find($bb);
        $data = json_decode($array->monsters);
        $new = [];
        foreach ($data as $value) {
            array_push($new, $value->monster_id);
        }
        // $monsters = $this->MonsterData()->where('id', '=', $data['monster_id']);
        $monsters = $this->MonsterData()->findMany([$new]);

        return view('zayavki_detail', ['data' => $monsters]);
    }
    
    public function updateStatus(Request $request) {
        $zay = ZayavkiModel::find($request->id);
        $zay->update(['status' => $request->status]);
        
        return back();
    }
}
