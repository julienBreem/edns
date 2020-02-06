<?php
$line = array();
while (!isset($test) OR trim($test) !== '')
{
    $handle = fopen("php://stdin", "r");
    $test = fgets($handle);
    $line[] = $test;
}
fclose($handle);

foreach ($line as $value)
{
    echo $value;
}

while (trim($test) !=='non')
{
    echo'voulez vous supprimer une entrée(yes/non) ?';

    $handle = fopen("php://stdin", "r");
    $test = fgets($handle);
    if(trim($test) == 'yes')
    {
        foreach ($line as $key => $value)
        {
            echo $key . '=>' . $value;
        }
        echo'choisir id a supprimer';

        $handle = fopen("php://stdin", "r");
        $test = fgets($handle);
        unset($line[trim($test)]);
    }
    echo 'Voici la liste des items restant';
    foreach ($line as $value)
    {
        echo $value;
    }
}

