<?php

namespace App\Http\Controllers;

use App\Http\Models\TasksModel;


class Controller
{
	/*
	*   Method: viewHomepage
	*	Returning homepage view with all available tasks
	*/
    public function viewHomepage()
    {
    	$tasksModel = new TasksModel();
    	$tasks = $tasksModel->getTasks();

    	return view('homepage', ['tasks' => $tasks]);
    }
}

