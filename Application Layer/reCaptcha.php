<?php ob_start ();
session_start();

# read background image
$image = ImageCreateFromPng ("../Images/captcha.png");

# randomise colour for text
$red = rand(80,130);
$green = rand(80,130);
$blue = 320 - $red - $green;
$textColour = ImageColorAllocate($image, $red, $green, $blue);

# randomly select character array
$charArray = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','T','U','V','W','X','Y','Z','2','3','4','6','7','8','9');
shuffle($charArray);
$captchaString = $charArray[0];
for ($i=1; $i<5; $i++) $captchaString .= '' . $charArray[$i];
 
$_SESSION['cap_hidden']=$captchaString;
# Edit and output the image
$x = rand(3,18);
$y = rand(3,18);

ImageString($image, 5, $x, $y, $captchaString, $textColour);
$bigImage = imagecreatetruecolor(200, 80);
imagecopyresized ($bigImage, $image, 0, 0, 0, 0, 200, 80, 100, 40);
header("Content-Type: image/jpeg");
Imagejpeg($bigImage, NULL, 8);
ImageDestroy($image);
ImageDestroy($bigImage);
?>