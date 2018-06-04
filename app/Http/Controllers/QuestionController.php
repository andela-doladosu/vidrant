<?php

namespace App\Http\Controllers;

use App\Question;
use App\Http\Requests\QuestionRequest;
use App\Http\Repositories\Question\QuestionRepositoryInterface;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QuestionRepositoryInterface $questionRepo)
    {
        $this->middleware('auth');
        $this->questionRepo = $questionRepo;
    }

    /**
     * show form for adding a new question
     * @return \illuminate\foundation\view
     */
    public function create()
    {
        return view('pages.questions.create');
    }

    public function store(QuestionRequest $request)
    {
        if ($this->questionRepo->create($request->all())) {
            return redirect()->back()->with('status', 'Your question was added!');
        } else {
            return redirect()->back()->withErrors();
        }
    }
}
