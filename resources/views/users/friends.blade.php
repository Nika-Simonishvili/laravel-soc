<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Avatar</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
{{--                <th scope="col">Actions</th>--}}
            </tr>
            </thead>
            <tbody>

            @foreach($friends as $friend)
                <tr>
                    <th scope="row"><img src="{{ asset('storage/avatar-'. $friend->id . '.png') }}" width="40"
                                         class="mr-2"/></th>
                    <td>{{ $friend->name }}</td>
                    <td>{{ $friend->email }}</td>
{{--                    @if(!auth()->user()->hasFriend(friend))--}}
{{--                        <td>--}}
{{--                            <form action="{{route('SendfriendRequest')}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="id" value="{{friend->id}}">--}}
{{--                                <button type="submit">--}}
{{--                                    <img src="https://cdn-icons-png.flaticon.com/512/748/748137.png"--}}
{{--                                         style="width: 20px"/>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    @endif--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

