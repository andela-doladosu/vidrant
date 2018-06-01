<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * show form for adding a new question
     * @return \illuminate\foundation\view
     */
    public function create()
    {
        return view('pages.questions.create');
    }
}
