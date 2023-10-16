<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Nilai</li>
                <li class="breadcrumb-item active">Data Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Default Table</h5>
                        <div class="table-responsive">
                            <!-- Default Table -->
                            <table style="text-align: center;" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Kehadiran</th>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Mid Semester</th>
                                        <th scope="col">Final Semester</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($datanilai as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['212395_Nim']; ?></td>
                                            <td><?= $ds['212395_Kehadiran']; ?></td>
                                            <td><?= $ds['212395_Tugas']; ?></td>
                                            <td><?= $ds['212395_Mid']; ?></td>
                                            <td><?= $ds['212395_Final']; ?></td>
                                            <td><?= $ds['212395_Keterangan']; ?></td>
                                            <td>
                                                <a style="padding: 1px 4px;" href="/DataSiswa/input" class="btn btn-primary">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                <a style="padding: 1px 4px;" href="/DataSiswa/input" class="btn btn-danger">
                                                    <i class="bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>