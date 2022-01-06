<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
foreach ($result as $data) { ?>
    <table border='0' style='margin-left: 0%;' cellspacing='0'>
        <tr>
            <th rowspan='4'><img src='assets/images/ab1.jpg' /></th>
        </tr>
        <tr>
            <th align='left' colspan="8">
                <font color='#2a166f' size='4'>YAYASAN PENDIDIKAN SEKOLAH MENENGAH KEJURUAN</font>
            </th>
        </tr>
        <tr>
            <th align='left' colspan="8">
                <font color='#2a166f' size='6'>SMK AL-BAHRI KOTA BEKASI</font>
            </th>
        </tr>
        <tr>
            <th align='left' colspan="8">
                <font color='#2a166f' size='5'>'TERAKREDITASI BAN-S/M'</font>
            </th>
        </tr>
    </table>

    <h3 align='center'>DAFTAR SISWA<br></h3>

    <?php
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
                <font size='3'>Semester
            </td>
            <td>:</td>
            <td>
                <font size='3'><?php echo $data[6]; ?> <?php echo $sem; ?></font>
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
        </tr>
    </table>
    <br>
<?php break;
}
?>


<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='center'>No.</th>
        <th align='center'>Nomor Induk Siswa</th>
        <th align='center'>Nama Peserta Didik</th>
        <th align='center'>Alamat</th>
        <th align='center'>NISN</th>
        <th align='center'>Kelas</th>
        <th align='center'>Semester</th>
        <th align='center'>Paket Keahlian</th>
    </tr>

    <?php
    $no = 1;
    foreach ($result as $data) {
        if ($data[7] = "Teknik Komputer dan Jaringan") {
            $kel =  "TKJ";
        }
        if ($data[7] = "Rekayasa Perangkat Lunak") {
            $kel =  "RPL";
        }
        if ($data[7] = "Multimedia") {
            $kel =  "MM";
        }
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
        <td align='center'>$no</td>
        <td>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
        <td align='center'>$data[3]</td>
        <td align='center'>$data[5]/$kel</td>
        <td align='center'>$data[6] $sem</td>
        <td>$data[4]</td>
    </tr>";
        $no++;
    }
    ?>
</table>