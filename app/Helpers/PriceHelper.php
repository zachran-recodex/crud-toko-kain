<?php

if (!function_exists('format_rupiah')) {
    /**
     * Format angka ke dalam format Rupiah.
     *
     * @param int|float $amount
     * @return string
     */
    function format_rupiah($amount): string
    {
        return 'Rp' . number_format($amount, 0, ',', '.');
    }
}
