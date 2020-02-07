

<html>
    <body>

    <?php

    $myTasks = array ();

    ?>

    <form action="" method="post">
        task : <input type="text" name="task"><br>
       <input type="submit">
    </form>

    <?php

    echo $_POST["task"];

    ?>

    </body>
</html>