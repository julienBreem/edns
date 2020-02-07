<html>
    <body>

    <?php

    $myfile = fopen("tasks.txt", "w");
    session_start();
    if(!isset($_SESSION["tasks"]))
        $_SESSION["tasks"] = array();
    ?>

    <form action="" method="post">
        Enter a task : <input type="text" name="task"><br>
        <input type="submit" value="add">
        Tasks is save in tasks.txt file.
    </form>

    <?php

    if(isset($_POST["task"]) && $_POST["task"] != "" ){
        if(isset($_SESSION["tasks"]))
            array_push($_SESSION["tasks"],$_POST["task"]);
    }

    if(isset($_SESSION["tasks"])){
        foreach($_SESSION["tasks"] as $key => $val)
        {
            echo "task " . $key . ": " . $val ?>
            <form action="" method="post">
                <input type="submit" name="<?php echo $key ?>" value="delete">
            </form>
            <?php

            if(isset($_POST["$key"]) && isset($_SESSION["tasks"])){
                unset($_SESSION["tasks"][$key]);
                header("Refresh:0");
            }

        }
    }

    foreach($_SESSION["tasks"] as $val){
        fwrite($myfile, $val);
    }

?>


    </body>
</html>