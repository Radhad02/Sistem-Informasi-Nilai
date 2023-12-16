<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Input Data Kelas</h1>
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
                        <form action="/kelas/save" method="post">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kode Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Kode" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Ruangan" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Matkul">
                                        <option selected>---Pilih Mata Kuliah---</option>
                                        <?php foreach ($matkul as $ds) : ?>
                                            <option value="<?= $ds['212395_Id']; ?>"><?= $ds['212395_Nama_Matkul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input name="212395_Nama" type="text" class="form-control" id="namaMatkulInput" list="matkulList" placeholder="Cari Mata Kuliah">
                                    <datalist id="matkulList">
                                        <?php foreach ($matkul as $ds) : ?>
                                            <option value="<?= $ds['212395_Nama_Matkul']; ?>" data-id="<?= $ds['212395_Id']; ?>" data-matkul="<?= $ds['212395_Nama_Matkul']; ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Matkul (ID)</label>
                                <div class="col-sm-10">
                                    <input name="212395_Id_Matkul" type="text" class="form-control" id="idMatkulInput" placeholder="ID Mahasiswa" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Dosen</label>
                                <div class="col-sm-10">
                                    <input name="212395_Nama" type="text" class="form-control" id="namaDosenInput" list="dosenList" placeholder="Cari Dosen">
                                    <datalist id="dosenList">
                                        <?php foreach ($dosen as $ds) : ?>
                                            <option value="<?= $ds['212395_Nama_Dosen']; ?>" data-id="<?= $ds['212395_Id']; ?>" data-matkul="<?= $ds['212395_Nama_Dosen']; ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Dosen (ID)</label>
                                <div class="col-sm-10">
                                    <input name="212395_Id_Dosen" type="text" class="form-control" id="idDosenInput" placeholder="ID Mahasiswa" readonly>
                                </div>
                            </div>


                            <!-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Dosen</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="212395_Id_Dosen">
                                        <option selected>---Pilih Dosen---</option>
                                        <?php
                                        $uniqueDosen = [];
                                        foreach ($dosen as $ds) {
                                            // Cek apakah nama dosen sudah ada dalam array $uniqueDosen
                                            if (!in_array($ds['212395_Nama_Dosen'], $uniqueDosen)) {
                                                $uniqueDosen[] = $ds['212395_Nama_Dosen'];
                                                // Menambahkan nama dosen ke array $uniqueDosen
                                        ?>
                                                <option value="<?= $ds['212395_Id']; ?>"><?= $ds['212395_Nama_Dosen']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
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

<script>
    // Menanggapi peristiwa pemilihan pada input nama mahasiswa
    document.getElementById('namaMatkulInput').addEventListener('change', function() {
        // Mendapatkan elemen option yang dipilih
        var selectedOption = document.querySelector('#matkulList option[value="' + this.value + '"]');

        // Memasukkan nilai id mahasiswa ke dalam input id mahasiswa
        document.getElementById('idMatkulInput').value = selectedOption.dataset.id;
    });

    document.getElementById('namaDosenInput').addEventListener('change', function() {
        // Mendapatkan elemen option yang dipilih
        var selectedOption = document.querySelector('#dosenList option[value="' + this.value + '"]');

        // Memasukkan nilai id mahasiswa ke dalam input id mahasiswa
        document.getElementById('idDosenInput').value = selectedOption.dataset.id;
    });
</script>
<?= $this->endSection(); ?>