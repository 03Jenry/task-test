<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return TaskResource::collection($tasks);
    }

    public function store(StoreRequest $request)
    {
        $task = $this->taskService->createTask($request->all());
        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $task = $this->taskService->getTask($id);
        return new TaskResource($task);
    }

    public function update(Request $request, int $id)
    {
        $task = $this->taskService->updateTask($id, $request->all());
        return new TaskResource($task);
    }

    public function destroy(int $id)
    {
        $this->taskService->deleteTask($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
