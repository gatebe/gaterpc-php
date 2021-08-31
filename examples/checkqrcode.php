<?php
require_once '../src/init.php';
use gaterpc\Rpc;
$instance = new Rpc("d0fb5221-ef9c-42a1-b5a3-912ff9184fb5");
var_dump($instance->CheckQrcode());
