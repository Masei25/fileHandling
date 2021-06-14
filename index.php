<?php

function sumFileNum($file){

    try {
        $file = trim($file);
        $fopen = fopen($file, 'r');
    } catch (\Throwable $e) {
        echo "Unable to open $file";
    }

    $fread = fread($fopen,filesize($file));
    fclose($fopen);
    $remove = "\n";
    $splits = explode($remove, $fread);
    
    if(!isset($num)) {
        $num = 0;
    }

    foreach ($splits as $split)
    {
        if(!intval($split)){
            $num += sumFileNum($split);
        }

        if(intval($split)){
            $split = intval($split);
            $num += $split;
        }

    }

    echo $file . " - ". $num . "</br>";

    return $num;
}

sumFileNum("text.txt");
