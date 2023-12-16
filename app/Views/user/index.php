<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <a style="padding: 1px 4px;" href="/user/input" class="btn btn-primary mb-2">
        <i class="ri-edit-box-line"> Tambah Data</i>
    </a>
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>

                                    <?php foreach ($datauser as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['212395_Nama']; ?></td>
                                            <td><?= $ds['212395_Username']; ?></td>
                                            <td><?= $ds['212395_Level']; ?></td>
                                            <td>
                                                <a style="padding: 1px 4px;" href="/user/edit/<?= $ds['212395_Id'] ?>" class="btn btn-primary">
                                                    <i class="ri-edit-box-line"></i>
                                                </a>
                                                <a style="padding: 1px 4px;" href="/user/delete/<?= $ds['212395_Id'] ?>" onclick="return confirm('Apakah Anda Yakin')" class="btn btn-danger">
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