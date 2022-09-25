<?php


class ShowPicture
{
    private $picture;

    public function __construct($picture)
    {
        $this->picture = $picture;
    }

    // Отрисовка картинки, намеренно не стал вставлять значения высоты и ширины
    public function renderHtmlPicture()
    {
        return '<img 
            src="' .
            $this->picture->url .
            '">';
    }
}
