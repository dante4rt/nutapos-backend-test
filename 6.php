<?php

function calculateShareRevenue($harga_sebelum_markup, $markup_persen, $share_persen)
{
    // Menghitung harga setelah markup
    $harga_setelah_markup = $harga_sebelum_markup * (1 + ($markup_persen / 100));

    // Menghitung net untuk resto
    $net_untuk_resto = $harga_setelah_markup * (1 - ($share_persen / 100));

    // Menghitung share untuk ojol
    $share_untuk_ojol = $harga_setelah_markup - $net_untuk_resto;

    // Mengembalikan output dalam format JSON
    return json_encode([
        'net_untuk_resto' => $net_untuk_resto,
        'share_untuk_ojol' => $share_untuk_ojol,
    ]);
}

// Contoh pemanggilan fungsi dengan input yang diberikan
$harga_sebelum_markup = 10000;
$markup_persen = 10;
$share_persen = 20;

$result = calculateShareRevenue($harga_sebelum_markup, $markup_persen, $share_persen);
echo $result;
