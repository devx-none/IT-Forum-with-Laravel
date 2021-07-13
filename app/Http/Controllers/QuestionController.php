<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $questions = Question::all();
        // $questions = Question::join('users', 'questions.user_id', '=', 'users.id')->select('users.*,questions.*,datediff(questions.created_at,now()) as day')->get();

        $questions = Question::selectRaw('*, datediff(now(), created_at) as day')->orderBy('created_at','desc')->get();

        return view('questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('index')
        ->with('success','Question created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::selectRaw('*, datediff(created_at, now()) as day')
        ->where('id', $id)->get();
        return view('questions.answer', ['questions' => $questions]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $question= Question::findOrFail($id);
        $question->delete();
        return redirect()->route('index')
        ->with('success', 'Question deleted successfully');

    }
}
