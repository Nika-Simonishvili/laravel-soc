<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h4 class="text-dark mb-4" >Add new post</h4>
                <div class="card">
                    <form class="form-control" method="POST" action="/posts" enctype="multipart/form-data">
                        @csrf
                        <label for="title">Post title:</label> <br>
                        <input type="text" name="title"> <br>

                        <label for="body" class="mt-3">Post body:</label> <br>
                        <textarea type="text" name="body"> </textarea> <br>

                        <button type="submit" class="mt-3 btn btn-outline-primary">Submit</button>
                    </form>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li class="text-danger">{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
</x-app-layout>

