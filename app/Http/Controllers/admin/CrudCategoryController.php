<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\ValidCategory;
use Illuminate\Http\Request;

class CrudCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crudCategories')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addRubric')->with('category', new Category());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidCategory $request)
    {
        $validated = $request->validated();
        $category= new Category();
        $category->fill($request->all())->save();
        return redirect()->route('admin.category.index')->with('success', 'Рубрика добавлена успешно!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //dd($category);
        return view('admin.crudCategories')->with('categories', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.addRubric')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ValidCategory $request
     * @return \Illuminate\Http\Response
     */
    public function update(ValidCategory $request, Category $category)
    {
        $validated = $request->validated();
        $category->fill($request->all())->save();
        return redirect()->route('admin.category.index')->with('success', 'Рубрика обновлена успешно!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Рубрика успешно удалена');
    }
}
