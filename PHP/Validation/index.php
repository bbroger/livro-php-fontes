<?php

require 'vendor/autoload.php';

use Respect\Validation\Validator as v;

$number = 123;
$nr = v::numericVal()->validate($number); // true

print $nr;

$user = new stdClass;
$n = $user->name = 'Alexandre';
$user->birthdate = '1987-07-01';

print $n;

// https://respect-validation.readthedocs.io/en/2.0/
