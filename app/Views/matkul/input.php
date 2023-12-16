<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Input Data Mata Kuliah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Mata Kuliah</li>
                <li class="breadcrumb-item active">Input Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="card-body col-lg-5">
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="ri-alert-line"></i>Data Mata Kuliah</h5>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= session()->getFlashdata('errors'); ?>
            </div>
        </div>
    <?php endif; ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data</h5>

                        <!-- General Form Elements -->
                        <form action="/matkul/save" method="post">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="212395_Kode">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="212395_Matkul">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jumlah SKS</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_SKS">
                                        <option selected>---Pilih Jumlah SKS---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Dosen</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Dosen">
                                        <option selected>---Pilih Dosen---</option>
                                        <?php foreach ($dosen as $ds) : ?>
                                            <option value="<?= $ds['212395_Id']; ?>"><?= $ds['212395_Nama_Dosen']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->
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