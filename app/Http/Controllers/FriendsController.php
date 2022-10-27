<?php

namespace App\Http\Controllers;

use App\Enums\FriendStatusEnum;
use App\Models\User;
use App\Notifications\friendRequestAcceptedNotification;
use App\Notifications\friendRequestRejectedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        $friendsFrom = Auth::user()->acceptedFriendsFrom;
        $friendsTo = Auth::user()->acceptedFriendsto;
        $friends = $friendsFrom->merge($friendsTo)->paginate(5);

        return view('users.friends', compact('friends'));
    }

    public function friendRequestNotifications()
    {
        $pendingFriendRequests = Auth::user()->pendingFriendsTo;

        return view('notifications.friend_requests', ['pendingFriendRequests' => $pendingFriendRequests]);
    }

    public function sendFriendRequest(Request $request)
    {
        Auth::user()->friendFrom()->attach($request->id, ['status' => FriendStatusEnum::Pending] );

        return redirect('dashboard')->with('success', 'Friend Request was sent.');
    }

    public function acceptFriendRequest(Request $request)
    {
        Auth::user()->friendTo()->sync([$request->id => [ 'status' => FriendStatusEnum::Accepted] ]);
        User::find($request->id)->notify(new friendRequestAcceptedNotification(Auth::user()));

        return redirect('dashboard')->with('success', 'New friend added.');
    }

    public function rejectFriendRequest(Request $request)
    {
        Auth::user()->friendTo()->sync([$request->id => [ 'status' => FriendStatusEnum::Rejected] ]);
        User::find($request->id)->notify(new friendRequestRejectedNotification(Auth::user()));

        return redirect('dashboard')->with('reject', 'Friend request rejected.');
    }
}
