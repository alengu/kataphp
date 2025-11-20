<?php
declare(strict_types=1);

namespace App;

use DateTimeImmutable;

interface DiscountServiceInterface
{
    public function getDiscountPercent(DateTimeImmutable $now): int;
}
