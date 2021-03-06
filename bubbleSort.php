<?php

/*
** Heap Sort algorithm class 
** Using sortingInterface interface as template
*/
require_once('sortingInterface.php');
class bubbleSort implements sortingInterface {
    protected $bubbleArr;

    public function __construct() {
        $this->bubbleArr  = array();
    }

    /*
    ** Function to check the array is empty 
    */
    public function isEmpty() {
        return empty($this->bubbleArr);
    }

    /*
    ** Function to return the array size
    */
    public function count() {
        return count($this->bubbleArr) - 1;
    }

    /*
    ** Function to return the bubble array
    */
    public function extract() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Array is empty');
        }

        return $this->bubbleArr;
    }

    /*
    ** Function to compare two values
    */    
    public function compare($item1, $item2) {
        
        // Returns true when first number is less than second
	// Change the greater than symbol to lesser than you can sort in reverse order
        return ($item1 > $item2 ? 1 : -1);
    }

    /*
    ** Function to insert the item into bubble array
    */
    public function insert($item) {

	// insert at the bottom
	$this->bubbleArr[] = $item;
	$n = $this->count();

	// Check the last value if lessthan current value then return
	if($this->compare($this->bubbleArr[$n], $item) > 0) {
		return;
	}

	for ($i = 1; $i < $n; $i++) {
		$flag = false;
		for ($j = $n; $j >= $i; $j--) {
		    if($this->compare($this->bubbleArr[$j], $this->bubbleArr[$j-1]) > 0) {
		        $tmp = $this->bubbleArr[$j - 1];
		        $this->bubbleArr[$j - 1] = $this->bubbleArr[$j];
		        $this->bubbleArr[$j] = $tmp;
		        $flag = true;
		    }
		}
		if (!$flag) {
		    break;
		}
	}

    }
}
