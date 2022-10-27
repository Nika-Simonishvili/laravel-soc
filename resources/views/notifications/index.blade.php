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
                <th scope="col">Notifications</th>
            </tr>
            </thead>
            <tbody>
            @forelse(auth()->user()->notifications as $notification)
                <td>{{ $notification->data['message']}} </td>
            @empty
                No new notifications.
            @endforelse
            </tbody>
        </table>
</x-app-layout>

