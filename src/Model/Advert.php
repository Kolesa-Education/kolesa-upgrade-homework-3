<?php
// src/Model/Advert.php
namespace App\Model;

use App\Model\Media\Image;

class Advert
{
    private Image $image;

    public function setImage(Image $image)
    {
        $this->image = $image;
    }

    public function getThumbnail(): string
    {
        return $this->image ? $this->image->getLink() : '';
    }
}