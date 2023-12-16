<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Kelas</h5>
                        <div class="table-responsive">
                            <!-- Default Table -->
                            <table style="text-align: center;" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Nama Mata Kuliah</th>
                                        <th scope="col">Dosen</th>
                                        <!-- <th scope="col">Mid Semester</th>
                                        <th scope="col">Final Semester</th>
                                        <th scope="col">Keterangan</th> -->
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($dosen as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['kode']; ?></td>
                                            <td><?= $ds['212395_Nama_Matkul']; ?></td>
                                            <td><?= $ds['212395_Nama_Dosen']; ?></td>
                                            <td>
                                                <a style="padding: 1px 4px;" href="/nilai/listM/<?= $ds['kode']; ?>" class="btn btn-primary">
                                                    <i class="ri-edit-box-line"></i>
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