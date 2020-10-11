<?php

namespace App\Http\Controllers\News;

use App\Models\{Category, News};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index() {
        return view('news.categories', [
            'categories' => Category::all()
        ]);
    }

    public function show($slug) {
      $category = Category::query()->where('slug', $slug)->first();
      $news = News::query()->where('category_id', $category->id)->get();

      //$category->news->get();

        return view('news.byCategory', [
            'news' => $news,
            'category' => $category
        ]);
    }
}
