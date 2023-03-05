<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

    $path_parts = pathinfo('/www/htdocs/index.html');

    echo $path_parts['dirname'], "\n";
    echo $path_parts['basename'], "\n";
    echo $path_parts['extension'], "\n";
    echo $path_parts['filename'], "\n"; // Since PHP 5.2.0
    
    $from = 'one-encrypted.txt';
    $from = preg_replace('/\.[^.](?>-).*+$/','',$from);
    
    echo $from;