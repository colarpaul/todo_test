<?php

namespace App\Http\Models;

use DB;

class TasksModel
{
    /*
    *   Method: getTasks
    *   Returning all tasks from database ordered descending by id
    */
      public function getTasks(){
      return DB::table('tasks')->orderBy('id', 'desc')->get();
    }

    /*
    *   Method: addTask
    *   Inserting a new task (a new row) in database by a given task description
    */
      public function addTask($description){
      return DB::table('tasks')->insertGetId(['description' => $description]);
    }

    /*
    *   Method: removeTask
    *   Remove a task from database by a given task id
    */
    public function removeTask($id){
      DB::table('tasks')->where('id', $id)->delete();
    }

    /*
    *   Method: updateStatusTask
    *   Update status from a task by a given task id and current status from that task
    */
    public function updateStatusTask($data){
      DB::table('tasks')->where('id', $data['id'])->update(['checked' => $data['checked']]);
    }
}
