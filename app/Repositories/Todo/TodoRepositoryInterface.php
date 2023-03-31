<?php

namespace App\Repositories\Todo;

interface TodoRepositoryInterface
{
    public function all();

    public function create($title, $body);

    public function update($title, $body, $todo);

    public function delete($todo);
}
