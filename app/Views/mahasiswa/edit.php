<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Mahasiswa</li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Mahasiswa</h5>
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="card-body col-md-5">
                                <div class="alert alert-danger alert-dismissible">
                                    <h5><i class="ri-alert-line"></i>Data Mahasiswa</h5>
                                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <?= session()->getFlashdata('errors'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- General Form Elements -->
                        <form action="/mahasiswa/update/<?= $datamahasiswa['212395_Id']; ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nim</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Nim" class="form-control" autofocus value="<?= $datamahasiswa['212395_Nim']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Nama" class="form-control" value="<?= $datamahasiswa['212395_Nama']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Alamat" class="form-control" value="<?= $datamahasiswa['212395_Alamat']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tanggal lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="212395_Tanggal_Lahir" class="form-control" value="<?= $datamahasiswa['212395_Tanggal_Lahir']; ?>">
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="212395_Jkl" id="gridRadios1" <?= ($datamahasiswa['212395_Jkl'] === 'Laki-Laki') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="212395_Jkl" id="gridRadios2" <?= ($datamahasiswa['212395_Jkl'] === 'Perempuan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for=" gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                    <select name="212395_Jurusan" class="form-select" aria-label="Default select example" value="<?= $datamahasiswa['212395_Jurusan']; ?>">
                                        <option selected>---Pilih Jurusan---</option>
                                        <option value=" Teknik Informatika">Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Bisnis Digital">Bisnis Digital</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div style="margin-top: 8px;" class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>