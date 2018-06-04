<?php

namespace App\Http\Repositories\Question;

use App\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function save($data)
    {
        return $this->model->create($data);
    }
}
