SELECT mc.CategoryID, mi.ItemID, IFNULL(sid.Qty, 0) AS Qty, IFNULL(sid.SubTotal, 0) AS SubTotal
FROM mastercategory mc
JOIN masteritem mi ON mc.PerusahaanNo = mi.PerusahaanNo AND mc.DeviceID = mi.DeviceID AND mc.DeviceNo = mi.CategoryDeviceNo
LEFT JOIN (
    SELECT sd.ItemID, SUM(sd.Qty) AS Qty, SUM(sd.SubTotal) AS SubTotal
    FROM sale s
    JOIN saleitemdetail sd ON s.PerusahaanNo = sd.PerusahaanNo AND s.DeviceID = sd.DeviceID AND s.DeviceNo = sd.TransactionDeviceNo AND s.TransactionID = sd.TransactionID
    WHERE s.PerusahaanNo = 639 AND s.DeviceID = 1356 AND s.SaleDate = '2017-05-11'
    GROUP BY sd.ItemID
) sid ON mi.PerusahaanNo = sid.PerusahaanNo AND mi.DeviceID = sid.DeviceID AND mi.DeviceNo = sid.ItemDeviceNo
WHERE mc.PerusahaanNo = 639 AND mc.DeviceID = 1356;
