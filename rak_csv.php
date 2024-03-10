<?php
    include('koneksi.php');

    $thequery = "SELECT * FROM tb_rak";
    $result = mysqli_query($kon,$thequery);

    $file = fopen("php://output","w");

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="exported.' . date("Y.m.d") . '.csv"');
    header('Pragma: no-cache');    
    header('Expires: 0');

    $emptyarr = array();
    $fieldinf = mysqli_fetch_fields($result);
        foreach ($fieldinf as $valu)
    {
        array_push($emptyarr, $valu->name);
        }
    fputcsv($file,$emptyarr);

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($file,$row);
    }
    fclose($file);

    mysqli_free_result($result);
    mysqli_close($kon);
?> 