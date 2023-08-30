<?php
function sortAndCalculate($kartuStok, $saldoAwalStok, $saldoAwalStokRp)
{
    // Sorting array berdasarkan tanggal
    usort($kartuStok, function ($a, $b) {
        return strcmp($a->tanggal, $b->tanggal);
    });

    $saldoQty = $saldoAwalStok;
    $saldoRp = $saldoAwalStokRp;

    foreach ($kartuStok as $index => $data) {
        // Menghitung keluarRp
        if ($index > 0) {
            $data->keluarRp = ($saldoRp / $saldoQty) * $data->keluar;
        }

        // Menghitung saldoQty dan saldoRp
        $saldoQty += $data->masuk - $data->keluar;
        $data->saldoQty = $saldoQty;

        $saldoRp += $data->masukRp - $data->keluarRp;
        $data->saldoRp = $saldoRp;
    }

    return $kartuStok;
}

// Input
$saldoAwalStok = 0;
$saldoAwalStokRp = 0;
$kartuStok = array(
    (object)["tanggal" => "2021-10-01", "masuk" => 10, "keluar" => 0, "saldoQty" => 0, "masukRp" => 10000, "keluarRp" => 0, "saldoRp" => 0],
    (object)["tanggal" => "2021-10-03", "masuk" => 45, "keluar" => 0, "saldoQty" => 0, "masukRp" => 36000, "keluarRp" => 0, "saldoRp" => 0],
    (object)["tanggal" => "2021-10-05", "masuk" => 40, "keluar" => 0, "saldoQty" => 0, "masukRp" => 35000, "keluarRp" => 0, "saldoRp" => 0],
    (object)["tanggal" => "2021-10-02", "masuk" => 0, "keluar" => 5, "saldoQty" => 0, "masukRp" => 0, "keluarRp" => 0, "saldoRp" => 0],
    (object)["tanggal" => "2021-10-04", "masuk" => 0, "keluar" => 40, "saldoQty" => 0, "masukRp" => 0, "keluarRp" => 0, "saldoRp" => 0],
    (object)["tanggal" => "2021-10-06", "masuk" => 0, "keluar" => 35, "saldoQty" => 0, "masukRp" => 0, "keluarRp" => 0, "saldoRp" => 0]
);

// Panggil fungsi sortAndCalculate()
$sortedKartuStok = sortAndCalculate($kartuStok, $saldoAwalStok, $saldoAwalStokRp);

// Output
echo "<pre>";
print_r($sortedKartuStok);
