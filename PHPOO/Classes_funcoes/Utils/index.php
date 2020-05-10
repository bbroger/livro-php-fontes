<?php

require 'vendor/autoload.php';

use JBZoo\Utils\Dates;
use JBZoo\Utils\Url;

print Dates::sql('2020-04-19');

print '<br>';
print Url::root();
