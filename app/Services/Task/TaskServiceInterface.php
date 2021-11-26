<?php

namespace App\Services\Task;

interface TaskServiceInterface
{
  public function getAll();
  public function store(array $attributes);
  public function addPrerequisitesToATask(array $prerequisites);
  public function getByOrder();
}
