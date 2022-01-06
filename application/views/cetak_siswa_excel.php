<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='0' style='margin-left: 0%;' cellspacing='0' width='100%'>
    <tr>
        <th rowspan='4'><img src='assets/images/ab1.jpg' /></th>
    </tr>
    <tr>
        <th align='left' colspan="5">
            <font color='#2a166f' size='4'>YAYASAN PENDIDIKAN SEKOLAH MENENGAH KEJURUAN</font>
        </th>
    </tr>
    <tr>
        <th align='left' colspan="5">
            <font color='#2a166f' size='6'>SMK AL-BAHRI KOTA BEKASI</font>
        </th>
    </tr>
    <tr>
        <th align='left' colspan="5">
            <font color='#2a166f' size='5'>'TERAKREDITASI BAN-S/M'</font>
        </th>
    </tr>
</table>
<h3 align='center'>PROFIL SISWA<br></h3>
<table border='0' width='100%' cellpadding='5' cellspacing='0'>
    <?php
    foreach ($result as $data) {
        if ($data[6] == "1") {
            $sem = "(Satu)";
        }
        if ($data[6] == "2") {
            $sem = "(Dua)";
        }
        if ($data[6] == "3") {
            $sem = "(Tiga)";
        }
        if ($data[6] == "4") {
            $sem = "(Empat)";
        }
        if ($data[6] == "5") {
            $sem = "(Lima)";
        }
        if ($data[6] == "6") {
            $sem = "(Enam)";
        }
        echo "<tr>
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
            <font size='3'>Semester
        </td>
        <td>:</td>
        <td>
            <font size='3'>$data[6] $sem</font>
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
            <font size='3'>Tahun Pelajaran</font>
        </td>
        <td>:</td>
        <td>
            <font size='3'>2017/2018</font>
        </td>
    </tr>";
    }
    ?>
</table>
<br>
<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th>Nomor Induk Siswa</th>
        <th>Nama Peserta Didik</th>
        <th>Alamat</th>
        <th>N I S N</th>
        <th>Kelas</th>
        <th>Semester</th>
        <th>Paket Keahlian</th>
    </tr>


    <?php
    $no = 1;
    foreach ($result as $data) {
        if ($data[6] == "1") {
            $sem = "(Satu)";
        }
        if ($data[6] == "2") {
            $sem = "(Dua)";
        }
        if ($data[6] == "3") {
            $sem = "(Tiga)";
        }
        if ($data[6] == "4") {
            $sem = "(Empat)";
        }
        if ($data[6] == "5") {
            $sem = "(Lima)";
        }
        if ($data[6] == "6") {
            $sem = "(Enam)";
        }
        echo "<tr>
        <td align='center'>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
        <td align='center'>$data[3]</td>
        <td align='center'>$data[5]</td>
        <td align='center'>$data[6] $sem</td>
        <td>$data[4]</td>
    </tr>";
    }
    ?>
</table>