<?php

define("APP_PATH", realpath(dirname(dirname(__FILE__))));
require_once '../core/App.php';
require_once '../core/Json.php';
require_once '../core/RunTests.php';
require_once '../app/Controllers/PhpParsar.php';
require_once '../app/Controllers/ParseFile.php';
require_once '../app/Controllers/ParsePath.php';
require_once '../app/Controllers/PhpRules.php';
require_once '../app/Controllers/Exceptions/ExceptionHandlerController.php';
