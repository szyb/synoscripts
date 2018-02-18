<?php

require_once 'BingProvider.php';

use \synoscripts\BingProvider;


if (isset($argv[1])==false)
{
    echo "usage: $argv[0] 'username' 'installationDir'\n";
    exit;
}
$userName=$argv[1];
$installationDir=$argv[2];

$bing = new BingProvider($userName, $installationDir);

$bing->GetAndSaveImage();

?>