<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg') ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin - Mata Pelajaran</title>
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
                                <a class="nav-link" href="<?php echo base_url('index.php/login/dashboard'); ?>"><i class="fa fa-fw fa-home"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/tampil_siswa'); ?>"><i class="fa fa-fw fa-user"></i>Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('index.php/admin/tampil_mapel'); ?>"><i class="fa fa-fw fa-graduation-cap"></i>Mata Pelajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/pilih_rapor'); ?>"><i class="fa fa-fw fa-file"></i>Raport</a>
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
                            <h2 class="pageheader-title">Mata Pelajaran</h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">List Mata Pelajaran</h5>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_mapel">
                                    <i class="fa fa-fw fa-plus"></i> Tambah Mapel
                                </a><br><br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">No.</th>
                                            <th scope="col">Kode Mata Pelajaran</th>
                                            <th scope="col">Mata Pelajaran</th>
                                            <th scope="col">KB</th>
                                            <th scope="col" width="200px">Option</th>
                                        </tr>
                                    </thead>
                                    <?php $no = $page + 1;
                                    foreach ($results as $d) : ?>
                                        <tbody>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td align="center"><?php echo $d->kdmapel; ?></td>
                                                <td><?php echo $d->nmmapel; ?></td>
                                                <td align="center"><?php echo $d->kb; ?></td>
                                                <td align="center">
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah_mapel<?php echo $d->kdmapel; ?>"><i class="fa fa-fw fa-pencil-alt"></i> Ubah</a> <?php echo anchor('admin/hapus_mapel/' . $d->kdmapel, '<i class="fa fa-fw fa-trash"></i> Hapus', 'title="Hapus" class="btn btn-danger btn-sm"'); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php $no++;
                                    endforeach; ?>
                                </table><br>
                                <h5>Halaman : <?php echo $links; ?></h5>
                                <?php echo form_open('admin/cetak_mapel'); ?>
                                <div class="form-row">
                                    <select class="form-control col-1" name="pilih">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                    </select>&nbsp;
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-fw fa-print"></i> Cetak</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tambah_mapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo form_open('admin/submit_mapel');
                                    ?>
                                    <div class="form-group">
                                        <label for="kdmapel">Kode Mapel</label>
                                        <input class="form-control form-control-lg" id="kdmapel" name="var[0]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="nmmapel">Mata Pelajaran</label>
                                        <input class="form-control form-control-lg" id="nmmapel" name="var[1]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kb">KB</label>
                                        <input class="form-control form-control-lg" id="kb" name="var[2]" type="number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <?php
                                    echo form_close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($results as $m) : ?>
                        <div class="modal fade" id="ubah_mapel<?php echo $m->kdmapel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        echo form_open('admin/ubah_mapel');
                                        ?>
                                        <input type="hidden" name="kdmapel" value="<?php echo $m->kdmapel; ?>">
                                        <div class="form-group">
                                            <label for="kdmapel">Kode Mapel</label>
                                            <input class="form-control form-control-lg" id="kdmapel" value="<?php echo $m->kdmapel; ?>" name="var[0]" type="text" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="nmmapel">Mata Pelajaran</label>
                                            <input class="form-control form-control-lg" id="nmmapel" value="<?php echo $m->nmmapel; ?>" name="var[1]" type="text" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="kb">KB</label>
                                            <input class="form-control form-control-lg" id="kb" value="<?php echo $m->kb; ?>" name="var[2]" type="number" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                        <?php
                                        echo form_close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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