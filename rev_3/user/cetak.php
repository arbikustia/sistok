<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$nis = $_GET['nis'];
?>

<h3>Laporan Nilai Siswa</h3>
                    <table width="100%" border="1">
                            <tr>						
                                <th>No</th> 
                                <th>Nis</th>
                                <th>Nama siswa</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Nilai</th>
                            </tr>
                        <?php
                        $no = 1;
                        include 'koneksi.php';
                        $data = mysqli_query($kon, "SELECT DISTINCT siswa.nis,nama_siswa,nama_guru,nama_matkul,nama_kelas,nilai FROM pembelajaran INNER JOIN siswa ON pembelajaran.nis=siswa.nis INNER JOIN tb_guru ON pembelajaran.nip=tb_guru.nip INNER JOIN matkul ON pembelajaran.id_matkul=matkul.id_matkul INNER JOIN kelas ON kelas.id_kelas=pembelajaran.id_kelas WHERE siswa.nis='$nis' order by nama_kelas asc");
                        while($dt = mysqli_fetch_array($data)){
                        ?>
                           <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?php echo $dt['nis'];?></td>
                                <td><?php echo $dt['nama_siswa'];?></td>
                                <td><?php echo $dt['nama_guru'];?></td>
                                <td><?php echo $dt['nama_matkul'];?></td>
                                <td><?php echo $dt['nama_kelas'];?></td>
                                <td><?php echo $dt['nilai'];?></td>
                        </tr>
                        <?php } ?>
                    </table>
              

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_decode($html));
$mpdf->Output("Lap_Nilai.pdf", "I");
 ?>