<?php

namespace Nca\Rector\Doctrine;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping as ORM;

#[Entity]
class Product
{
    /**
     * @var int|null
     */
    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue]
    private $id;
    /**
     * @var string
     */
    #[Column(type: 'string', nullable: false)]
    private $title;
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}