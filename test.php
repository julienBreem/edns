<?php
/**
 * Created by PhpStorm.
 * User: jbreem
 * Date: 06/02/2020
 * Time: 20:05
 */

$myTasks = array ();

do {
    //print("Enter a task");
    $myTask = readline("Enter a task : ");
    //$myTask = fopen('','r');

    //print($myTask);
    if($myTask != ""){
        array_push($myTasks,$myTask);
    }

    //print("\n");

}while($myTask != "");

foreach ($myTasks as $key => $task) {
    print($key);
    print(" => ");
    print($task);
    print("\n");
}

$delete = readline("do you want to delete a task ? (y/n)");

while($delete === "y"){
    $id = readline("which one do you want to remove ? (number of the task)");
    unset($myTasks[$id]);

    print("\n");

    foreach ($myTasks as $key => $task) {
        print($key);
        print(" => ");
        print($task);
        print("\n");
    }

    $delete = readline("do you want to delete a task again ? (y/n)");

}



