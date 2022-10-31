<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $friendsFrom = Auth::user()->acceptedFriendsFrom;
        $friendsTo = Auth::user()->acceptedFriendsto;
        $friends = $friendsFrom->merge($friendsTo);

        $feedsData = $friends->map(function($query) {
            return $query->posts->load('comments');
        });

        return view("dashboard", compact('feedsData'));
    }
}
