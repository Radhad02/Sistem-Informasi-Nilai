<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kelas Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">kelas Mahasiswa</li>
                <li class="breadcrumb-item active">Data Kelas Mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <a style="padding: 1px 4px;" href="/kelas_mahasiswa/input" class="btn btn-primary mb-2">
        <i class="ri-edit-box-line"> Tambah Data</i>
    </a>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                            <!-- Default Table -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Ruagan</th>
                                        <!-- <th scope="col">Nama Mata Kuliah</th> -->
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>

                                    <?php foreach ($all as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['212395_Nim']; ?></td>
                                            <td><?= $ds['212395_Nama']; ?></td>
                                            <td><?= $ds['kode_kelas']; ?></td>
                                            <td><?= $ds['212395_Ruangan']; ?></td>
                                            <!-- <td><?= $ds['212395_Nama_Matkul']; ?></td> -->
                                            <td>
                                                <?php if (!empty($data)) : ?>
                                                    <?php $dt = $data[0]; // Mengambil elemen pertama dari $data 
                                                    ?>
                                                    <a style="padding: 1px 4px;" href="/kelas_mahasiswa/delete/<?= $dt['212395_Id'] ?>" onclick="return confirm('Apakah Anda Yakin')" class="btn btn-danger">
                                                        <i class="bi-trash-fill"></i>
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