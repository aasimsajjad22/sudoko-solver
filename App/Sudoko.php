<?php

use App\SudokoValidator;

$input =  array(
    array(1,8,2,5,4,3,6,9,7), //1
    array(9,6,5,1,7,8,3,4,2), //2
    array(7,4,3,9,6,2,8,1,5), //3
    array(3,7,4,8,9,6,5,2,1), //4
    array(6,2,8,4,5,1,7,3,9), //5
    array(5,1,9,2,3,7,4,6,8), //6
    array(2,9,7,6,8,4,1,5,3), //7
    array(4,3,1,7,2,5,9,8,6), //8
    array(8,5,6,3,1,9,2,7,) //9
);

$validaor = new SudokoValidator($input);
$validaor->validate();

