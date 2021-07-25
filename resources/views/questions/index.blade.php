<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Top Question') }}
        </h2>
    </x-slot>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth


            <!-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a> -->

            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="flex flex-col ">
            <div class=""><a href="{{url('/questions/create')}}" class="bg-primary text-white justify-center px-6 py-2 rounded ">Ask Your Question</a></div>

            @foreach($questions as $question)
            <!-- <div class="card">
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
            </div> -->

            <div class="flex  bg-white shadow-md m-4 p-4 ">
                <div>
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">

                </div>
                <div class="flex flex-col justify-between ml-4">
                    <h3 class="font-bold text-teal-500"> {{$question->title}}</h3>
                    <a href="questions/answer/{{$question->id}}">
                        <h2 class="font-bold text-xl">{{$question->title}}</h2>
                    </a>

                    <p class="text-secondary">{{$question->day}} day ago </p>

                    <form method="post" action="questions/{{$question->id}}">

                        @auth
                        @if(Auth::user()->role=='admin')
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-danger text-white px-6 py-2  rounded ">Delete</button>

                        @endif
                        @endauth
                    </form>


                </div>
                <div></div>

            </div>
            @endforeach
        </div>


    </div>

</x-app-layout>
