<?php

function calculateTax($total, $persen_pajak)
{
    // Menghitung Net Sales
    $net_sales = $total / (1 + ($persen_pajak / 100));

    // Menghitung Rupiah Pajak
    $pajak_rp = $total - $net_sales;

    // Mengembalikan output dalam format JSON
    return json_encode([
        'net_sales' => $net_sales,
        'pajak_rp' => $pajak_rp,
    ]);
}

// Contoh pemanggilan fungsi dengan input 22000 dan 10
$result = calculateTax(22000, 10);
echo $result;
