<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href=""></a>Mahasiswa</li>
                <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <button onclick="bukaPDFdiTabBaru()">Buka PDF</button>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Default Table -->
                            <table class="table datatable mt-2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($datamahasiswa as $ds) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['212395_Nim']; ?></td>
                                            <td><?= $ds['212395_Nama']; ?></td>
                                            <td><?= $ds['212395_Alamat']; ?></td>
                                            <td><?= $ds['212395_Tanggal_Lahir']; ?></td>
                                            <td><?= $ds['212395_Jkl']; ?></td>
                                            <td><?= $ds['212395_Jurusan']; ?></td>
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
<script>
    function bukaPDFdiTabBaru() {
        // Ganti 'url_to_your_controller/export_pdf' dengan URL yang sesuai pada controller Anda
        var url = 'export_pdf';

        // Membuka URL dalam tab baru
        window.open(url, '_blank');
    }
</script>

<?= $this->endSection(); ?>