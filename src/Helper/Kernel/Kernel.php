<?php

require_once  'config.php';
require BASE_PATH . 'vendor/autoload.php';
require_once 'bootsrtap.php';


$currentURI = $_SERVER['REQUEST_URI'];

/**
 * This is temporery solution
 * need to create Virtual Host for
 * the /projects/oop_course/public/
 */

/** @var  $currentURI  start*/
$currentURI = explode("/",$currentURI);

unset($currentURI[0]);
unset($currentURI[1]);
unset($currentURI[2]);
unset($currentURI[3]);
$currentURI = '/' . implode("/", $currentURI);
/** @var  $currentURI  end*/

//$processor = new Processor();
//
//$router = $processor->make($routes);
////return $processor->process($router, $currentURI);
//return $processor->run($router, $currentURI);
