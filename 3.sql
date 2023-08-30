-- Buat stored procedure
DELIMITER //
CREATE PROCEDURE laporan_mutasi_kas()
BEGIN
    -- Buat temporary table untuk menyimpan hasil laporan
    CREATE TEMPORARY TABLE mutasi_kas (
        tanggal DATE,
        masuk INT,
        keluar INT,
        saldo INT
    );

    -- Insert data uangmasuk ke temporary table
    INSERT INTO mutasi_kas (tanggal, masuk, keluar, saldo)
    SELECT tanggal, nominal, 0, 0
    FROM uangmasuk;

    -- Insert data uangkeluar ke temporary table
    INSERT INTO mutasi_kas (tanggal, masuk, keluar, saldo)
    SELECT tanggal, 0, nominal, 0
    FROM uangkeluar;

    -- Urutkan data berdasarkan tanggal
    SET @saldo := 0;
    UPDATE mutasi_kas
    SET saldo = (@saldo := @saldo + masuk - keluar)
    ORDER BY tanggal;

    -- Tampilkan laporan mutasi kas
    SELECT tanggal, masuk, keluar, saldo
    FROM mutasi_kas;

    -- Hapus temporary table
    DROP TEMPORARY TABLE mutasi_kas;
END //
DELIMITER ;

-- Panggil stored procedure
CALL laporan_mutasi_kas();
