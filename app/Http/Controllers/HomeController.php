<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use App\Models\ZayavkiModel;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    
    use \App\CommmentsTrait;
    
    public function up() {
        $data = $this->CommentsWithJSON()->where('comments.user_id', '=', \Auth::user()->id);
        $zayavki = ZayavkiModel::where('users_id', '=', \Auth::user()->id);
        return view('home.home', [
            'data' => $data->get(),
            'zayavki' => $zayavki->get()
        ]);
    }

    public function loadAvatar(Request $request) {
        if ($request->hasFile('file')) {
            
            \Validator::make($request->all(),
            [
                'file' => ['required', 'image'],
            ],
            [
                'file.required' => "Поле обязательно",
                'file.image' => 'Принимаются только изображения'
            ]
            
            )->validateWithBag('ErrorImage');

            $FULL_path = "/storage/" . $request->file('file')->store("avatar", "public");
            $user =  User::find(\Auth::user()->id);
            $result = $user->updateOrFail(['avatar' => $FULL_path]);
            if ($result) {
                return redirect()->route('home');
            }
        }
    }
}
