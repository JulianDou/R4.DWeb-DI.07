<?php
namespace App\Entity;

class OldLego 
{
    public $name;
    public $collection;
    public $pieces;
    public $price;
    public $id;
    public $description;
    public $legoImage;
    public $boxImage;

    public function __construct(
        $id, $name, $collection, $pieces = null, $price = null, $description = null, $legoImage = null, $boxImage = null
    )
    {
        $this->name = $name;
        $this->collection = $collection;
        $this->pieces = $pieces;
        $this->price = $price;
        $this->id = $id;
        $this->description = $description;
        $this->legoImage = $legoImage;
        $this->boxImage = $boxImage;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCollection():string
    {
        return $this->collection;
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    public function getPieces():int
    {
        return $this->pieces;
    }

    public function setPieces($pieces)
    {
        $this->pieces = $pieces;
    }

    public function getPrice():float
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescription():string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getLegoImage():string
    {
        return $this->legoImage;
    }

    public function setLegoImage($legoImage) 
    {
        $this->legoImage = $legoImage;
    }

    public function getBoxImage():string
    {
        return $this->boxImage;
    }

    public function setBoxImage($boxImage)
    {
        $this->boxImage = $boxImage;
    }
}