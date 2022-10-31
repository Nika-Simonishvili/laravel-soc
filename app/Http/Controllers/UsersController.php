<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::whereNot('id', auth()->id())->paginate(10)
        ]);
    }

    public function MyProfile()
    {
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }

    public function profile($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }
}
