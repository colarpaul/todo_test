<?php

namespace App\Http\Controllers;

use App\Http\Models\TasksModel;
use Illuminate\Http\Request;


class TasksController
{
	/*
	*   Method: addTask
	*	Inserting a new task to the database by a given description name
	*/
    public function addTask(Request $request)
    {
    	$description = $request->get('description');

    	$tasksModel = new TasksModel();
    	
    	return $tasksModel->addTask($description);
    }

    /*
	*   Method: removeTask
	*	Removing a task from the database by a given id
	*/
    public function removeTask(Request $request)
    {
    	$id = $request->get('id');

    	$tasksModel = new TasksModel();
    	$tasksModel->removeTask($id);
    }

    /*
	*   Method: updateStatusTask
	*	Update a task from the database by a given id and checked (variable)
	*/
    public function updateStatusTask(Request $request)
    {
    	$data = [
    		'id' => $request->get('id'),
    		'checked' => $request->get('checked'),
    	];

    	$tasksModel = new TasksModel();
    	$tasksModel->updateStatusTask($data);
    }
}

