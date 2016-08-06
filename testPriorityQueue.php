<?php

/*
** Compare Priority Queue function with heap
*/

// Adding required files
require_once('heapSort.php');
require_once('bubbleSort.php');

// Testing priority Queue using Heap Sort
$startTime = microtime(true);
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

$endTime = microtime(true);

// Execution time for priority Queue Using Heap Sort
$executionTime = ($endTime - $startTime)/60;

echo "<br>Execution time for Priority Queue using Heap Sort: ". $executionTime ."<br>";

// Testing priority Queue using Bubble Sort
$startTime = microtime(true);
$bubble = new bubbleSort();
$bubble->insert(19);
$bubble->insert(36);
$bubble->insert(54);
$bubble->insert(100);
$bubble->insert(17);
$bubble->insert(0);
$bubble->insert(3);
$bubble->insert(25);
$bubble->insert(1);
$bubble->insert(67);
$bubble->insert(2);
$bubble->insert(7);

if (!$bubble->isEmpty()) {
    $sortedArray = $bubble->extract();
    foreach($sortedArray as $value) {
	echo $value . " ";
    }
}
$endTime = microtime(true);

// Execution time for priorityQueue using Bubble Sort
$executionTime = ($endTime - $startTime)/60;

echo "<br>Execution time for Priority Queue using Bubble Sort: ". $executionTime ."<br>";
