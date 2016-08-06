<?php

/*
** Interface for sorting algorithm
*/
interface sortingInterface {

	// Function to check the respective array is empty 
	public function isEmpty();

	public function count();

	public function extract();

	public function insert($item);

	public function compare($item1, $item2);
}
