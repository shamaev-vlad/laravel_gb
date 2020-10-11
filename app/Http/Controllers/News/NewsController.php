<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index() {
         return view('news.newsAll')->with('news', News::query()->paginate(5));

    }

    public function show(News $news) {
         return view('news.one')->with('news', $news);
    }

  
}
