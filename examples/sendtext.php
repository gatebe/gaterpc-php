<?php
require_once '../src/init.php';
$conf = require_once("./config.php");
use gaterpc\Rpc;
$instance = new Rpc($conf['guid'],$conf['endpoint']);
var_dump($instance->SendText("filehelper","test"));
