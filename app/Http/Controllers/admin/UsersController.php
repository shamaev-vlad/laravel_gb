<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\ValidUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->paginate(5);
        return view('admin.crudUser', ['users' => $users]);
    }

    public function show(User $user)
    {
        return redirect()->route('admin.user.edit')->with('user', $user);
    }

    public function edit(User $user){
      return view('admin.editUser')->with('user', $user);
    }


    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect()->route('admin.updateProfile');
    }

    public function destroy(User $user) {
      $user->delete();
      return redirect()->route('admin.user.index')->with('sucsess', 'Профиль успешно удалён!');
    }




}
