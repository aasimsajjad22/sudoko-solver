<?php

namespace Sudoku;

class sudokuValidate
{
    var $sudoku = array();

    // take inputs
    function mapSudoku($input)
    {
        $this->sudoku = $input;
    }

    function validate()
    {
        $bitMap;

        $xStart = 0;
        $yStart = 0;

        // check for 9 blocks
        // IN Sudoku, we have 9 blocks, each blocks contain 3 rows and 3 columns
        // any duplicate value in any block will fail validation
        for($b = 0 ; $b < 9 ; $b++){

            // set start x index and y index for every block according to block number
            $xStart = floor($b /3) * 3;
            $yStart = ($b % 3) * 3;
            $bitMap = 0;

            // traverse through all rows in the block
            for($x = $xStart ; $x < $xStart + 3 ; $x++){
                // traverse through all columns in the block
                for($y = $yStart ; $y < $yStart + 3 ; $y++){

                    if('0' != $this->sudoku[$x][$y]){
                        // calculate mask to get or set any particular bit from bitMap
                        $mask = pow(2,$this->sudoku[$x][$y]);

                        // check if a bit againt the value is already set to one
                        // if it is already set,it means program already encounter the value, return false,
                        // else set it to one
                        if(($bitMap & $mask) == 0)
                            $bitMap = $bitMap | $mask;
                        else
                            return false;
                    }
                }
            }
        }

        //check all rows for duplicate values
        // any duplicate value in any row will fail validation
            for($row = 0 ; $row <9 ; $row++){
                $bitMap = 0;
                for($col = 0 ; $col <9 ; $col++){
                    if('0' != $this->sudoku[$row][$col]){

                        // calculate mask to get or set any particular bit from bitMap
                        $mask = pow(2,$this->sudoku[$row][$col]);

                        // check if a bit againt the value is already set to one,
                        // if it is already set,it means program already encounter the value, return false,
                        // else set it to one
                        if(($bitMap & $mask) == 0)
                        {
                            $bitMap = $bitMap | $mask;
                        }
                        else
                        {
                            return false;
                        }
                    }
                }
            }

        // check all columns for duplicate values
        // any duplicate value in any column will fail validation
        for($col = 0 ; $col <9 ; $col++){
            $bitMap = 0;
            for($row = 0 ; $row <9 ; $row++){
                if('0' != $this->sudoku[$row][$col]){

                    // calculate mask to get or set any particular bit from bitMap
                    $mask = pow(2,$this->sudoku[$row][$col]);

                    // check if a bit againt the value is already set to one
                    // if it is already set,it means program already encounter the value, return false,
                    // else set it to one
                    if(($bitMap & $mask) == 0)
                        $bitMap = $bitMap | $mask;
                    else
                        return false;
                }
            }
        }



        // if validate for all rows, columns and blocks are passed then Sudoku is valid
        return true;
    }
}

use \Sudoku\sudokuValidate as validateSudoku;

$obj = new validateSudoku();

//define input
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

// set input
$obj->mapSudoku($input);

// validate
echo "Given Sudoku ".($obj->validate() ? "is" : "is not")." a valid Sudoku";

?>