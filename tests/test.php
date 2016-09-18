<?php
error_reporting(E_ALL | E_STRICT); 

$src = '../src/';
$test = dirname(__FILE__) . '/';

include_once($src . 'ImageHash.php');
include_once($src . 'Implementation.php');

include_once($src . 'Implementations/AverageHashBig.php');
include_once($src . 'Implementations/PerceptualHashBig.php');
include_once($src . 'Implementations/DifferenceHashBig.php');

include_once($src . 'Math/BigInteger.php');
include_once($src . 'Math/Hex.php');
include_once($src . 'Math/Binary.php');

$images = glob($test . 'images/forest/*');

$dec = \Jenssegers\ImageHash\ImageHash::DECIMAL;
$hex = \Jenssegers\ImageHash\ImageHash::HEXADECIMAL;

echo '<br> PerceptualHashBig <br>';
$hashObj = new \Jenssegers\ImageHash\ImageHash(new Jenssegers\ImageHash\Implementations\PerceptualHashBig, $hex);

foreach ($images as $image)
{
    $hash = $hashObj->hash($image, true);
    
    echo $hash . '<br>';     
}

echo '<br> AverageHashBig <br>';
$hashObj = new \Jenssegers\ImageHash\ImageHash(new Jenssegers\ImageHash\Implementations\AverageHashBig, $hex);

foreach ($images as $image)
{
    $hash = $hashObj->hash($image, true);
    
    echo $hash . '<br>';     
}

echo '<br> DifferenceHash <br>';
$hashObj = new \Jenssegers\ImageHash\ImageHash(new Jenssegers\ImageHash\Implementations\DifferenceHashBig, $hex);

foreach ($images as $image)
{
    $hash = $hashObj->hash($image, true);
    
    echo $hash . '<br>';     
}