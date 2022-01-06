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
    <h3 align='center'>DAFTAR MATA PELAJARAN<br></h3>
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
        </tr>
        <tr>
            <td>
                <font size='3'>Alamat</font>
            </td>
            <td>
                <font size='3'>:</font>
            </td>
            <td>
                <font size='3'>Jl. Yon Armed Cikiwul Bantargebang Kota Bekasi</font>
            </td>
        </tr>
        <tr>
            <td>
                <font size='3'>Nama Mata Pelajaran</font>
            </td>
            <td>
                <font size='3'>:</font>
            </td>
            <td>
                <font size='3'><?php echo $data[3]; ?></font>
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
        <th rowspan='2' width='150px' align='center'>Nama Peserta Didik</th>
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
        echo "<tr>
        <td align='center'>$no</td>
        <td>$data[1]</td>
        <td align='center'>$data[4]</td>
        <td align='center'>$data[5]</td>
        <td align='center'>$pre</td>
        <td>$des</td>
        <td align='center'>$data[6]</td>
        <td align='center'>$pre1</td>
        <td>$des1</td>
        </tr>";
        $no++;
    }
    ?>
</table>