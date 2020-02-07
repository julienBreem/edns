<html>
    <body>

    <?php

    $myfile = fopen("tasks.txt", "w");
    session_start();
    if(!isset($_SESSION["tasks"]))
        $_SESSION["tasks"] = array();

    ?>

    <form action="" method="post">
        task : <input type="text" name="task"><br>
       <input type="submit">
    </form>

    <?php

    if(isset($_POST["task"]) && $_POST["task"] != "" ){
        //fwrite($myfile, $_POST["task"]);
        if(isset($_SESSION["tasks"]))
            array_push($_SESSION["tasks"],$_POST["task"]);
    }

    if(isset($_SESSION["tasks"])){
        foreach($_SESSION["tasks"] as $key => $val)
        {
            echo $key . " => " . $val . "<br>";
        }
    }

    ?>

    </body>
</html>