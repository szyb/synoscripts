<?php

namespace synoscripts;

abstract class ProviderAbstract
{
    #common fields
    private $userName;
    private $installationDir;
    private $font;

    public function __construct($userName, $installationDir)
    {
        $this->userName = $userName;
        $this->installationDir = $installationDir;
        $this->font="/var/services/homes/".$userName."/".$installationDir."/arial.ttf";
    }

    protected function GetImgLocalPath()
    {
        return "/var/services/homes/".$this->userName."/".$this->installationDir."/wallpaper.jpg";
    }

    protected function GetImgSynoPath()
    {
        return "/usr/syno/etc/preference/".$this->userName."/wallpaper_dir/wallpaper_hd";
    }

    protected function ApplyCredits($text)
    {
        $jpg_image = imagecreatefromjpeg($this->GetImgLocalPath());
        $white = imagecolorallocate($jpg_image, 255, 255, 255);
        $black = imagecolorallocate($jpg_image, 0, 0, 0);
        
        //shadow
        imagettftext($jpg_image, 12, 0, 301, 1001, $black, $this->font, $text);
        //text
        imagettftext($jpg_image, 12, 0, 300, 1000, $white, $this->font, $text);
        
        imagejpeg($jpg_image, $this->GetImgLocalPath(), 90);
        
        imagedestroy($jpg_image);
    }   

    protected function ApplyNewWallpaper()
    {
        #copy the image to the DSM preferences cache (this step requires root privileges)
        copy($this->GetImgLocalPath(), $this->GetImgSynoPath());
    }
     
    abstract public function GetAndSaveImage();
}

?>
