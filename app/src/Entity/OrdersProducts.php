<?php

namespace App\Entity;

use App\Repository\OrdersProductsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersProductsRepository::class)]
class OrdersProducts
{

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'ordersProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Orders $orders = null;
    
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'ordersProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $products = null;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): static
    {
        $this->orders = $orders;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): static
    {
        $this->products = $products;

        return $this;
    }
}
