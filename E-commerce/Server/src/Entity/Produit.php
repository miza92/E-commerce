<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Variant", mappedBy="article")
     */
    private $variants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PictureProduit", mappedBy="produit")
     */
    private $pictureProduits;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Stock", mappedBy="produit")
     */
    private $stocks;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $fixed_price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fixed_picture;

    public function __construct()
    {
        $this->variants = new ArrayCollection();
        $this->pictureProduits = new ArrayCollection();
        $this->stocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    /**
     * @return Collection|Variant[]
     */
    public function getVariants(): Collection
    {
        return $this->variants;
    }

    public function addVariant(Variant $variant): self
    {
        if (!$this->variants->contains($variant)) {
            $this->variants[] = $variant;
            $variant->addArticle($this);
        }

        return $this;
    }

    public function removeVariant(Variant $variant): self
    {
        if ($this->variants->contains($variant)) {
            $this->variants->removeElement($variant);
            $variant->removeArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection|PictureProduit[]
     */
    public function getPictureProduits(): Collection
    {
        return $this->pictureProduits;
    }

    public function addPictureProduit(PictureProduit $pictureProduit): self
    {
        if (!$this->pictureProduits->contains($pictureProduit)) {
            $this->pictureProduits[] = $pictureProduit;
            $pictureProduit->setProduit($this);
        }

        return $this;
    }

    public function removePictureProduit(PictureProduit $pictureProduit): self
    {
        if ($this->pictureProduits->contains($pictureProduit)) {
            $this->pictureProduits->removeElement($pictureProduit);
            // set the owning side to null (unless already changed)
            if ($pictureProduit->getProduit() === $this) {
                $pictureProduit->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Stock[]
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->addProduit($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->contains($stock)) {
            $this->stocks->removeElement($stock);
            $stock->removeProduit($this);
        }

        return $this;
    }

    public function getFixedPrice()
    {
        return $this->fixed_price;
    }

    public function setFixedPrice($fixed_price): self
    {
        $this->fixed_price = $fixed_price;

        return $this;
    }

    public function getFixedPicture(): ?string
    {
        return $this->fixed_picture;
    }

    public function setFixedPicture(?string $fixed_picture): self
    {
        $this->fixed_picture = $fixed_picture;

        return $this;
    }
}
