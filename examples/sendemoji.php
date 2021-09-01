<?php
require_once '../src/init.php';
$conf = require_once("./config.php");
use gaterpc\Rpc;
$instance = new Rpc($conf['guid'],$conf['endpoint']);
var_dump($instance->SendEmoji("filehelper","d8111ee9b2c7217334299990fa961075"));//普通表情
//var_dump($instance->SendEmoji("filehelper","da1c289d4e363f3ce1ff36538903b92f","1","1"));//剪刀
//var_dump($instance->SendEmoji("filehelper","da1c289d4e363f3ce1ff36538903b92f","1","2"));//石头
//var_dump($instance->SendEmoji("filehelper","da1c289d4e363f3ce1ff36538903b92f","1","3"));//布
//var_dump($instance->SendEmoji("filehelper","9e3f303561566dc9342a3ea41e6552a6","2","4"));//骰子 1点
//var_dump($instance->SendEmoji("filehelper","9e3f303561566dc9342a3ea41e6552a6","2","5"));//骰子 2点
//var_dump($instance->SendEmoji("filehelper","9e3f303561566dc9342a3ea41e6552a6","2","6"));//骰子 3点
//var_dump($instance->SendEmoji("filehelper","9e3f303561566dc9342a3ea41e6552a6","2","7"));//骰子 4点
//var_dump($instance->SendEmoji("filehelper","9e3f303561566dc9342a3ea41e6552a6","2","8"));//骰子 5点
//var_dump($instance->SendEmoji("filehelper","9e3f303561566dc9342a3ea41e6552a6","2","9"));//骰子 6点

