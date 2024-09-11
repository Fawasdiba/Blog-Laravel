<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index ()
    {
        return view ('back.dashboard.index', [
            'total_articles'   => Article::count(),
            'total_categories' => Category::count(),
            'latest_article'  => Article::with('Category')->whereStatus(1)->Latest()->take(3)->get(),
            'popular_article'  => Article::with('Category')->whereStatus(1)->orderBy('views', 'desc')->take(3)->get()
        ]);
    }
}
