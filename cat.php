<?php

class Cat
{
    private $id;
    private $url;
    private $width;
    private $height;

    public function __construct(array $arguments = array())
    {
        if (!empty($arguments)) {
            $this->id = $arguments[0]->id;
            $this->url = $arguments[0]->url;
            $this->width = $arguments[0]->width;
            $this->height = $arguments[0]->height;
        }
    }

    private function getId()
    {
        return $this->id;
    }

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

    private function generateCatCard($url, $width, $height): string
    {
        return <<<END
        <div style=" flex-grow: 1;">
        
                <img class="img" src="$url" style="height: $height; width: $width;" alt="image">
                
        </div>
        END;
    }

    public function displayCat(): void
    {
        $url = $this->getUrl();
        $width = $this->getWidth();
        $height = $this->getHeight();

        echo $this->generateCatCard($url, $width, $height);
    }
}
