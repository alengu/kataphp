<?php
declare(strict_types=1);

namespace App;

final class Product
{
    public function __construct(private string $id, private ?string $name = null, private int|float $priceCents = 0)
    {
        if ($id === '') {
            throw new \InvalidArgumentException("id can't be null");
        }

        if ($this->priceCents <= 0) {
            throw new \InvalidArgumentException("priceCents must be greater than 0");
        }

        $this->priceCents = (int)$priceCents;
    }

    public function getPriceCents(): int
    {
        return $this->priceCents;
    }

    public function setName(string $name): string
    {
        $this->name = trim($name);
        return $this->name;
    }

    public function equals(Product $other): bool
    {
        return $this->id === $other->id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
