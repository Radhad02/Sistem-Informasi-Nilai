<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Dosen</li>
                <li class="breadcrumb-item active">Input Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data Dosen</h5>
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
                        <form action="/dosen/update/<?= $datadosen['212395_Id']; ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">NIDN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_NIDN" class="form-control" value="<?= $datadosen['212395_NIDN']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Nama_Dosen" class="form-control" value="<?= $datadosen['212395_Nama_Dosen']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Alamat" class="form-control" value="<?= $datadosen['212395_Alamat']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="212395_Tanggal_Lahir" class="form-control" value="<?= $datadosen['212395_Tanggal_Lahir']; ?>">
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="212395_jkl" id="gridRadios1" <?= ($datadosen['212395_jkl'] === 'Laki-Laki') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="212395_jkl" id="gridRadios2" <?= ($datadosen['212395_jkl'] === 'Perempuan') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for=" gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-10">
                                    <input type="number" name="212395_Kontak" class="form-control" value="<?= $datadosen['212395_Kontak']; ?>">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div style="margin-top: 8px;" class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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