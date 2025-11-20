<?php
declare(strict_types=1);

namespace App;

use DateTimeImmutable;
use Exception;

final class Cart
{
    private array $lines = [];
    private int $cachedTotal = 0;

    public function __construct(private ?DiscountServiceInterface $discounts = null)
    {
        $this->discounts ??= new DiscountService();
    }

    public function add(Product $p, int $qty): void
    {

        if ($qty <= 0) {
            throw new \InvalidArgumentException("Quantity must be greater than 0");
        }

        if (!isset($this->lines[$p->getId()])) {
            $this->lines[$p->getId()] = ['product' => $p, 'qty' => 0];
        }
        $this->lines[$p->getId()]['qty'] += $qty;
        $this->cachedTotal += ($p->getPriceCents() * $qty);
    }

    public function totalCents(DateTimeImmutable $now): int
    {
        $discountPercent = $this->discounts->getDiscountPercent($now);

        $discountPrice =  $discountPercent === 0 ? $this->cachedTotal : $this->cachedTotal - $this->cachedTotal * ($discountPercent / 100);

        $totalPrices = (int) round($discountPrice * 1.20);

        if ($totalPrices < 0) {
            throw new Exception('totalPrices is negative, check discountPrices value');
        } 

        return $totalPrices;
    }

    public function rawLines(): array
    {
        return $this->lines;
    }
}
