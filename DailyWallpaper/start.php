<?php

require_once 'BingProvider.php';
require_once 'UnsplashProvider.php';

use \synoscripts\BingProvider;
use \synoscripts\UnsplashProvider;

$providerName = "Bing"; //default


if (isset($argv[1])==false)
{
    echo "usage: $argv[0] 'username' 'installationDir' [Bing|Unsplash|Random]\n";
    exit;
}
$userName=$argv[1];
$installationDir=$argv[2];

if (isset($argv[3]))
{
    if ($argv[3] == "Unsplash")
        $providerName = "Unsplash";
    else if ($argv[3] == "Random")
    {
        $r = rand(1,2);
        echo $r;
        if ($r == 1) $providerName = "Bing";
        else if ($r == 2) $providerName = "Unsplash";
    }
}

echo "Choosen provider: ".$providerName."\n";

if ($providerName == "Bing")
    $provider = new BingProvider($userName, $installationDir);
else if ($providerName == "Unsplash")
    $provider = new UnsplashProvider($userName, $installationDir);

$provider->GetAndSaveImage();

?>