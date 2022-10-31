<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="container">
        <img src="{{ asset('storage/avatar-'. auth()->id(). '.png') }}" width="100" class="mr-2"/>
        <h1 class="mt-3">{{ $user->name }}</h1>

        <div class="mt-3">
            <a href="{{route('posts.create')}}"> <button class="btn btn-primary">Add new post.</button> </a>
        </div>
    </div>
</x-app-layout>

