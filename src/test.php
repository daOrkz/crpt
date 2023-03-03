<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//var_dump(empty($expected_array_got_string['some_key']));
//var_dump(empty($expected_array_got_string[0]));
//var_dump(empty($expected_array_got_string['0']));
//var_dump(empty($expected_array_got_string[0.5]));
//var_dump(empty($expected_array_got_string['0.5']));
//var_dump(empty($expected_array_got_string['0 Mostel']));

$expected_array_got_string = ['0 Mostel'];
var_dump(empty($expected_array_got_string));
$expected_array_got_string = [0];
var_dump(empty($expected_array_got_string));
$expected_array_got_string = ['0'];
var_dump(empty($expected_array_got_string));
$expected_array_got_string = [0.5];
var_dump(empty($expected_array_got_string));
$expected_array_got_string = ['0.5'];
var_dump(empty($expected_array_got_string));
$expected_array_got_string = ['0 Mostel'];

var_dump(empty($expected_array_got_string));