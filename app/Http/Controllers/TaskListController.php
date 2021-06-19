<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaskListRequest;
use App\Models\TaskList;

class TaskListController extends Controller
{
  
  public function index () {
    return response()->json(TaskList::with('tasks')->get());
  }
  
  public function show () {
  
  }
  
  public function store (TaskListRequest $request) {
    
    $list = TaskList::addUpdate($request->all());
    return response()->json([
      'msg'  => $list ? 'Created' : 'Not Created',
      'list' => $list
    ]);
  }
  
  public function update (TaskListRequest $request, $id) {
    $list = TaskList::addUpdate($request->all(), $id);
    return response()->json([
      'msg'  => 'Updated',
      'list' => $list
    ]);
  }
  
  public function destroy ($id) {
    $result = TaskList::where('id', $id)->delete();
    return response()->json([
      'msg'   => $result ? 'Deleted' : 'Not Deleted',
      'status' => $result,
    ]);
  }
  
  
}
