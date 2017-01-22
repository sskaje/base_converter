<?php
require(__DIR__ . '/../vendor/autoload.php');

$s = "Man";
if (isset($argv[1])) {
    $s = $argv[1];
}
var_dump($s);
#var_dump(bin2hex($s));

echo "Base2 Encode & Decode\n";
$s = sskaje\converter\base\base2\MSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base2\MSB::Decode($s);
var_dump($s);

echo "Base2LSB Encode & Decode\n";
$s = sskaje\converter\base\base2\LSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base2\LSB::Decode($s);
var_dump($s);

echo "Base4 Encode & Decode\n";
$s = sskaje\converter\base\base4\MSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base4\MSB::Decode($s);
var_dump($s);

echo "Base4LSB Encode & Decode\n";
$s = sskaje\converter\base\base4\LSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base4\LSB::Decode($s);
var_dump($s);


echo "Base8 Encode & Decode\n";
$s = sskaje\converter\base\base8\MSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base8\MSB::Decode($s);
var_dump($s);

echo "Base8LSB Encode & Decode\n";
$s = sskaje\converter\base\base8\LSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base8\LSB::Decode($s);
var_dump($s);

echo "Base16 Encode & Decode\n";
$s = sskaje\converter\base\base16\MSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base16\MSB::Decode($s);
var_dump($s);

echo "Base16LSB Encode & Decode\n";
$s = sskaje\converter\base\base16\LSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base16\LSB::Decode($s);
var_dump($s);

echo "Base32 Encode & Decode\n";
$s = sskaje\converter\base\base32\MSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base32\MSB::Decode($s);
var_dump($s);
echo "Base32LSB Encode & Decode\n";
$s = sskaje\converter\base\base32\LSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base32\LSB::Decode($s);
var_dump($s);

echo "Base64 Encode & Decode\n";
$s = sskaje\converter\base\base64\MSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base64\MSB::Decode($s);
var_dump($s);
echo "Base64LSB Encode & Decode\n";
$s = sskaje\converter\base\base64\LSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base64\LSB::Decode($s);
var_dump($s);


echo "Base32VMware Encode & Decode\n";
$s = sskaje\converter\base\base32\VMwareMSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base32\VMwareMSB::Decode($s);
var_dump($s);
echo "Base32VMwareLSB Encode & Decode\n";
$s = sskaje\converter\base\base32\VMwareLSB::Encode($s);
var_dump($s);
$s = sskaje\converter\base\base32\VMwareLSB::Decode($s);
var_dump($s);


