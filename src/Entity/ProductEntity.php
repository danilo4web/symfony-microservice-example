<?php declare(strict_types=1);

namespace App\ProductsService\Entity;

/**
 * Entity Class: ProductEntity
 *
 * @package App\ProductsService\Entity
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class ProductEntity
{
    /**
     * @var integer $id
     * @var string  $name
     * @var string  $headline
     * @var string  $description
     * @var string  $imageLink
     * @var float   $price
     */
    private $id, $name, $headline, $description, $imageLink, $price;

    /**
     * @param integer $id
     * @return ProductEntity
     */
    public function setId($id): ProductEntity
    {
        $this->id = (int)$id;
        return $this;
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param string $name
     * @return ProductEntity
     */
    public function setName(string $name): ProductEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $headline
     * @return ProductEntity
     */
    public function setHeadline(string $headline): ProductEntity
    {
        $this->headline = $headline;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    /**
     * @param string $description
     * @return ProductEntity
     */
    public function setDescription(string $description): ProductEntity
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param float $price
     * @return ProductEntity
     */
    public function setPrice(float $price): ProductEntity
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getImageLink(): ?string
    {
        return $this->imageLink;
    }

    /**
     * @param string $imageLink
     * @return ProductEntity
     */
    public function setImageLink(string $imageLink): ProductEntity
    {
        $this->imageLink = $imageLink;
        return $this;
    }
}
