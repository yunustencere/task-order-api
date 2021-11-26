<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use Throwable;


class TaskController extends Controller
{
    protected $service;
    public function __construct(
        TaskServiceInterface $service
    ) {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $tasks = $this->service->getAll();
            return response()->json(['result' => 'success', 'tasks' => $tasks], 201);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function show()
    {
    }
    public function store(StoreRequest $request)
    {
        try {
            $task = $this->service->store($request->all());
            return response()->json(['result' => 'success', 'task' => $task], 201);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
    public function update(UpdateRequest $request)
    {
        try {
            return $this->service->addPrerequisitesToATask($request->all());
            return response()->json(['result' => 'success'], 200);
        } catch (Throwable $th) {
            // return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
    public function getByOrder()
    {
        try {
            // return "xx";
            $test = $this->service->getByOrder();
            return response()->json(['result' => 'success', 'test' => $test], 200);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy()
    {
    }
}
