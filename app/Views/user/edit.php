<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data User</h5>

                        <!-- General Form Elements -->
                        <form action="/user/update/<?= $datauser['212395_Id']; ?>" method="post">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Username" class="form-control" value="<?= $datauser['212395_Username']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pass</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Pass" class="form-control" value="<?= $datauser['212395_Pass']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Level">
                                        <option value="admin" <?= ($datauser['212395_Level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="dosen" <?= ($datauser['212395_Level'] == 'dosen') ? 'selected' : ''; ?>>Dosen</option>
                                        <option value="mahasiswa" <?= ($datauser['212395_Level'] == 'mahasiswa') ? 'selected' : ''; ?>>Mahasiswa</option>
                                        <!-- Tambahkan opsi-opsi lain sesuai kebutuhan -->
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