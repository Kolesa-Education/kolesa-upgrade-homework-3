<?php

namespace Zhanarys\ProjectCat\Model;

class CatImage
{
    protected string $id;
    protected string $url;
    protected int $width;
    protected int $height;

    /**
     * @param string $id
     * @param string $url
     * @param int $width
     * @param int $height
     */
    public function __construct(string $id, string $url, int $width, int $height)
    {
        $this->id = $id;
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getInfo():string{
        return $this->id . " " . $this->url . " " . $this->width . " " . $this->height;
    }



}