<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockRepository")
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock_enter;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock_left;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $final_stock;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Produit", inversedBy="stocks")
     */
    private $produit;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStockEnter(): ?int
    {
        return $this->stock_enter;
    }

    public function setStockEnter(?int $stock_enter): self
    {
        $this->stock_enter = $stock_enter;

        return $this;
    }

    public function getStockLeft(): ?int
    {
        return $this->stock_left;
    }

    public function setStockLeft(?int $stock_left): self
    {
        $this->stock_left = $stock_left;

        return $this;
    }

    public function getFinalStock(): ?int
    {
        return $this->final_stock;
    }

    public function setFinalStock(?int $final_stock): self
    {
        $this->final_stock = $final_stock;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produit->contains($produit)) {
            $this->produit->removeElement($produit);
        }

        return $this;
    }
}
