<?php

// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;

use App\Entity\Lego;
use \PDO;

class LegoService
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=tp-symfony-mysql;dbname=lego_store', 'root', 'root');
    }

    public function getLego($id): Lego
    {
        $stmt = $this->pdo->prepare('SELECT * FROM lego WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $lego = new Lego($row['id'], $row['name'], $row['collection']);
        $lego->setDescription($row['description']);
        $lego->setPieces($row['pieces']);
        $lego->setPrice($row['price']);
        $lego->setLegoImage($row['imagebg']);
        $lego->setBoxImage($row['imagebox']);
        return $lego;
    }

    public function getAllLego(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM lego');
        $stmt->execute();

        $legos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lego = new Lego($row['id'], $row['name'], $row['collection']);
            $lego->setDescription($row['description']);
            $lego->setPieces($row['pieces']);
            $lego->setPrice($row['price']);
            $lego->setLegoImage($row['imagebg']);
            $lego->setBoxImage($row['imagebox']);
            $legos[] = $lego;
        }

        return $legos;
    }

    public function getCollection($collection): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM lego WHERE collection = :collection');
        $stmt->bindParam(':collection', $collection);
        $stmt->execute();

        $legos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lego = new Lego($row['id'], $row['name'], $row['collection']);
            $lego->setDescription($row['description']);
            $lego->setPieces($row['pieces']);
            $lego->setPrice($row['price']);
            $lego->setLegoImage($row['imagebg']);
            $lego->setBoxImage($row['imagebox']);
            $legos[] = $lego;
        }

        return $legos;
    }
}