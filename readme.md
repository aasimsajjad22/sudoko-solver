# Sudoku Challenge

The classical Sudoku is a game, where the player needs to fill the gaps in a matrix of numbers in a way that three constraints are met.

## Installation
Install [PHP](https://www.php.net/downloads.php)

## Usage

Clone the branch in your php folder and run sudoku.php
OR
Clone the branch in your php folder and Click on this link [Sudoku.php](http://localhost/sudoku.php).


2. What was the thought process while implementing the solution?

   ```My thought process while implementing the solution can be broken down in the following points```

    - All rows of the matrix should contain unique values from 1 to 9.
    - All columns of the matrix should contain unique values from 1 to 9.
    - All 9 3x3 grid should contain unique values from 1 to 9.
    - Create a function Validate that checks if the given matrix is valid sudoku or not.
    - Check all rows for duplicate values, any duplicate value in any row will result in failure
    - Calculate mask
    - Check all columns for duplicate values, any duplicate value in any column will result in failure.
    - Calculate mask to get or set any bit from bitMap
    - Check of 9 blocks, Each block contains 3 rows and 3 columns. Any duplicate value in any block will result in failure.
    - Set x and y start index for every block to traverse through all the rows and columns of the block
    - If validation for all rows, columns and blocks are passed then Sudoku is valid otherwise it is not.
    - Define an Input to validate the given sudoku.

## Tools and Technologies
    PHP 7.4.3.

