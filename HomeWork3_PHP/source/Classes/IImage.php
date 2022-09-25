<?php
  interface IImage{

    public function getUrl():string;
    public function setUrl(string $url);

    public function getWidth():float;
    public function setWidth(float $width);

    public function getHeight():float;
    public function setHeight(float $height);

    public function printImage();
  }
