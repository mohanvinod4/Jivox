<?php

/*
** Interface for sorting algorithm
*/
interface sortingInterface {

	// Function to check the respective array is empty 
	public function isEmpty();

	// Function to return size
	public function count();

	// Function to return data
	public function extract();

	// Function to add data
	public function insert($item);

	// Function to compare two values
	public function compare($item1, $item2);
}
