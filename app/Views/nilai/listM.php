<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Nilai</li>
                <li class="breadcrumb-item active">Data Nilai <?= $kode; ?></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Kelas <?= $kode; ?></h5>
                        <div class="table-responsive">
                            <!-- Default Table -->
                            <table style="text-align: center;" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($mahasiswa as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['212395_Nim']; ?></td>
                                            <td><?= $ds['namaMHS']; ?></td>
                                            <td>
                                                <?php
                                                $aksiTerinput = false;
                                                foreach ($aksi as $da) {
                                                    if ($da['212395_Status'] == 1 && $da['212395_Nama'] == $ds['namaMHS'] && $da['212395_Kelas'] ==  $kode) {
                                                        $aksiTerinput = true;
                                                        break; // Keluar dari loop jika sudah terinput
                                                    }
                                                }
                                                ?>
                                                <?php if ($aksiTerinput) : ?>
                                                    <a style="padding: 1px 4px;" class="btn btn-success">
                                                        Nilai Sudah Terinput
                                                    </a>
                                                <?php else : ?>
                                                    <a style="padding: 1px 4px;" href="/nilai/input/<?= $ds['Id_Mahasiswa']; ?>/<?= $ds['212395_Id_Matkul']; ?>" class="btn btn-primary">
                                                        <i class="ri-edit-box-line"> Input Nilai</i>
                                                    </a>
                                                <?php endif; ?>
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