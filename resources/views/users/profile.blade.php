<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="container">
        <img src="{{ asset('storage/avatar-'. auth()->id(). '.png') }}" width="100" class="mr-2"/>
        <h1 class="mt-3">{{ auth()->user()->name }}</h1>
    </div>
</x-app-layout>

