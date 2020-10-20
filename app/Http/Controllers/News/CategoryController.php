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

    public function show($slug)
    {
        $category = Category::query()->where('slug', '=', $slug)->first();
        if ($category) {
            $news = $category->news()->paginate(5);
        } else {
            $news = null;
        }
        return view('news.byCategory', [
            'news' => $news,
            'category' => $category,
        ]);
    }
}
