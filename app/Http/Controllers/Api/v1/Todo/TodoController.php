<?php

namespace App\Http\Controllers\Api\v1\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\CreateRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
{
    public function __construct(private readonly TodoService $service)
    {
    }

    /**
     * @return TodoCollection
     */
    public function index(): TodoCollection
    {
        return $this->service->index();
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request): JsonResponse
    {
        $message = $this->service->create($request->getDto());
        return response()->json(['message' => $message]);
    }

    /**
     * @param UpdateRequest $request
     * @param Todo $todo
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Todo $todo): JsonResponse
    {
        $message = $this->service->update($todo, $request->getDto());
        return response()->json(['message' => $message]);
    }

    /**
     * @param Todo $todo
     * @return TodoResource
     */
    public function show(Todo $todo): TodoResource
    {
        return new TodoResource($todo);
    }

    /**
     * @param Todo $todo
     * @return JsonResponse
     */
    public function destroy(Todo $todo): JsonResponse
    {
        $message = $this->service->delete($todo);
        return response()->json(['message' => $message]);
    }
}
