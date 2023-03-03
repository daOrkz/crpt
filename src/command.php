<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$config = include './config.php';

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
        $pass = trim(readline("Please enter password for encrypt:"));

        $contents = file_get_contents($file);
        $contetsEncrypted = openssl_encrypt($contents, $config["method"], $pass);
        
        $fileEncrypted = 'encrypted.txt';
        $pathToFile = $filePath['path'] . $fileEncrypted;
        file_put_contents($pathToFile, $contetsEncrypted);
        
        echo 'crypt ' . $filePath['name'] . "\n";
    }
    // decrypt
    if (isset($opts["d"])) {
        
        $file = $opts["d"];
        
        $filePath = getFileName($file);
        $pass = trim(readline("Please enter password for decrypt:"));

        $contents = file_get_contents($file);
        $contentsDecrypted = openssl_decrypt($contents, $config["method"], $pass);
        
        $fileDecrypted = 'decrypted.txt';
        $pathToFile = $filePath['path'] . $fileDecrypted;
        file_put_contents($pathToFile, $contentsDecrypted);
        
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