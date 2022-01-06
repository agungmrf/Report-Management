<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg') ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Siswa | Raport</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/charts/c3charts/c3.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') ?>">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#"> SMK AL-BAHRI BEKASI </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/login/dashboard'); ?>"><i class="fa fa-fw fa-user"></i>Profil Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/siswa/update_password'); ?>"><i class="fa fa-fw fa-graduation-cap"></i>Update Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('index.php/siswa/tampil_rapor'); ?>"><i class="fa fa-fw fa-file"></i>Raport</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/login/logout'); ?>"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Raport</h2>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Nilai Raport</h5>
                            <div class="card-body">
                                <?php echo
                                    form_open('siswa/cetak_rapor');
                                ?>
                                <input type="hidden" name="nis" value="<?php foreach ($results as $d) {
                                                                            echo $d->nis;
                                                                            break;
                                                                        } ?>">
                                <div class="form-row">
                                    <select class="form-control col-1" name="pilih">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                    </select>&nbsp;
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Cetak</button>
                                </div>
                                <?php echo form_close(); ?>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th rowspan='2' align='center' align='center'>No.</th>
                                            <th rowspan='2' width='150px' align='center'>Mata Pelajaran</th>
                                            <th colspan='4' align='center'>Pengetahuan</th>
                                            <th colspan='3' align='center'>Keterampilan</th>
                                        </tr>
                                        <tr align="center">
                                            <th align='center'>KB</th>
                                            <th align='center'>Angka</th>
                                            <th align='center'>Predikat</th>
                                            <th width='225px'>Deskripsi</th>
                                            <th align='center'>Angka</th>
                                            <th align='center'>Predikat</th>
                                            <th width='225px'>Deskripsi</th>
                                        </tr>
                                        <tr>
                                            <th colspan='10' align='left'>Kelompok A</th>
                                        </tr>
                                    </thead>
                                    <?php $no = $page + 1;
                                    foreach ($results as $d) :
                                        if ($d->nilpel >= 85 && $d->nilpel <= 100) {
                                            $pre = "A";
                                            $des = "Sangat baik dan sempurna, Dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi semua kompetensi dasar.";
                                        }
                                        if ($d->nilpel >= 75 && $d->nilpel <= 85) {
                                            $pre = "B";
                                            $des = "Baik, Dapat Mengingat, mengetahui, menerapkan, menganalisis, dan mengevaluasi sebagian besar kompetensi dasar tetapi kurang bisa mengevaluasi dua kompentensi dasar.";
                                        }
                                        if ($d->nilpel >= 62 && $d->nilpel <= 75) {
                                            $pre = "C";
                                            $des = "Cukup. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar.";
                                        }
                                        if ($d->nilpel <= 62) {
                                            $pre = "D";
                                            $des = "Sangat kurang. Hanya dapat mengingat, mengetahui, menerapkan, menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja.";
                                        }

                                        if ($d->nilket >= 85 && $d->nilket <= 100) {
                                            $pre1 = "A";
                                            $des1 = "Sangat baik dan sempurna, sangat aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan semua soal.";
                                        }
                                        if ($d->nilket >= 75 && $d->nilket <= 85) {
                                            $pre1 = "B";
                                            $des1 = "Baik, Sangat aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan sebagian besar soal cerita.";
                                        }
                                        if ($d->nilket >= 62 && $d->nilket <= 75) {
                                            $pre1 = "C";
                                            $des1 = "Cukup. Aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan soal cerita.";
                                        }
                                        if ($d->nilket <= 62) {
                                            $pre1 = "D";
                                            $des1 = "Sangat kurang, tidak aktif dalam mencoba, menalar, dan tidak kreatif dalam menyelesaikan latihan.";
                                        }
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td><?php echo $d->nmmapel; ?></td>
                                                <td align="center"><?php echo $d->kb; ?></td>
                                                <td align="center"><?php echo $d->nilpel; ?></td>
                                                <td align="center"><?php echo $pre; ?></td>
                                                <td><?php echo $des; ?></td>
                                                <td align="center"><?php echo $d->nilket; ?></td>
                                                <td align="center"><?php echo $pre1; ?></td>
                                                <td><?php echo $des1; ?></td>
                                            </tr>
                                        <?php $no++;
                                    endforeach; ?>
                                        </tbody>
                                </table><br>
                                <h5>Halaman : <?php echo $links; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js') ?>"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url('assets/vendor/slimscroll/jquery.slimscroll.js') ?>"></script>
    <!-- main js -->
    <script src="<?php echo base_url('assets/libs/js/main-js.js') ?>"></script>
    <!-- chart chartist js -->
    <script src="<?php echo base_url('assets/vendor/charts/chartist-bundle/chartist.min.js') ?>"></script>
    <!-- sparkline js -->
    <script src="<?php echo base_url('assets/vendor/charts/sparkline/jquery.sparkline.js') ?>"></script>
    <!-- morris js -->
    <script src="<?php echo base_url('assets/vendor/charts/morris-bundle/raphael.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/morris-bundle/morris.js') ?>"></script>
    <!-- chart c3 js -->
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/c3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/d3-5.4.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/charts/c3charts/C3chartjs.js') ?>"></script>
    <script src="<?php echo base_url('assets/libs/js/dashboard-ecommerce.js') ?>"></script>
</body>

</html>