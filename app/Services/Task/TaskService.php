<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskService implements TaskServiceInterface
{
  private $tasks;
  private $attributes;

  public function getAll()
  {
    return Task::all();
  }

  public function store(array $attributes)
  {
    return Task::create($attributes);
  }

  public function addPrerequisitesToATask(array $attributes)
  {
    $this->tasks = Task::all()->toArray();
    $this->attributes = $attributes;
    $this->checkIfPrerequisiteIsValid($attributes['id'], true, $attributes['prerequisites']);
    return Task::find($attributes['id'])->update(['prerequisites' => $attributes['prerequisites']]);
  }

  /*
 *iterate updated task recursively to check if its id exists in any related tasks
 */
  private function checkIfPrerequisiteIsValid(int $id, bool $isInitial = false, array $requestPrerequisites = [])
  {
    $task = $this->getTaskById($id);
    $prerequisites = $isInitial ? $requestPrerequisites : $task['prerequisites'];
    foreach ($prerequisites as $key => $prerequisite) {
      if ($prerequisite == $this->attributes['id'])
        $this->throw('The prerequisite id ' . $id . 'that you have entered is causing a loop, try to remove it');
      $this->checkIfPrerequisiteIsValid($prerequisite);
    }
    return true;
  }

  private function getTaskById(int $id)
  {
    foreach ($this->tasks as $key => $task) {
      if ($task['id'] === $id)
        return $task;
    }
  }

  private function throw(string $message)
  {
    throw new HttpResponseException(response()->json([
      'errors' => $message
    ], 422));
  }

  public function getByOrder()
  {
    $this->tasks = Task::all()->toArray();
    $result = [];
    foreach ($this->tasks as $key => $task) {
      if (count($task['prerequisites']) === 0) {
        $temp = $this->getForwardTasks($task);
        $task['forward'] =  $temp;
        $result[] = $task;
      }
    }
    return $result = array_values($result);
  }

  private function getForwardTasks($currentTask)
  {
    $relatedTasks = array_filter($this->tasks, function ($task) use ($currentTask) {
      return in_array($currentTask['id'], $task['prerequisites']);
    });
    $relatedTasks = array_map(
      function ($relatedTask) {
        $relatedTask['forward'] = [...$this->getForwardTasks($relatedTask)];
        return $relatedTask;
      },
      $relatedTasks
    );
    return array_values($relatedTasks);
  }
}
