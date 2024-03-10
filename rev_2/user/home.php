<main>
<div class="container-fluid px-4 mt-2">
<h5  class="font-monospace fw-bold">Dashboard</h5>
    <?php 
 
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $timestamp = $dt->format('Y-m-d G:i:s');
    echo "$timestamp \n";
    
    ?>

</div>
</main>