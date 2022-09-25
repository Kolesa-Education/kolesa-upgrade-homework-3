<?php

namespace src\Entity;

/**
 * Класс для картинки котика
 */
class CatImage
{

    /**
     * ID картинки котика
     *
     * @var string
     */
    protected string $id;

    /**
     * @param string $id
     * @return CatImage
     */
    public function setId(string $id): CatImage
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->id;
    }

    protected string $url;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return CatImage
     */
    public function setUrl(string $url): CatImage
    {
        $this->url = $url;
        return $this;
    }

    protected int $width;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return CatImage
     */
    public function setWidth(int $width): CatImage
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */

    protected int $height;

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return CatImage
     */
    public function setHeight(int $height): CatImage
    {
        $this->height = $height;
        return $this;
    }
}