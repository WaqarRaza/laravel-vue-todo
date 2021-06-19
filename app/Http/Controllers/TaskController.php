<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
  
  public function store (TaskRequest $request, $list_id) {
    
    $task = Task::addUpdate($request->all(), $list_id);
    return response()->json([
      'msg'  => $task ? 'Created' : 'Not Created',
      'task' => $task
    ]);
  }
  
  public function update (TaskRequest $request, $list_id, $id) {
    $task = Task::addUpdate($request->all(), $list_id, $id);
    return response()->json([
      'msg'  => 'Updated',
      'task' => $task
    ]);
  }
  
  public function completed (Task $task, $value = 1) {
    $task->markCompleted($value);
    return response()->json([
      'msg' => 'Status Changed',
    ]);
  }
  
  public function destroy ($id) {
    $result = Task::where('id', $id)->delete();
    return response()->json([
      'msg'    => $result ? 'Deleted' : 'Not Deleted',
      'status' => $result,
    ]);
  }
  
  
}
