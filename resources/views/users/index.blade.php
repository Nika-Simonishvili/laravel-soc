<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Avatar</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <th scope="row"><img src="{{ asset('storage/avatar-'. $user->id . '.png') }}" width="40"
                                         class="mr-2"/></th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if(!auth()->user()->hasFriend($user))
                        <td>
                            <form action="{{route('SendfriendRequest')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit">
                                    <img src="https://cdn-icons-png.flaticon.com/512/748/748137.png"
                                         style="width: 20px"/>
                                </button>
                            </form>
                        </td>
                    @else
                        <td>
                            <form action="{{route('unFriend')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit">
                                    <img src="https://cdn-icons-png.flaticon.com/512/8619/8619283.png"
                                         style="width: 20px"/>
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</x-app-layout>

