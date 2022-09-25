<?php
  require_once("IImage.php");


  class CatImage implements IImage{


    protected string $mId="";
    protected string $mUrl="";
    protected float $mWidth=0.0;
    protected float $mHeight=0.0;
    protected  $mCategory;

    public function __construct(int $id,string $url, float $width,float $height,  $category){
      $this->mId=$id;
      $this->mUrl=$url;
      $this->mWidth=$width;
      $this->mHeight=$height;
      $this->mCategory=$category;
    }

    public function getCategory(){
        return $this->mCategory;
    }
    public function setCategory($category){
        $this->mCategory=$category;
    }


    public function getId():string{
      return $this->mId;
    }
    public function setId(string $id){
      $this->mId=$id;
    }

    public function getUrl():string{
      return $this->mUrl;

    }
    public function setUrl(string $url){
        $this->mUrl=$url;
    }

    public function getWidth():float{
      return $this->mWidth;
    }
    public function setWidth(float $width){
      $this->mWidth=$width;
    }

    public function getHeight():float{
      return $this->mHeight;
    }
    public function setHeight(float $height){
      $this->mHeight=$height;
    }

    public function setCat(string $id,float $height, float $width, string $url, $category){
      $this->setHeight($height);
      $this->setWidth($width);
      $this->setUrl($url);
      $this->setId($id);
      $this->setCategory($category);
    }

    public function printImage(){
      $url=$this->getUrl();
      $height=$this->getHeight();
      $width=$this->getWidth();
      $category= $this->getCategory();

      echo ("<h2>Категория: $category->name </h2><img src='$url' height='$height' width='$width'/>");
    }





  }
