<?php

namespace App\Repositories\Todo;

use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function __construct(protected Todo $model)
    {
    }

    public function all()
    {
        return $this->model::all();
    }

    public function paginate(int $perPage)
    {
        return $this->model::paginate($perPage);
    }

    public function create($title, $body)
    {
        $this->model::create(['title' => $title, 'body' => $body]);
    }

    public function update($title, $body, $todo)
    {
        return $todo->update(['title' => $title, 'body' => $body]);
    }

    public function delete($todo)
    {
        return $todo->delete();
    }
}
