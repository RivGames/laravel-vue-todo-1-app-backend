<?php

namespace App\Services;

use App\Dto\Todo\CreateDto;
use App\Dto\Todo\UpdateDto;
use App\Http\Resources\TodoCollection;
use App\Models\Todo;

class TodoService
{
    public function index(): TodoCollection
    {
        return new TodoCollection(Todo::paginate(5));
    }

    public function create(CreateDto $dto): string
    {
        $todo = new Todo();
        $todo->title = $dto->getTitle();
        $todo->body = $dto->getBody();
        $todo->save();
        return 'Todo Successfully created!';
    }

    public function update(Todo $todo, UpdateDto $dto): string
    {
        $todo->update([
            'title' => $dto->getTitle(),
            'body' => $dto->getBody(),
        ]);
        return 'Todo successfully updated!';
    }

    public function delete(Todo $todo): string
    {
        if ($this->isOwner(auth()->id(), $todo->id)) {
            $todo->delete();
            return 'Task Successfully deleted!';
        }
        return 'This is not your task';
    }

    public function isOwner($owner, $belong): bool
    {
        return $owner === $belong;
    }
}
