<?php
if (isset($argv[1])==false)
{
    echo "usage: $argv[0] 'username' 'installationDir'\n";
    exit;
}
$userName=$argv[1];
#parameters (may be changed)
$installationDir=$argv[2];
$locale="pl-PL"; # en-GB, en-US, en-NZ, de-DE, itp.
$resolution="1920x1080"; # 1920x1200, #1080x1920

#other parameters:
$imgLocal="/var/services/homes/".$userName."/".$installationDir."/wallpaper.jpg";
$imgSyno="/usr/syno/etc/preference/".$userName."/wallpaper";
$bingDataUrl = "http://www.bing.com/HPImageArchive.aspx?format=xml&idx=0&n=1&mkt=".$locale;

#get info about the image (xml)
try
{
    $content = file_get_contents($bingDataUrl);
    if ($content == FALSE)
    {
	return; //no data - no change
    }
}
catch (Exception $e)
{
    return; //exception - no change
}
$xmlObj = simplexml_load_string($content); 
$urlBase = $xmlObj->image->urlBase;

#get & save the image
$url="http://www.bing.com".$urlBase."_".$resolution.".jpg";
echo $url."\n";

file_put_contents($imgLocal, file_get_contents($url));

$jpg_image = imagecreatefromjpeg($imgLocal);
$white = imagecolorallocate($jpg_image, 255, 255, 255);
$black = imagecolorallocate($jpg_image, 0, 0, 0);
$text = $xmlObj->image->copyright;
$font="/var/services/homes/".$userName."/".$installationDir."/arial.ttf";
#$font = 'arial.ttf';

//shadow
imagettftext($jpg_image, 12, 0, 301, 1001, $black, $font, $text);
//text
imagettftext($jpg_image, 12, 0, 300, 1000, $white, $font, $text);

#imagestring($jpg_image, $font, 300, 1000,  $text, $white);
imagejpeg($jpg_image, $imgLocal, 90);

imagedestroy($jpg_image);

#copy the image to the DSM preferences cache (this step requires root privileges)
copy($imgLocal, $imgSyno);
?>