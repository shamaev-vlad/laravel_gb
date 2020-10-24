<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $users = User::query()->where('id', '!=', Auth::id())->get();
         return view('admin.crudUser', ['users' => $users]);
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return redirect()->route('admin.user.edit')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.editUser')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ValidUser $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
     public function toggleAdmin(User $user) {
         if ($user->id != Auth::id()) {
             $user->is_admin = !$user->is_admin;
             $user->save();
             return redirect()->route('admin.updateUser')->with('success', 'Права изменены');
         }
         return redirect()->route('admin.updateUser')->with('success', 'Нельзя снять админа с себя.');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Профиль успешно удален!');
    }

}
