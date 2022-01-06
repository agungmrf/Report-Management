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
        <th align='left' colspan="4">
            <font color='#2a166f' size='4'>YAYASAN PENDIDIKAN SEKOLAH MENENGAH KEJURUAN</font>
        </th>
    </tr>
    <tr>
        <th align='left' colspan="4">
            <font color='#2a166f' size='6'>SMK AL-BAHRI KOTA BEKASI</font>
        </th>
    </tr>
    <tr>
        <th align='left' colspan="4">
            <font color='#2a166f' size='5'>'TERAKREDITASI BAN-S/M'</font>
        </th>
    </tr>
</table>

<h3 align='center'>DAFTAR MATA PELAJARAN<br></h3>

<table border='1' width='100%' cellpadding='5' cellspacing='0'>
    <tr>
        <th align='center'>No.</th>
        <th>Kode Mata Pelajaran</th>
        <th>Nama Mata Pelajaran</th>
        <th>Ketuntasan Belajar</th>
    </tr>

    <?php
    $no = 1;
    foreach ($result as $data) {
        echo "<tr>
                    <td align='center'>$no</td>
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td align='center'>$data[2]</td>
                </tr>";
        $no++;
    }
    ?>
</table>