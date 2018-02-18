<?php

namespace synoscripts;
require_once "ProviderAbstract.php";

use \synoscripts\ProviderAbstract;

class BingProvider extends ProviderAbstract
{
    #Bing related fields
    private $locale;
    private $resolution;
    private $bingDataUrl;
    


    public function __construct($userName, $installationDir) 
    {
        parent::__construct($userName, $installationDir);
        // $this->userName = $userName;
        // $this->installationDir = $installationDir;
        $this->locale = "pl-PL"; # en-GB, en-US, en-NZ, de-DE, etc.
        $this->resolution="1920x1080"; # 1920x1200, #1080x1920
        $this->bingDataUrl = "http://www.bing.com/HPImageArchive.aspx?format=xml&idx=0&n=1&mkt=".$this->locale;      
    }

    public function GetAndSaveImage()
    {
        try
        {
            $content = file_get_contents($this->bingDataUrl);
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

        $url="http://www.bing.com".$urlBase."_".$this->resolution.".jpg";
        file_put_contents($this->GetImgLocalPath(), file_get_contents($url));

        $this->ApplyCredits($xmlObj->image->copyright);
        $this->ApplyNewWallpaper();
    }
}