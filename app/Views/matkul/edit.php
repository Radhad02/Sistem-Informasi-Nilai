<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Mata Kuliah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Mata Kuliah</li>
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
                        <form action="/matkul/update/<?= $data['212395_Id']; ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Kode" class="form-control" autofocus value="<?= $data['212395_Kode']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Matkul" class="form-control" value="<?= $data['212395_Nama_Matkul']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jumlah SKS</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_SKS">
                                        <option selected>---Pilih Jumlah SKS---</option>
                                        <option <?= $data['212395_SKS'] == '1' ? 'selected' : ''; ?> value="1">1</option>
                                        <option <?= $data['212395_SKS'] == '2' ? 'selected' : ''; ?> value="2">2</option>
                                        <option <?= $data['212395_SKS'] == '3' ? 'selected' : ''; ?> value="3">3</option>
                                        <option <?= $data['212395_SKS'] == '4' ? 'selected' : ''; ?> value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Dosen</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Dosen">
                                        <option selected>---Pilih Dosen---</option>
                                        <?php foreach ($dosen as $ds) : ?>
                                            <option value="<?= $ds['212395_Id']; ?>" <?= ($ds['212395_Id'] == $data['212395_Id_Dosen']) ? 'selected' : ''; ?>>
                                                <?= $ds['212395_Nama_Dosen']; ?>
                                            </option>
                                        <?php endforeach; ?>

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