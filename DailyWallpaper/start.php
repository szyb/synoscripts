<?php

require_once 'BingProvider.php';
require_once 'UnsplashProvider.php';

use \synoscripts\BingProvider;
use \synoscripts\UnsplashProvider;

$providerName = "Bing";
//$providerName = "Unsplash";


if (isset($argv[1])==false)
{
    echo "usage: $argv[0] 'username' 'installationDir'\n";
    exit;
}
$userName=$argv[1];
$installationDir=$argv[2];

if ($providerName == "Bing")
    $provider = new BingProvider($userName, $installationDir);
else if ($providerName == "Unsplash")
    $provider = new UnsplashProvider($userName, $installationDir);

$provider->GetAndSaveImage();

?>