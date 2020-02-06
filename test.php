<?php
$line = array();
while (!isset($test) OR trim($test) !== '')
{
    $handle = fopen("php://stdin", "r");
    $test = fgets($handle);
    $line[] = $test;
}
fclose($handle);

foreach ($line as $value) {
    echo $value;
}