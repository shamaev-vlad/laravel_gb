<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidNews;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class CrudNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crudNews')->with('news', News::query()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addNews')->with('news', new News())->with('categories', Category::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ValidNews  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidNews $request)
    {
      $validated = $request->validated();

      $news = new News();
      $news->fill($request->except('_token'));
      $news->save();

      return redirect()->route('admin.news.index', $news->id)->with('success', 'Новость добавлена успешно!');
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
     public function show(News $news)
     {
         return view('news.one')->with('news', $news);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.addNews')->with('news', $news)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ValidNews  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
     public function update(ValidNews $request, News $news)
     {

       $validated = $request->validated();

      $url = $news->image;

      if ($request->file('image')){
          $path = Facades\Storage::putFile('public', $request->file('image'));
          $url = Facades\Storage::url($path);
      }

      $news->fill($request->except('_token'));
      $news->isPrivate = ($request->isPrivate) ?? 0;
      $news->save();
      return redirect()->route('admin.news.show', $news)->with('success', 'Новость изменена!');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
    }
}
