<?php

namespace App\Http\Repositories\Question;

interface QuestionRepositoryInterface
{
    public function save($data);

    public function all();
}
