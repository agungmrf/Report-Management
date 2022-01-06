<?php

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Siswa_model');
        $this->load->library('pagination');
    }

    function update_password()
    {
        $this->load->view('update_password');
    }

    function updatepass_siswa()
    {
        $oldpass = md5($this->input->post('passold'));
        $newpass = md5($this->input->post('passnew'));
        $username = $this->session->userdata('username');
        if ($oldpass == $this->session->userdata('password')) {
            $this->Siswa_model->updatepass($newpass, $username);
            echo "<script>alert('Password Kamu Berhasil di Perbarui!'); window.location = '" . base_url('index.php/login/dashboard') . "'</script>";
        } else {
            echo "<script>alert('Password Lama Kamu Salah!'); window.location = '" . base_url('index.php/siswa/update_password') . "'</script>";
        }
    }

    function tampil_rapor()
    {
        $username = $this->session->userdata('username');
        $config = array();
        $config['base_url'] = base_url() . "index.php/siswa/tampil_rapor/";
        $config['total_rows'] = $this->Siswa_model->record_count_rapor_siswa($username);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results'] = $this->Siswa_model->fetch_rapor_siswa($config['per_page'], $page, $username);
        $data['links'] = $this->pagination->create_links();
        $data['page'] = $page;
        $this->load->view('siswa_rapor', $data);
    }

    function cetak_data()
    {
        $pilih = $this->input->post('pilih');
        if ($pilih == 'pdf') {
            $this->cetak_data_pdf($this->input->post('nis'));
        } else if ($pilih == 'excel') {
            $this->cetak_data_excel($this->input->post('nis'));
        } else {
            echo "<script>alert('Cetak Error!'); window.location = '" . base_url('index.php/login/dashboard') . "'</script>";
        }
    }

    function cetak_data_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->Siswa_model->get_siswa($nis);
        $output = "
        <h3 align='center'>PROFIL SISWA<br></h3>";
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
            $output .= "
            <table border='0' width='100%' cellpadding='5' cellspacing='0'>
            <tr>
                <td><font size='3'>Nama Sekolah</font></td> <td><font size='3'>:</font></td> <td><font size='3'>SMK AL-BAHRI</font></td><td></td><td><font size='3'>Semester</td><td>:</td><td><font size='3'>$data[6] $sem</font></td>
            </tr>
            <tr>
                <td><font size='3'>Alamat</font></td> <td><font size='3'>:</td> <td><font size='3'>Jl. Yon Armed Cikiwul Bantargebang Kota Bekasi</font></td><td></td><td><font size='3'>Tahun Pelajaran</font></td><td>:</td><td><font size='3'>2017/2018</font></td>
            </tr>
        </table>
        <br>";
            break;
        }
        $output .= "<table border='1' width='100%' cellpadding='5' cellspacing='0'>
                   <tr>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama Peserta Didik</th>
                        <th>Alamat</th>
                        <th>N I S N</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Paket Keahlian</th>
                    </tr>";
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
            $output .= "<tr>
                        <td align='center'>$data[0]</td>
                        <td>$data[1]</td>
                        <td>$data[2]</td>
                        <td align='center'>$data[3]</td>
                        <td align='center'>$data[5]</td>
                        <td align='center'>$data[6] $sem</td>
                        <td>$data[4]</td>
                    </tr>";
            $no++;
        }
        $output .= "</table>";
        $mpdf->SetHTMLHeader("
        <table border='0' style='margin-left: 0%;' cellspacing='0'>
        <tr>
            <th rowspan='4'><img src='assets/images/ab1.jpg'/></th>
        </tr>
        <tr>
            <th align='left'><font color='#2a166f' size='4'>YAYASAN PENDIDIKAN SEKOLAH MENENGAH KEJURUAN</font></th>
        </tr>
        <tr>
            <th align='left'><font color='#2a166f' size='6'>SMK AL-BAHRI KOTA BEKASI</font></th>
        </tr>
        <tr>
            <th align='left'><font color='#2a166f' size='5'>'TERAKREDITASI BAN-S/M'</font></th>
        </tr>
        </table>
        ");

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait 
            '',
            '',
            '',
            '',
            12, // margin_left
            12, // margin right
            39, // margin top
            10, // margin bottom
            16, // margin header
            0
        ); // margin footer
        $nama = 'Profil Siswa - ' . $data[1];
        $mpdf->WriteHTML($output);
        $mpdf->Output($nama . ".pdf", 'I');
    }

    function cetak_data_excel($nis)
    {
        $data['title'] = 'Profil Siswa - ' . $nis;
        $data['result'] = $this->Siswa_model->get_siswa($nis);

        $this->load->view('cetak_siswa_excel', $data);
    }

    function cetak_rapor()
    {
        $pilih = $this->input->post('pilih');
        if ($pilih == 'pdf') {
            $this->cetak_rapor_pdf($this->input->post('nis'));
        } else if ($pilih == 'excel') {
            $this->cetak_rapor_excel($this->input->post('nis'));
        } else {
            echo "<script>alert('Cetak Error!'); window.location = '" . base_url('index.php/admin/tampil_mapel') . "'</script>";
        }
    }

    function cetak_rapor_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $result = $this->Siswa_model->get_rapor_siswa($nis);
        $output = "
        <h3 align='center'>LAPORAN CAPAIAN KOMPETENSI PESERTA DIDIK<br>TAHUN PELAJARAN 2017/2018<br></h3>";
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
            $output .= "
        <table border='0' width='100%' cellpadding='5' cellspacing='0'>
            <tr>
                <td><font size='3'>Nama Sekolah</font></td> <td><font size='3'>:</font></td> <td><font size='3'>SMK AL-BAHRI</font></td><td></td><td><font size='3'>Kelas</td><td>:</td><td><font size='3'>$data[8]/$kel</font></td>
            </tr>
            <tr>
                <td><font size='3'>Alamat</font></td> <td><font size='3'>:</td> <td><font size='3'>Jl. Yon Armed Cikiwul Bantargebang Kota Bekasi</font></td><td></td><td><font size='3'>Semester</td><td>:</td><td><font size='3'>$data[9] $sem</font></td>
            </tr>
            <tr>
                <td><font size='3'>Nomor Induk Siswa</font></td> <td><font size='3'>:</font></td> <td><font size='3'>$data[0]</font></td><td></td><td><font size='3'>Tahun Pelajaran</font></td><td>:</td><td><font size='3'>2017/2018</font></td>
            </tr>
            <tr>
                <td><font size='3'>Nama Peserta Didik</font></td> <td><font size='3'>:</font></td> <td><font size='3'>$data[1]</font></td><td></td><td><font size='3'>Paket Keahlian</font></td><td>:</td><td><font size='3'>$data[7]</font></td>
            </tr>
            <tr>
                <td><font size='3'>N I S N</font></td> <td><font size='3'>:</font></td> <td><font size='3'>$data[2]</font></td>
            </tr>
        </table>
        <br>";
            break;
        }
        $output .= "
        <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>CAPAIAN HASIL BELAJAR</font></th>
        </tr>
        <tr>
            <th align='left'><font size='3'>A. Sikap</font></th>
        </tr>
        </table>
        <table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <td align='left' width='1105px'><b>Deskripsi : </b><br><br> Baik dalam sikap spiritual dan kerja sama, baik dalam toleransi, disiplin, santun, jujur, cinta damai, responsip, pro aktif dan masih cukup dalam kepedulian.</td>
        </tr>
        </table>
        <br>
        <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>B. Pengetahuan dan Keterampilan</font></th>
        </tr>
        </table>";

        $output .= "<table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr >
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
        </tr>";

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
                $des = "Cukup. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar.";
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
            $output .= "
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
        $output .= "</table>";

        $output .= "
        <br>
        <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>C. Praktik Kerja Lapang</font></th>
        </tr>
        <br>
    </table>";
        $output .= "
    <table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='center'>No.</th>
            <th align='center' width='140px'>Mitra DU/DI</th>
            <th align='center' width='150px'>Lokasi</th>
            <th align='center' width='330px'>Lamanya (Bulan)</th>
            <th align='center' width='450px'>Keterangan</th>
        </tr>";
        $no = 1;
        $output .= "<tr>
            <td align='center'>$no</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>";
        $no++;
        $output .= "</table>";
        $output .= "
    <br>
    <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>D. Ekstra Kurikuler</font></th>
        </tr>
        <br>
    </table>";
        $output .= "
    <table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='center'>No.</th>
            <th align='center' width='295px'>Kegiatan Ekstrakurikuler</th>
            <th align='center' width='785px'>Keterangan</th>
        </tr>";
        $no = 1;
        $output .= "<tr>
            <td align='center'>$no</td>
            <td>Pramuka</td>
            <td>Melaksanakan Kegiatan Ekstrakurikuler Pramuka dengan Baik</td>
        </tr>";
        $no++;
        $output .= "</table>";
        $output .= "
    <br>
    <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>E. Prestasi</font></th>
        </tr>
        <br>
    </table>";
        $output .= "
    <table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='center'>No.</th>
            <th align='center' width='285px'>Jenis Prestasi</th>
            <th align='center' width='785px'>Keterangan</th>
        </tr>";
        $no = 1;
        $output .= "<tr>
            <td align='center'>$no</td>
            <td></td>
            <td></td>
        </tr>";
        $no++;
        $output .= "</table>";
        $output .= "
    <br>
    <table border='0' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>F. Ketidakhadiran</font></th>
        </tr>
        <br>
    </table>
    <table border='1' cellpadding='5' cellspacing='0' width='300px'>
        <tr>
            <th align='center' width='207px'><font size='2'>Sakit</font></th>
            <td>:</td>
            <td align='right' width='230px'><font size='2'>Hari</font></td>
        </tr>
        <tr>
            <th align='center' width='207px'><font size='2'>Ijin</font></th>
            <td>:</td>
            <td align='right'><font size='2'>Hari</font></td>
        </tr>
        <tr>
            <th align='center' width='207px'><font size='2'>Tanpa Keterangan</font></th>
            <td>:</td>
            <td align='right'><font size='2'>Hari</font></td>
        </tr>
    </table>
    <br>
    <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>G. Catatan Wali Kelas</font></th>
        </tr>
    </table>
    <table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <td align='center' width='1105px' height='80px'>..</td>
        </tr>
    </table>
    <br>
    <table border='0'width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <th align='left'><font size='3'>H. Tanggapan Orang tua/wali</font></th>
        </tr>
    </table>
    <table border='1' width='100%' cellpadding='5' cellspacing='0'>
        <tr>
            <td align='center' width='1105px' height='80px'>..</td>
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
        ";
        $mpdf->SetHTMLHeader("
        <table border='0' style='margin-left: 0%;' cellspacing='0'>
        <tr>
            <th rowspan='4'><img src='assets/images/ab1.jpg'/></th>
        </tr>
        <tr>
            <th align='left'><font color='#2a166f' size='4'>YAYASAN PENDIDIKAN SEKOLAH MENENGAH KEJURUAN</font></th>
        </tr>
        <tr>
            <th align='left'><font color='#2a166f' size='6'>SMK AL-BAHRI KOTA BEKASI</font></th>
        </tr>
        <tr>
            <th align='left'><font color='#2a166f' size='5'>'TERAKREDITASI BAN-S/M'</font></th>
        </tr>
        </table>
        ");

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait 
            '',
            '',
            '',
            '',
            12, // margin_left
            12, // margin right
            39, // margin top
            10, // margin bottom
            16, // margin header
            0
        ); // margin footer
        $nama = 'Laporan Capaian Kompetensi - ' . $data[1];
        $mpdf->WriteHTML($output);
        // $mpdf->Image('assets/images/ab.jpg', 10, 10, 24, 20, 'jpg', '', true, false);
        $mpdf->Output($nama . ".pdf", 'I');
    }

    function cetak_rapor_excel($nis)
    {
        $data['title'] = 'Laporan Capaian Kompetensi - ' . $nis;
        $data['result'] = $this->Siswa_model->get_rapor_siswa($nis);

        $this->load->view('rapor_siswa_excel', $data);
    }
}
