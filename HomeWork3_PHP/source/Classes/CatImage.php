<?php
  require_once("IImage.php");


  class CatImage implements IImage{


    protected string $m_id="";
    protected string $m_url="";
    protected float $m_width=0.0;
    protected float $m_height=0.0;

    public function __construct($id,$url,$width,$height){
      $this->m_id=$id;
      $this->m_url=$url;
      $this->m_width=$width;
      $this->m_height=$height;
    }

    public function getId():string{
      return $this->m_id;
    }
    public function setId(string $id){
      $this->m_id=$id;
    }

    public function getUrl():string{
      return $this->m_url;

    }
    public function setUrl(string $url){
        $this->m_url=$url;
    }

    public function getWidth():float{
      return $this->m_width;
    }
    public function setWidth(float $width){
      $this->m_width=$width;
    }

    public function getHeight():float{
      return $this->m_height;
    }
    public function setHeight(float $height){
      $this->m_height=$height;
    }

    public function setCat(string $id,float $height, float $width, string $url){
      $this->setHeight($height);
      $this->setWidth($width);
      $this->setUrl($url);
      $this->setId($id);
    }

    public function printImage(){
      $url=$this->getUrl();
      $height=$this->getHeight();
      $width=$this->getWidth();


      echo ("<img src='$url' height='$height' width='$width'/>");
    }



  }
