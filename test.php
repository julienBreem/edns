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
    array_push($myTasks,$myTask);
    //print("\n");

}while($myTask != "");

foreach ($myTasks as $task) {
    print($task);
    print("\n");
}