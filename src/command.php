<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// :: - optional
// longopts --
// shortopts -
$shortopts = "c:r::d:r::d";
$longopts = ["help", "crypt"];
$opts = getopt($shortopts, $longopts);



if(!empty($opts)){

    // crypt
    if (isset($opts["c"])) {
        
        $file = $opts["c"];
        
        $filePath = getFileName($file);
        
        echo 'crypt ' . $filePath['name'] . "\n";
    }
    // decrypt
    if (isset($opts["d"])) {
        
        $file = $opts["d"];
        
        $filePath = getFileName($file);
        
        echo 'decrypt ' . $filePath['name'] . "\n";
    }
    // delete file
    if (isset($opts["r"])) {
//        $file = $opts["d"] ? $opts["d"] : $opts["c"];
        $file = $opts["d"] ?: $opts["c"];
        
        $filePath = getFileName($file);
        
        echo 'delete ' . $filePath['name'] . "\n";
    }
}

$command = $argv[1];
switch ($command) {
    case "crypt":  // создать файл
        echo "Please enter file path: ";
        $filePath = trim(fgets(STDIN));
        getFileName($filePath);
        break;
    case "q":
        fprintf(STDOUT, "Exit..." . PHP_EOL, $command);
        exit;
    default:
        echo "Not found command. --help fo help \n";
        exit;
        break;
}

function createDir($path){
    $output = shell_exec("mkdir -pv {$path}");
    echo "$output";
}

function getFileName($path){
    $delimiter = '/';
    $stringParts = explode($delimiter, $path);
    $lengh = count($stringParts);

    $fileName = array_pop($stringParts);
    
    $path = implode('/', $stringParts);
    
    if($lengh > 1) $path .= '/';
    
    return ['path' => $path, 'name' => $fileName];
}