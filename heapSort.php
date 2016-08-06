<?php

/*
** Heap Sort algorithm class 
** Using sortingInterface interface as template
*/
require_once('sortingInterface.php');
class heapSort implements sortingInterface {
    protected $heap;

    public function __construct() {
        $this->heap  = array();
    }

    /*
    ** Function to check the heap is empty 
    */
    public function isEmpty() {
        return empty($this->heap);
    }

    /*
    ** Function to return the heap size
    */
    public function count() {
        return count($this->heap) - 1;
    }

    /*
    ** Function to return the heap root data
    */
    public function extract() {
        if ($this->isEmpty()) {
            throw new RunTimeException('Heap is empty');
        }

        // extract the root item
        $root = array_shift($this->heap);

        if (!$this->isEmpty()) {
            // move last item into the root so the heap is no longer disjointed
            $last = array_pop($this->heap);
            array_unshift($this->heap, $last);

            // transform semiheap to heap
            $this->adjust(0);
        }

        return $root;
    }

    /*
    ** Function to compare two values
    */    
    public function compare($item1, $item2) {
        if ($item1 === $item2) {
            return 0;
        }

        // Returns true when first number is less than second
        return ($item1 < $item2 ? 1 : -1);
    }

    /*
    ** Function to check the node is leaf node or not
    ** Always 2n + 1 nodes are present in the sub-heap
    */
    protected function isLeaf($node) {
        return ((2 * $node) + 1) > $this->count();
    }

    /*
    ** Recursive function to rearrage the heap
    */
    protected function adjust($root) {

        // if root is a leaf
        if (!$this->isLeaf($root)) {
            $left  = (2 * $root) + 1; // left child
            $right = (2 * $root) + 2; // right child

            // if root is less than either of its children
            $h = $this->heap;
            if ( (isset($h[$left]) && $this->compare($h[$root], $h[$left]) < 0) 
              || (isset($h[$right]) && $this->compare($h[$root], $h[$right]) < 0) ) {

                // find the larger child
                if (isset($h[$left]) && isset($h[$right])) {
                  $j = ($this->compare($h[$left], $h[$right]) >= 0) ? $left : $right;
                }
                else if (isset($h[$left])) {
                  $j = $left; // left child only
                }
                else {
                  $j = $right; // right child only
                }

                // swap places with root
                list($this->heap[$root], $this->heap[$j]) = 
                  array($this->heap[$j], $this->heap[$root]);

                // recursively adjust semiheap rooted at new node $j
                $this->adjust($j);
            }
        }
    }
    
    /*
    ** Function to insert the item into heap
    */
    public function insert($item) {

	// insert new items at the bottom of the heap
	$this->heap[] = $item;

	// trickle up to the correct location
	$place = $this->count();
	$parent = floor($place / 2);

	// while not at root and greater than parent
	while ($place > 0 && $this->compare($this->heap[$place], $this->heap[$parent]) >= 0 ) {
		// swap places
		list($this->heap[$place], $this->heap[$parent]) = array($this->heap[$parent], $this->heap[$place]);
		$place = $parent;
		$parent = floor($place / 2);
	}
    }
}

$heap = new heapSort();
$heap->insert(19);
$heap->insert(36);
$heap->insert(54);
$heap->insert(100);
$heap->insert(17);
$heap->insert(0);
$heap->insert(3);
$heap->insert(25);
$heap->insert(1);
$heap->insert(67);
$heap->insert(2);
$heap->insert(7);

while (!$heap->isEmpty()) {
    echo $heap->extract() . "\n";
}

