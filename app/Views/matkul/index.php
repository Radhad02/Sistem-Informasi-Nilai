<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Mata Kuliah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Mata Kuliah</li>
                <li class="breadcrumb-item active">Data Mata Kuliah</li>
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
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Nama Dosen</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>212395</td>
                                        <td>Coba</td>
                                        <td>Jl. Keabadian</td>
                                        <td>
                                            <a style="padding: 1px 4px;" href="/DataSiswa/input" class="btn btn-primary">
                                                <i class="ri-edit-box-line"></i>
                                            </a>
                                            <a style="padding: 1px 4px;" href="/DataSiswa/input" class="btn btn-danger">
                                                <i class="bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
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