<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::whereNot('id', auth()->id())->paginate(10)
        ]);
    }

    public function profile()
    {
        return view('users.profile');
    }
}
