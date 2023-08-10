<?php
define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS."app");
define("API",APP.DS."api");
define("V1",API.DS."v1");
define("CONTROLLERS",V1.DS."controllers");
define("CORE",V1.DS."core");
define("MODELS",V1.DS."models");
define("VENDOR",ROOT.DS."vendor");
define ("DOMAIN_NAME","http://localhost/mvc-api-social/public");

header('Access-Control-Allow-Origin: application/json');
header('Content-Type: application/json');

require_once (VENDOR.DS."autoload.php");


use MVC\api\v1\core\app;
$obj = new app;