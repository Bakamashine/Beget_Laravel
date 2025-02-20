<?php

namespace App\Http\Controllers;

use App\Models\ZayavkiModel;
use Illuminate\Http\Request;
use App\Models\Type_Monster;

class AdminController extends Controller
{
    /**
     * Выводит административную страницу
     * @return \Illuminate\Contracts\View\View
     */
    public function up() {
        
        return view("admin.main", ['data' => ZayavkiModel::all()]);
    }
}
