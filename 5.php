<?php

function calculateDiscount($discounts, $total_sebelum_diskon)
{
    $total_diskon = 0;

    // Menghitung total diskon
    foreach ($discounts as $discount) {
        $diskon = $discount['diskon'];
        $jumlah_diskon = $total_sebelum_diskon * ($diskon / 100);
        $total_diskon += $jumlah_diskon;
    }

    // Menghitung total harga setelah diskon
    $total_harga_setelah_diskon = $total_sebelum_diskon - $total_diskon;

    // Mengembalikan output dalam format JSON
    return json_encode([
        'total_diskon' => $total_diskon,
        'total_harga_setelah_diskon' => $total_harga_setelah_diskon,
    ]);
}

// Contoh pemanggilan fungsi dengan input yang diberikan
$discounts = [
    ['diskon' => 20],
    ['diskon' => 10]
];
$total_sebelum_diskon = 100000;

$result = calculateDiscount($discounts, $total_sebelum_diskon);
echo $result;
