<?php
// src/Model/Media/Image.php
namespace App\Model\Media;

class Image
{
    private string $imageLink;

    public function __construct(string $imageLink)
    {
        $this->imageLink = $imageLink;
    }

    public function getLink(): string
    {
        return $this->imageLink;
    }
}