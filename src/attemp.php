<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//if($argv[1] == 'run'){
//    $filePath = trim(readline("Please enter file path:"));
//    exit;
//}
//if($argv[1] == 'q'){
//    fprintf(STDOUT, "exit" . PHP_EOL);
//    exit;
//}

while ($command = fgets(STDIN)) {
    $command = strtolower(trim($command));
    switch ($command) {
        case "run":
            $line = fprintf(STDOUT, "Please enter file path:" . PHP_EOL, $command);
            $filePath = trim($line);
            echo $filePath;
            break;
        case "q":
            fprintf(STDOUT, "Exit..." . PHP_EOL, $command);
            exit;
        default:
            fprintf(STDOUT, "%s is good" . PHP_EOL, $command);
            break;
    }
}