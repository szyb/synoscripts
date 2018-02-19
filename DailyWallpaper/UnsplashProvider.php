<?php

namespace synoscripts;
require_once "ProviderAbstract.php";

use \synoscripts\ProviderAbstract;

class UnsplashProvider extends ProviderAbstract
{
    #Bing related fields
    private $resolution;
    private $imageUrl;

    public function __construct($userName, $installationDir) 
    {
        parent::__construct($userName, $installationDir);

        $this->resolution="1920x1080"; # 1920x1200, #1080x1920
        $this->imageUrl = "http://source.unsplash.com/random/".$this->resolution;      
    }

    public function GetAndSaveImage()
    {
        try
        {
            $content = file_get_contents($this->imageUrl);
            if ($content == FALSE)
            {
            return; //no data - no change
            }
        }
        catch (Exception $e)
        {
            return; //exception - no change
        }
       
        file_put_contents($this->GetImgLocalPath(), $content);

        $this->ApplyNewWallpaper();
    }
}