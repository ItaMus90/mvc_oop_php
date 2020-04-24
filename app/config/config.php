<?php

/**
 * When you update the url
 * and the url is not dir sting
 * in PUBLIC_PATH $_SERVER['DOCUMENT_ROOT']
 * and basrPath should be  $_SERVER['DOCUMENT_ROOT'] . .'/../'
 * and remove CLIENT_PATH
 */

$basePath = $_SERVER['DOCUMENT_ROOT'] . '/../';

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', $basePath);
define('PUBLIC_PATH', BASE_PATH . DS . 'public' . DS);
define('KERNEL_PATH', BASE_PATH . DS. 'src' . DS . 'Helper' . DS . 'Kernel' . DS);

define('CLIENT_PATH', 'http://localhost/projects/oop_course/public');