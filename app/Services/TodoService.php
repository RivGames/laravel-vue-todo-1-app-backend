<?php

namespace App\Services;

use App\Dto\Todo\CreateDto;
use App\Dto\Todo\UpdateDto;
use App\Http\Resources\TodoCollection;
use App\Models\Todo;
use App\Repositories\Todo\TodoRepositoryInterface;

class TodoService
{
    public function __construct(private readonly TodoRepositoryInterface $repository)
    {
    }

    public function index(): TodoCollection
    {
        return new TodoCollection($this->repository->paginate(10));
    }

    public function create(CreateDto $dto): string
    {
        $this->repository->create($dto->getTitle(), $dto->getBody());
        return 'Todo Successfully created!';
    }

    public function update(Todo $todo, UpdateDto $dto): string
    {
        $this->repository->update($dto->getTitle(), $dto->getBody(), $todo);
        return 'Todo successfully updated!';
    }

    public function delete(Todo $todo): string
    {
        if ($this->isOwner(auth()->id(), $todo->id)) {
            $this->repository->delete($todo);
            return 'Task Successfully deleted!';
        }
        return 'This is not your task';
    }

    public function isOwner($owner, $belong): bool
    {
        return $owner === $belong;
    }
}
