<?php
require(__DIR__ . '/converter.class.php');

$s = "Man";
var_dump($s);
var_dump(bin2hex($s));

$s = BaseConverter::Base16()->Encode($s);
var_dump($s);
$s = BaseConverter::Base16()->Decode($s);
var_dump($s);
$s = BaseConverter::Base32()->Encode($s);
var_dump($s);
$s = BaseConverter::Base32()->Decode($s);
var_dump($s);
$s = BaseConverter::Base64()->Encode($s);
var_dump($s);
$s = BaseConverter::Base64()->Decode($s);
var_dump($s);
$s = BaseConverter::Base16LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base16LSB()->Decode($s);
var_dump($s);
$s = BaseConverter::Base32LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base32LSB()->Decode($s);
var_dump($s);
$s = BaseConverter::Base64LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base64LSB()->Decode($s);
var_dump($s);


