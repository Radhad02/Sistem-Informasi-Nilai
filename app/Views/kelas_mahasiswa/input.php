<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">kelas</li>
                <li class="breadcrumb-item active">Input Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data kelas</h5>
                        <!-- General Form Elements -->
                        <form action="/kelas_mahasiswa/save" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mahasiswa</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Mahasiswa" id="matkulSelect">
                                        <option selected>---Pilih Mahasiswa---</option>
                                        <?php foreach ($datamahasiswa as $ds) : ?>
                                            <option value="<?= $ds['212395_Id']; ?>"><?= $ds['212395_Nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Matkul" id="matkulSelect">
                                        <option selected>---Pilih Mata Kuliah---</option>
                                        <?php foreach ($datamatkul as $ds) : ?>
                                            <option value="<?= $ds['212395_Id']; ?>"><?= $ds['212395_Nama_Matkul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Kelas" id="dosenSelect">
                                        <option selected>---Pilih Mata Kuliah---</option>
                                        <?php foreach ($datakelas as $ds) : ?>
                                            <option value="<?= $ds['212395_Id']; ?>"><?= $ds['212395_Kode_Matkul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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