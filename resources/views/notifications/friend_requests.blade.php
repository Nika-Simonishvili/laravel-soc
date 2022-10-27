<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Friend Requests</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pendingFriendRequests as $pendingFriendRequest)
                <tr>
                    <td>{{ $pendingFriendRequest->name . ' sent you a friend request'}}</td>
                    <td class="flex">
                        <form action="{{ route('acceptFriendRequest') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pendingFriendRequest->id }}">
                            <button type="submit">
                                <img src="https://cdn-icons-png.flaticon.com/512/5610/5610944.png" style="width: 20px"/>
                            </button>
                        </form >
                        <form action="" method="POST" class="ml-4">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <button type="submit">
                                <img src="https://cdn-icons-png.flaticon.com/512/5978/5978441.png" style="width: 20px"/>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @empty
                No new friend requests.
            @endforelse
        </table>
</x-app-layout>

