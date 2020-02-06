<?php
/**
 * Created by PhpStorm.
 * User: jbreem
 * Date: 06/02/2020
 * Time: 20:05
 */

$myTasks = array ();

do {
    $myTask = readline("Enter a task : ");

    if($myTask != ""){
        array_push($myTasks,$myTask);
    }

}while($myTask != "");

showTasks($myTasks);

$delete = readline("do you want to delete a task ? (y/n)");

while($delete === "y"){
    $id = readline("which one do you want to remove ? (number of the task)");
    unset($myTasks[$id]);

    showTasks($myTasks);

    $delete = readline("do you want to delete a task again ? (y/n)");
}

function showTasks($tasks){
    foreach ($tasks as $key => $task) {
        print($key);
        print(" => ");
        print($task);
        print("\n");
    }
}



