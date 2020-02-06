<?php

    $basedir = basename(__DIR__);

    exit == 1;
    do{

        echo "Type in your tasks details (or nothing to cancel this out): ";
        $handle = fopen ("php://stdin","r");
        $line = fgets($handle);
        if(trim($line) != ''){

        }
        else{
            exit == 0;
        }
    }while(exit);


?>