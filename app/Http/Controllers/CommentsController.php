<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Создание комментария
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store (Request $request){

        CommentsModel::create([
            'user_id' => \Auth::user()->id,
            "title" => $request->title,
            "comment" => $request->text,
            "score_id" => $request->status,
        ]);
        
        return redirect()->route("main");

    }
}
