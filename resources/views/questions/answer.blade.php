<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Your Answer') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @csrf
                    <div class="mb-4">
                        <label class="text-xl text-gray-600"> Title <span class="text-danger">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{$questions->title}}" required readonly>
                    </div>

                    <div class="mb-4  bg-light shadow-md m-4 p-4">
                        {!!$questions->content!!}

                    </div>
                    <h1 class="font-bold">Answers</h1><br>
                    @csrf
                    @foreach($answers as $answer)
                    <div class="mb-4 text-teal-500">

                        answered {{ \Carbon\Carbon::parse( $answer->day)->toDayDateTimeString() }} | by {{$answer->name}} </br>

                    </div>
                    <div class="d-flex justify-content-between mb-4 bg-light shadow-md m-4 p-4">
                        <div class="">
                            {!!$answer->comment!!} </br>
                        </div>
                        <div>
                            <form method="post" action="/answer/{{$answer->comment_id}}">
                                @auth
                                @if(Auth::user()->role=='admin')
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-danger text-white px-6 py-2  rounded ">Delete</button>

                                @endif
                                @endauth
                            </form>
                        </div>


                    </div>
                    @endforeach

                    <form method="post" action="{{ route('answer') }}">
                        @csrf
                        <div class="mb-8">
                            <input type="text" name="Question_id" value="{{ $questions->id}} " hidden>
                            <label class="text-xl text-gray-600">Comment <span class="text-danger">*</span></label></br>
                            <textarea name="comment" class="border-2 border-gray-500" value="">
                            </textarea>
                        </div>


                        <button type="submit" class="p-2 bg-primary text-white rounded" value="" required>Publish</button>
                        <a href="/questions" class="p-2 bg-danger text-white rounded" value="">cancel</a>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('comment');
    </script>

</x-app-layout>
