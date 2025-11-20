<?php
declare(strict_types=1);

namespace App;

use DateTimeImmutable;
use DateTimeZone;

final class DiscountService implements DiscountServiceInterface
{
    const BLACK_FRIDAY_DISCOUNT = 20;

    public function getDiscountPercent(DateTimeImmutable $now): int
    {
        $local = $now->setTimezone(new DateTimeZone('UTC'));
        return $this->isBlackFriday($local) ? self::BLACK_FRIDAY_DISCOUNT : 0;
    }

    private function isBlackFriday(DateTimeImmutable $local): bool
    {
        $blackFriday = new DateTimeImmutable("fourth friday of november " . $local->format('Y'));
        return $local->format('Y-m-d') === $blackFriday->format('Y-m-d');
    }
}
