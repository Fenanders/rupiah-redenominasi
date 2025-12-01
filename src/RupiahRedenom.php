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
        if ($divisor == 0) {
            throw new \InvalidArgumentException("Divisor cannot be zero.");
        }

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

    
    /**
     * Round up/down to nearest value (e.g., 1.2345 -> 1.23 or 1.24)
     * 
     * @param float $value
     * @param int $precision
     * @param string $mode 'up' or 'down'
     * @return float
     */
    public function roundRupiah($value, $precision = 2, $mode = 'up')
    {
        return $mode === 'up' 
            ? ceil($value * pow(10, $precision)) / pow(10, $precision) 
            : floor($value * pow(10, $precision)) / pow(10, $precision);
    }

    /** 
     * Set convertion rates for rupiah redenomination
     * 
     * @param float $value
     * @return float
     * 
     */

    public function setConversionRate($value, $target_mode = 'new')
    {
        $rates = [
            'new' => 0.001, // 1 new rupiah = 1000 old rupiah
            'old' => 1000   // 1 old rupiah = 0.001 new rupiah
        ];

        if (!array_key_exists($target_mode, $rates)) {
            throw new \InvalidArgumentException("Invalid target mode: $target_mode, use 'new' or 'old'.");
        }

        return $value * $rates[$target_mode];
    }
}