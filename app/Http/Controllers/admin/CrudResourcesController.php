<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Resources;
use App\Http\Requests\ValidResource;
use Illuminate\Http\Request;

class CrudResourcesController extends Controller
{
  public function index()
  {
      return view('admin.crudResources')->with('resources', Resources::all());
  }

  public function create()
  {
      return view('admin.addResource')->with('resources', new Resources());
  }

  public function store(ValidResource $request)
  {
      $validated = $request->validated();
      $resources = new Resources();
      $resources->fill($request->all())->save();
      return redirect()->route('admin.resources.index')->with('success', 'Ресурс добавлен успешно!');
  }

  public function show(Resources $resources)
  {
      //dd($category);
      return view('admin.crudResources')->with('resources', $resources);
  }


  public function edit(Resources $resources)
  {
      return view('admin.addResource')->with('resources', $resources);
  }

  public function update(ValidResource $request, Resources $resources)
  {
      $validated = $request->validated();
      $resources->fill($request->all())->save();
      return redirect()->route('admin.resources.index')->with('success', 'Ресурс обновлён успешно!');
  }

  public function destroy(Resources $resources)
  {
      $resources->delete();
      return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно удалён');
  }
}
