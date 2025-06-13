<?php

namespace App\Entity;

use App\Repository\AddressesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressesRepository::class)]
class Addresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $address_number = null;

    #[ORM\Column(length: 250)]
    private ?string $street = null;

    #[ORM\Column(length: 250)]
    private ?string $city = null;

    #[ORM\Column(length: 5)]
    private ?string $postal_code = null;

    #[ORM\Column(length: 50)]
    private ?string $country = null;

    #[ORM\Column(length: 50)]
    private ?string $address_type = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $address_supplement = null;

    #[ORM\ManyToOne(inversedBy: 'address')]
    private ?Users $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressNumber(): ?int
    {
        return $this->address_number;
    }

    public function setAddressNumber(int $address_number): static
    {
        $this->address_number = $address_number;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): static
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): static
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getAddressType(): ?string
    {
        return $this->address_type;
    }

    public function setAddressType(string $address_type): static
    {
        $this->address_type = $address_type;

        return $this;
    }

    public function getAddressSupplement(): ?string
    {
        return $this->address_supplement;
    }

    public function setAddressSupplement(?string $address_supplement): static
    {
        $this->address_supplement = $address_supplement;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }
}
