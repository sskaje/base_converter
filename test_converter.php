<?php
require(__DIR__ . '/converter.class.php');

$s = "Man";
var_dump($s);
#var_dump(bin2hex($s));

echo "Base2 Encode & Decode\n";
$s = BaseConverter::Base2()->Encode($s);
var_dump($s);
$s = BaseConverter::Base2()->Decode($s);
var_dump($s);

echo "Base2LSB Encode & Decode\n";
$s = BaseConverter::Base2LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base2LSB()->Decode($s);
var_dump($s);


echo "Base4 Encode & Decode\n";
$s = BaseConverter::Base4()->Encode($s);
var_dump($s);
$s = BaseConverter::Base4()->Decode($s);
var_dump($s);

echo "Base4LSB Encode & Decode\n";
$s = BaseConverter::Base4LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base4LSB()->Decode($s);
var_dump($s);


echo "Base8 Encode & Decode\n";
$s = BaseConverter::Base8()->Encode($s);
var_dump($s);
$s = BaseConverter::Base8()->Decode($s);
var_dump($s);

echo "Base8LSB Encode & Decode\n";
$s = BaseConverter::Base8LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base8LSB()->Decode($s);
var_dump($s);

echo "Base16 Encode & Decode\n";
$s = BaseConverter::Base16()->Encode($s);
var_dump($s);
$s = BaseConverter::Base16()->Decode($s);
var_dump($s);

echo "Base16LSB Encode & Decode\n";
$s = BaseConverter::Base16LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base16LSB()->Decode($s);
var_dump($s);

echo "Base32 Encode & Decode\n";
$s = BaseConverter::Base32()->Encode($s);
var_dump($s);
$s = BaseConverter::Base32()->Decode($s);
var_dump($s);
echo "Base32LSB Encode & Decode\n";
$s = BaseConverter::Base32LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base32LSB()->Decode($s);
var_dump($s);

echo "Base64 Encode & Decode\n";
$s = BaseConverter::Base64()->Encode($s);
var_dump($s);
$s = BaseConverter::Base64()->Decode($s);
var_dump($s);
echo "Base64LSB Encode & Decode\n";
$s = BaseConverter::Base64LSB()->Encode($s);
var_dump($s);
$s = BaseConverter::Base64LSB()->Decode($s);
var_dump($s);


