<?php
$saldoawal = 100000;
$mutasi = array(
    array(
        "tanggal" => "2021-10-01",
        "masuk" => 200000,
        "keluar" => 0,
        "saldo" => 0
    ),
    array(
        "tanggal" => "2021-10-03",
        "masuk" => 300000,
        "keluar" => 0,
        "saldo" => 0
    ),
    array(
        "tanggal" => "2021-10-05",
        "masuk" => 150000,
        "keluar" => 0,
        "saldo" => 0
    ),
    array(
        "tanggal" => "2021-10-02",
        "masuk" => 0,
        "keluar" => 100000,
        "saldo" => 0
    ),
    array(
        "tanggal" => "2021-10-04",
        "masuk" => 0,
        "keluar" => 150000,
        "saldo" => 0
    ),
    array(
        "tanggal" => "2021-10-06",
        "masuk" => 0,
        "keluar" => 50000,
        "saldo" => 0
    )
);

usort($mutasi, function ($a, $b) {
    return strcmp($a['tanggal'], $b['tanggal']);
});

foreach ($mutasi as &$data) {
    if ($data['masuk'] != 0 && $data['keluar'] == 0) {
        $saldoawal += $data['masuk'];
        $data['saldo'] = $saldoawal;
    } else if ($data['keluar'] != 0 && $data['masuk'] == 0) {
        $saldoawal -= $data['keluar'];
        $data['saldo'] = $saldoawal;
    } else {
        $saldoawal += $data['masuk'];
        $data['saldo'] = $saldoawal;
        $saldoawal -= $data['keluar'];
        $data['saldo'] = $saldoawal;
    }
}

echo "<pre>";
print_r($mutasi);
