<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('danger') }}</strong>
                    </div>
                @endif

                <h4 class="text-dark">Feeds </h4> <br>
                @forelse ($feedsData as $posts)
                    @foreach($posts as $post)
                        <a href="{{ route('profile', ['id' => $post->user->id]) }}"><h5 class="mt-4 text-primary"> {{ $post->user->name }} </h5></a>
                        <p class="text-secondary ">{{ $post->created_at->diffForHumans(['parts' => 2]) }}</p>
                            <br/>
                        <h5> {{ $post->title }} </h5>  <br>
                        <span> {{ $post->body }} </span> <br>
                        <div>
                            comments:
                            @foreach($post->comments as $comment)
                                {{ $comment->content }}
                            @endforeach
                        </div>
                        <hr>
                    @endforeach
                @empty
                    <p>No new feeds :(</p>
                @endforelse
            </div>
        </div>
</x-app-layout>
