<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ask Your Question') }}
        </h2>
    </x-slot>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth


            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>

            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
        @foreach($questions as $question)
        <div class="card">
            <a href="{{url('/questions/create')}}" class="btn btn-primary">Ask Your Question</a>


            <div class="card-header">
                {{$question->title}}
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                @if (Route::has('login'))
                @auth
                <a href="questions/answer/{{$question->id}}" class="btn btn-primary">Post Your Answer</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Post Your Answer</a>
                @endauth
                @endif
                @auth
                <form method="post" action="questions/{{$question->id}}">
                    @if(Auth::user()->role=='admin')
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                    @endif
                </form>
                @endauth
            </div>
            <div class="card-footer text-muted">
                {{$question->day}} day ago
            </div>

            @endforeach
        </div>

</x-app-layout>
