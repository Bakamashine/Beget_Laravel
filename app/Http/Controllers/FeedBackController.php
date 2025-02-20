<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use Illuminate\Http\Request;
use App\Models\Gallery;

class FeedBackController extends Controller
{
    
    // use \App\CommmentsTrait;
    /**
     * Запрос с выводом информации о:
     * Коментарии
     * Пользователе
     * Ролях
     * @return CommentsModel
     */
    public function dataWithJoin() {
        return CommentsModel::select([
            'comments.answer_text', 
            'comments.answer_user_id', 
            'comments.comment', 
            'comments.title', 
            'comments.id', 
            'comments.created_at', 
            'comments_image.images',
            "users.name as u_name",
            "roles.role"
            ])
            ->join('comments_image', 'comments_image.id', '=', 'comments.score_id')
            ->leftJoin("users", "comments.answer_user_id", "=", "users.id")
            ->leftJoin("roles", "users.id", "=", "roles.id")
            ->orderByDesc('comments.created_at')
            ;
    }
    
    /**
     * Вывод основной страницы с комментарием
     * @return \Illuminate\Contracts\View\View
     */
    public function up() {
        return view('feedbacks.index', ['data' => $this->dataWithJoin()->paginate(2)]);
    }
    
    /**
     * Страница с созданием ответа
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function make(Request $request) {
        $data = $this->dataWithJoin()->where('comments.id', '=', $request->id)->get();
        return view("feedbacks.make", [
            'data' => $data,
            "imgs" => Gallery::whereLike("type", "%image%")->get(),
        ]);
    }
    
    /**
     * Создание ответа на комментарий
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        
        CommentsModel::where('id', '=', $request->id)->update([
            'answer_user_id' => \Auth::user()->id,
            'answer_text' => $request->text            
        ]);
        
        return redirect()->route('answer');
    }
}