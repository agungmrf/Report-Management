<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
foreach ($result as $data) { ?>
    <table border='0' style='margin-left: 0%;' cellspacing='0'>
        <tr>
            <th colspan='9'><img src='assets/images/ab1.jpg' /></th>
        </tr>
        <tr>
            <th align='left' colspan='9'>
                <font color='#2a166f' size='4'>YAYASAN PENDIDIKAN SEKOLAH MENENGAH KEJURUAN</font>
            </th>
        </tr>
        <tr>
            <th align='left' colspan='9'>
                <font color='#2a166f' size='6'>SMK AL-BAHRI KOTA BEKASI</font>
            </th>
        </tr>
        <tr>
            <th align='left' colspan='9'>
                <font color='#2a166f' size='5'>'TERAKREDITASI BAN-S/M'</font>
            </th>
        </tr>
    </table>
    <h3 align='center'>LAPORAN CAPAIAN KOMPETENSI PESERTA DIDIK<br>TAHUN PELAJARAN 2017/2018<br></h3>
    <?php
    if ($data[7] == "Teknik Komputer dan Jaringan") {
        $kel = "TKJ";
    }
    if ($data[7] == "Rekayasa Perangkat Lunak") {
        $kel = "RPL";
    }
    if ($data[7] == "Multimedia") {
        $kel = "MM";
    }
    if ($data[9] == "1") {
        $sem = "(Satu)";
    }
    if ($data[9] == "2") {
        $sem = "(Dua)";
    }
    if ($data[9] == "3") {
        $sem = "(Tiga)";
    }
    if ($data[9] == "4") {
        $sem = "(Empat)";
    }
    if ($data[9] == "5") {
        $sem = "(Lima)";
    }
    if ($data[9] == "6") {
        $sem = "(Enam)";
    }
    ?>
    <table border='0' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <td>
                <font size='3'>Nama Sekolah</font>
            </td>
            <td>
                <font size='3'>:</font>
            </td>
            <td>
                <font size='3'>SMK AL-BAHRI</font>
            </td>
            <td></td>
            <td>
                <font size='3'>Kelas
            </td>
            <td>:</td>
            <td>
                <font size='3'><?php echo $data[8]; ?>/<?php echo $kel; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                <font size='3'>Alamat</font>
            </td>
            <td>
                <font size='3'>:
            </td>
            <td>
                <font size='3'>Jl. Yon Armed Cikiwul Bantargebang Kota Bekasi</font>
            </td>
            <td></td>
            <td>
                <font size='3'>Semester
            </td>
            <td>:</td>
            <td>
                <font size='3'><?php echo $data[9]; ?>/<?php echo $sem; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                <font size='3'>Nomor Induk Siswa</font>
            </td>
            <td>
                <font size='3'>:</font>
            </td>
            <td>
                <font size='3'><?php echo $data[0]; ?></font>
            </td>
            <td></td>
            <td>
                <font size='3'>Tahun Pelajaran</font>
            </td>
            <td>:</td>
            <td>
                <font size='3'>2017/2018</font>
            </td>
        </tr>
        <tr>
            <td>
                <font size='3'>Nama Peserta Didik</font>
            </td>
            <td>
                <font size='3'>:</font>
            </td>
            <td>
                <font size='3'><?php echo $data[1]; ?></font>
            </td>
            <td></td>
            <td>
                <font size='3'>Paket Keahlian</font>
            </td>
            <td>:</td>
            <td>
                <font size='3'><?php echo $data[7]; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                <font size='3'>N I S N</font>
            </td>
            <td>
                <font size='3'>:</font>
            </td>
            <td>
                <font size='3'><?php echo $data[2]; ?></font>
            </td>
        </tr>
    </table>
    <br>
<?php break;
}
?>

<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th rowspan='2' align='center' align='center'>No.</th>
        <th rowspan='2' width='150px' align='center'>Mata Pelajaran</th>
        <th colspan='4' align='center'>Pengetahuan</th>
        <th colspan='3' align='center'>Keterampilan</th>
    </tr>
    <tr>
        <th align='center'>KB</th>
        <th align='center'>Angka</th>
        <th align='center'>Predikat</th>
        <th width='230px'>Deskripsi</th>
        <th align='center'>Angka</th>
        <th align='center'>Predikat</th>
        <th width='225px'>Deskripsi</th>
    </tr>

    <tr>
        <th colspan='9' align='left'>Kelompok A</th>
    </tr>

    <?php
    $no = 1;
    foreach ($result as $data) {
        if ($data[5] >= 85 && $data[5] <= 100) {
            $pre = "A";
            $des = "Sangat baik dan sempurna, Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.";
        }
        if ($data[5] >= 75 && $data[5] <= 85) {
            $pre = "B";
            $des = "Baik, Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompentensi dasar.";
        }
        if ($data[5] >= 62 && $data[5] <= 75) {
            $pre = "C";
            $des = "Cukup. Dapat mengingat, mengetahui sebagian kompetensi dasar, tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar.";
        }
        if ($data[5] <= 62) {
            $pre = "D";
            $des = "Sangat kurang. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja.";
        }

        if ($data[6] >= 85 && $data[6]  <= 100) {
            $pre1 = "A";
            $des1 = "Sangat baik dan sempurna, sangat aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan semua soal.";
        }
        if ($data[6]  >= 75 && $data[6]  <= 85) {
            $pre1 = "B";
            $des1 = "Baik, Sangat aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan sebagian besar soal cerita.";
        }
        if ($data[6]  >= 62 && $data[6]  <= 75) {
            $pre1 = "C";
            $des1 = "Cukup. Aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan soal cerita.";
        }
        if ($data[6]  <= 62) {
            $pre1 = "D";
            $des1 = "Sangat kurang, tidak aktif dalam mencoba, menalar, dan tidak kreatif dalam menyelesaikan latihan.";
        }
        echo "
        <tr>
            <td align='center'>$no</td>
            <td>$data[3]</td>
            <td align='center'>$data[4]</td>
            <td align='center'>$data[5]</td>
            <td align='center'>$pre</td>
            <td>$des</td>
            <td align='center'>$data[6]</td>
            <td align='center'>$pre1</td>
            <td>$des1</td>
        </tr>
        ";
        $no++;
    }
    ?>
</table>
<br>
<table border='0' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='left'>
            <font size='3'>C. Praktik Kerja Lapang</font>
        </th>
    </tr>
    <br>
</table>
<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='center'>No.</th>
        <th align='center' width='140px'>Mitra DU/DI</th>
        <th align='center' width='150px'>Lokasi</th>
        <th align='center' width='330px'>Lamanya (Bulan)</th>
        <th align='center' width='450px'>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    echo "
    <tr>
        <td align='center'>$no</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>";
    $no++;
    ?>
</table>
<br>
<table border='0' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='left'>
            <font size='3'>D. Ekstra Kurikuler</font>
        </th>
    </tr>
    <br>
</table>
<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='center'>No.</th>
        <th align='center' width='295px'>Kegiatan Ekstrakurikuler</th>
        <th align='center' width='785px'>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    echo "
    <tr>
    <td align='center'>$no</td>
    <td>Pramuka</td>
    <td>Melaksanakan Kegiatan Ekstrakurikuler Pramuka dengan Baik</td>
    </tr>";
    $no++;
    ?>
</table>
<br>
<table border='0' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='left'>
            <font size='3'>E. Prestasi</font>
        </th>
    </tr>
    <br>
</table>
<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='center'>No.</th>
        <th align='center' width='285px'>Jenis Prestasi</th>
        <th align='center' width='785px'>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    echo "
    <tr>
        <td align='center'>$no</td>
        <td></td>
        <td></td>
    </tr>";
    $no++;
    ?>
</table>
<br>
<table border='0' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='left'>
            <font size='3'>F. Ketidakhadiran</font>
        </th>
    </tr>
    <br>
</table>
<table border='1' cellpadding='5' cellspacing='0' width='300px'>
    <tr>
        <th align='center' width='207px'>
            <font size='2'>Sakit</font>
        </th>
        <td>:</td>
        <td align='right' width='230px'>
            <font size='2'>Hari</font>
        </td>
    </tr>
    <tr>
        <th align='center' width='207px'>
            <font size='2'>Ijin</font>
        </th>
        <td>:</td>
        <td align='right'>
            <font size='2'>Hari</font>
        </td>
    </tr>
    <tr>
        <th align='center' width='207px'>
            <font size='2'>Tanpa Keterangan</font>
        </th>
        <td>:</td>
        <td align='right'>
            <font size='2'>Hari</font>
        </td>
    </tr>
</table>
<br>
<table border='0' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='left'>
            <font size='3'>G. Catatan Wali Kelas</font>
        </th>
    </tr>
</table>
<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <td align='center' width='1105px' height='80px'></td>
    </tr>
</table>
<br>
<table border='0' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='left'>
            <font size='3'>H. Tanggapan Orang tua/wali</font>
        </th>
    </tr>
</table>
<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <td align='center' width='1105px' height='80px'></td>
    </tr>
</table>
<br>
<table border='0' style='margin-left: 8.7%;' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <td colspan='2' width='1107px' align='right'>Bekasi,16 Desember 2017 </td>
    </tr>
    <tr>
        <td align='left'>Mengetahui,<br> Orang tua/Wali</td>
        <td align='right'>Wali Kelas, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
        <td align='left' height='70px'></td>
        <td align='left'></td>
    </tr>
    <tr>
        <td align='left'>(................................)</td>
        <td align='right'><b>(SUYATNO, S.KOM) </b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
        <td colspan='2' width='1107px' align='center'><b>Mengetahui, <br> Kepala Sekolah </b></td>
    </tr>
    <tr>
        <td align='left' height='70px'></td>
        <td align='left'></td>
    </tr>
    <tr>
        <td colspan='2' align='center'><b>(MIFTACHUROCHMAN, S.T) </b> &nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</table>