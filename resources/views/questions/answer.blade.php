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
                    @foreach($questions as $question)
                    <div class="mb-4">
                        <label class="text-xl text-gray-600"> Title <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{$question->title}}" required readonly>
                    </div>

                    <div class="mb-4">
                        {!!$question->content!!} </br>

                    </div>
                    <form method="post" action="{{ route('answer') }}">
                        <div class="mb-8">
                            <input type="hidden" name="Question_id" value="{{ $question->id}}">
                            <label class="text-xl text-gray-600">Comment <span class="text-red-500">*</span></label></br>
                            <textarea name="comment" class="border-2 border-gray-500" value="">

                            </textarea>
                        </div>


                        <button type="submit" class="p-5 bg-blue-500 text-white hover:bg-blue-400" value="" required>Publish</button>

                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('comment');
    </script>

</x-app-layout>
