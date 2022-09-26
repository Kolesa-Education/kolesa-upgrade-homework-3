<?php

class Cat
{
    private $url;
    private $width;
    private $height;

    private function getUrl()
    {
        return $this->url;
    }

    private function getWidth()
    {
        return $this->width;
    }

    private function getHeight()
    {
        return $this->height;
    }

    private function generateCatCard($url, $width='225px', $height='100%'): string
    {
        return <<<END
        <div class="grow1" >

                <img class="img" src="$url" style="height: $height; width: $width;" alt="image">

        </div>
        END;
    }

    public function setParams($cat)
    {
        $this->id = $cat->id;
        $this->url = $cat->url;
        $this->width = $cat->width;
        $this->height = $cat->height;
    }

    public function displayCat()
    {
        $url = $this->getUrl();
        $width = $this->getWidth();
        $height = $this->getHeight();

        echo $this->generateCatCard($url);
    }
}
