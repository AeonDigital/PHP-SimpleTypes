<?php
$dirRoot        = str_replace("/", DIRECTORY_SEPARATOR, realpath(__DIR__ . "/.."));
$dirResources   = str_replace("/", DIRECTORY_SEPARATOR, $dirRoot . "/tests/resources");
$dirFiles       = str_replace("/", DIRECTORY_SEPARATOR, $dirResources . "/files");


require_once $dirRoot . "/vendor/autoload.php";