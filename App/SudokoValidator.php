<?php
namespace App;

class SudokoValidator
{
    /** @var array  */
    private $sudoko;

    public function __construct(array $sudoko) {
        $this->sudoko = $sudoko;
    }

    public function validate() {
        $bitMap = 0;
        for($b = 0 ; $b < 9 ; $b++) {
            $xStart = floor($b /3) * 3;
            $yStart = ($b % 3) * 3;
            $bitMap = 0;
            for($x = $xStart ; $x < $xStart + 3 ; $x++) {
                for($y = $yStart ; $y < $yStart + 3 ; $y++) {
                    for($row = 0 ; $row <9 ; $row++) {
                        if(!$this->checkForDuplicateValues($x, $y, $bitMap)) {
                            return false;
                        };
                    }
                }
            }
            for($row = 0 ; $row <9 ; $row++) {
                $bitMap = 0;
                for($col = 0 ; $col <9 ; $col++) {
                    for($row = 0 ; $row <9 ; $row++) {
                        if(!$this->checkForDuplicateValues($row, $col, $bitMap)) {
                            return false;
                        };
                    }
                }
            }
            for($col = 0 ; $col <9 ; $col++) {
                $bitMap = 0;
                for($row = 0 ; $row <9 ; $row++) {
                    if(!$this->checkForDuplicateValues($row, $col, $bitMap)) {
                        return false;
                    };
                }
            }
        }
    }

    private function checkForDuplicateValues($x, $y, &$bitMap) {
        if('0' != $this->sudoku[$x][$y]){
            $mask = pow(2,$this->sudoku[$x][$y]);
            if(($bitMap & $mask) == 0) {
                $bitMap = $bitMap | $mask;
                return true;
            }
            else {
                return false;
            }
        }
    }


}