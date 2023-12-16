<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Kelas</li>
                <li class="breadcrumb-item active">Data Kelas</li>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Ruangan</th>
                                        <th scope="col">Nama Mata Kuliah</th>
                                        <th scope="col">Nama Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($datakelas as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['kode']; ?></td>
                                            <td><?= $ds['212395_Ruangan']; ?></td>
                                            <td><?= $ds['212395_Nama_Matkul']; ?></td>
                                            <td><?= $ds['212395_Nama_Dosen']; ?></td>
                                            <td>
                                                <a style="padding: 1px 4px;" href="/kelas/edit/<?= $ds['id_kelas'] ?>" class="btn btn-primary">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                <a style="padding: 1px 4px;" href="/kelas/delete/<?= $ds['id_kelas'] ?>" onclick="return confirm ('Apakah Anda Yakin')" class="btn btn-danger">
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