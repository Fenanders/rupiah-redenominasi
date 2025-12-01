<?php

namespace Yadders\RupiahRedenom;

class RupiahRedenom
{
    /**
     * Redenominate value (e.g., 1000 -> 1)
     *
     * @param int|float $value
     * @param int $divisor Usually 1000 for IDR redenomination drafts
     * @return float
     */
    public function simplifyRupiah($value, $divisor = 1000)
    {
        return $value / $divisor;
    }

    /**
     * Format to Rupiah string
     *
     * @param int|float $value
     * @return string
     */
    public function format($value)
    {
        return 'Rp ' . number_format($value, 2, ',', '.');
    }
}