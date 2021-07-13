<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $answers = Comment::selectRaw('*, datediff(created_at, now()) as day')->orderBy('created_at', 'desc')->get();
          $answers = Comment::join('questions', 'questions.id', '=', 'comments.Question_id')
          ->join('users', 'users.id','=', 'comments.User_id')
          ->where('questions.id',$id)
          ->select('questions.*,comments.*,users.*')
           ->get();
        return view('answer.index', ['answers' => $answers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('answer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        request()->validate([
            'comment' => 'required',
            'Question_id' => 'required',

        ]);
        Comment::create([
            'comment' => $request->comment,
            'Question_id' => $request->Question_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('questions')
        ->with('success', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
