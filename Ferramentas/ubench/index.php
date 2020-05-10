<?php

require_once 'src/Ubench.php';

$bench = new Ubench;

$bench->start();

// Execute some code

$bench->end();

// Get elapsed time and memory
echo $bench->getTime().'<br>'; // 156ms or 1.123s
echo $bench->getTime(true).'<br>'; // elapsed microtime in float
echo $bench->getTime(false, '%d%s').'<br>'; // 156ms or 1s

echo $bench->getMemoryPeak().'<br>'; // 152B or 90.00Kb or 15.23Mb
echo $bench->getMemoryPeak(true).'<br>'; // memory peak in bytes
echo $bench->getMemoryPeak(false, '%.3f%s').'<br>'; // 152B or 90.152Kb or 15.234Mb

// Returns the memory usage at the end mark
echo $bench->getMemoryUsage().'<br>'; // 152B or 90.00Kb or 15.23Mb

// Runs `Ubench::start()` and `Ubench::end()` around a callable
// Accepts a callable as the first parameter.  Any additional parameters will be passed to the callable.
$result = $bench->run(function ($x) {
    return $x;
}, 1);
echo $bench->getTime().'<br>';
