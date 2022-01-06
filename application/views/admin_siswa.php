<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ab.jpg') ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin - Siswa</title>
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
                <a class="navbar-brand" href="#"> SMK AL-BAHRI BEKASI</a>
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
                                <a class="nav-link active" href="<?php echo base_url('index.php/admin/tampil_siswa'); ?>"><i class="fa fa-fw fa-user"></i>Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/admin/tampil_mapel'); ?>"><i class="fa fa-fw fa-graduation-cap"></i>Mata Pelajaran</a>
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
                            <h2 class="pageheader-title">Siswa</h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">List Siswa</h5>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_siswa">
                                    <i class="fa fa-fw fa-plus"></i> Tambah Data
                                </a><br><br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th scope="col">No.</th>
                                            <th scope="col">NIS</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">N I S N</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Paket Keahlian</th>
                                            <th scope="col" width="200px">Option</th>
                                        </tr>
                                    </thead>
                                    <?php $no = $page + 1;
                                    foreach ($results as $d) : ?>
                                        <tbody>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td align="center"><?php echo $d->nis; ?></td>
                                                <td><?php echo $d->username; ?></td>
                                                <td><?php echo $d->nama; ?></td>
                                                <td><?php echo $d->alamat ?></td>
                                                <td align="center"><?php echo $d->nisn ?></td>
                                                <td align="center"><?php echo $d->kelas ?></td>
                                                <td align="center"><?php echo $d->semester ?></td>
                                                <td><?php echo $d->jurusan ?></td>
                                                <td align="center">
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah_siswa<?php echo $d->username; ?>"><i class="fa fa-fw fa-pencil-alt"></i> Ubah</a> <?php echo anchor('admin/hapus_siswa/' . $d->username, '<i class="fa fa-fw fa-trash"></i> Hapus', 'title="Hapus" class="btn btn-danger btn-sm"'); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php $no++;
                                    endforeach; ?>
                                </table>
                                <br>
                                <h4>Halaman : <?php echo $links; ?></h4>
                                <?php echo form_open('admin/cetak_siswa'); ?>
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
                    <div class="modal fade" id="tambah_siswa" tabindex="-1" role="dialog" aria-labelledby="tambah-siswa" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambah-siswa">Tambah Data Siswa</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo form_open('admin/submit_siswa');
                                    ?>
                                    <div class="form-group">
                                        <label for="nama">Nomor Induk Mahasiswa</label>
                                        <input class="form-control form-control-lg" maxlength="9" id="nis" name="var[0]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input class="form-control form-control-lg" id="username" name="var[1]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Peserta Didik</label>
                                        <input class="form-control form-control-lg" id="nama" name="var[2]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Alamat">Alamat</label>
                                        <textarea name="var[3]" class="form-control" id="Alamat" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">N I S N</label>
                                        <input class="form-control form-control-lg" maxlength="10" id="nisn" name="var[5]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Kelas</label>
                                        <select name="var[7]" class="form-control" id="kelas">
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Semester</label>
                                        <select name="var[8]" class="form-control" id="semester">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Paket Keahlian</label>
                                        <select name="var[6]" class="form-control" id="jurusan">
                                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="Multimedia">Multimedia</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control form-control-lg" id="password" name="var[4]" type="password">
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
                    <?php foreach ($results as $s) : ?>
                        <div class="modal fade" id="ubah_siswa<?php echo $s->username; ?>" tabindex="-1" role="dialog" aria-labelledby="ubah-siswa" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ubah-siswa">Ubah Data Siswa</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        echo form_open('admin/ubah_siswa');
                                        ?>
                                        <input type="hidden" name="oldusername" value="<?php echo $s->username; ?>">
                                        <div class="form-group">
                                            <label for="nama">Nomor Induk Mahasiswa</label>
                                            <input class="form-control form-control-lg" maxlength="9" value="<?php echo $s->nis; ?>" id="nis" name="var[0]" type="text" autocomplete="off" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input class="form-control form-control-lg" id="username" value="<?php echo $s->username; ?>" name="var[1]" type="text" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Peserta Didik</label>
                                            <input class="form-control form-control-lg" id="nama" value="<?php echo $s->nama; ?>" name="var[2]" type="text" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="Alamat">Alamat</label>
                                            <textarea name="var[3]" class="form-control form-control-lg" id="Alamat" rows="3"><?php echo $s->alamat; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">N I S N</label>
                                            <input class="form-control form-control-lg" maxlength="10" value="<?php echo $s->nisn; ?>" id="nisn" name="var[5]" type="text" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Kelas</label>
                                            <select name="var[7]" class="form-control form-control-lg" id="kelas" value="<?php echo $s->kelas; ?>">
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Semester</label>
                                            <select name="var[8]" class="form-control form-control-lg" id="semester" value="<?php echo $s->semester; ?>">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Paket Keahlian</label>
                                            <select name="var[6]" class="form-control form-control-lg" id="jurusan" value="<?php echo $s->jurusan; ?>">
                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Multimedia">Multimedia</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password (Ubah Password)</label>
                                            <input class="form-control form-control-lg" id="password" name="var[4]" type="password">
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