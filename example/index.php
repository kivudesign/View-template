<?php
include __DIR__."/../vendor/autoload.php";
use Wepesi\App\View;

$rootDir = __DIR__."/view";
$view = new View($rootDir);

// to work without layout 
// include_once __DIR__."/example_one.php";

// example with layout
include_once __DIR__."/example_two.php";
