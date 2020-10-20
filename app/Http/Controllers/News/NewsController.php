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

    public function search(Request $request)
   {
           $search = $request->get('search');
           $news = News::query()->where('text', 'like', '%' . $search . '%')
               ->orWhere('title', 'like', '%' . $search . '%')->get();
           return view('news.newsAll')->with('news', $news)->with('success', 'Результат поиска по фразе: '. $search);
   }


}
