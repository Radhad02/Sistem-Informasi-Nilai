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

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data</h5>
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
                        <form id="coba" action="/nilai/save" method="post">

                            <div style="display: none;" class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Id Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" name="212395_Id_Mahasiswa" id="id_mahasiswa" class="form-control" readonly>
                                </div>
                            </div>

                            <div style="display: none;" class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Id</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" name="212395_Id_Matkul" id="id_matkul" class="form-control" readonly>
                                </div>
                            </div>

                            <div style="display: none;" class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Kode Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Kelas" class="form-control" value="<?php echo $kodeKelas; ?>" readonly>
                                </div>
                            </div>

                            <div style="display: none;" class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Input" class="form-control" value="1" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Kehadiran</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" max="100" id="myNumberInput" name="212395_Kehadiran" class="form-control" oninput="validateInput(this)">
                                    <div id="kehadiranError" class="error-message"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Tugas</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" max="100" id="myNumberInput" name="212395_Tugas" class="form-control" oninput="validateInput(this)">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Mid Semester</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" maxlength="100" id="myNumberInput" name="212395_Mid" class="form-control" oninput="validateInput(this)">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Final Semester</label>
                                <div class="col-sm-10">
                                    <input type="number" step="any" max="100" id="myNumberInput" name="212395_Final" class="form-control" oninput="validateInput(this)">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputnumber" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="212395_Keterangan" class="form-control">
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


    <script>
        // Mendapatkan URL dari alamat saat ini
        var url = window.location.href;

        // Mengambil bagian ketiga dan keempat dari URL dengan split("/") dan menggunakan slice()
        var urlSegments = url.split("/").slice(-2);

        // Mengonversi nilai string menjadi integer
        var idTiga = parseInt(urlSegments[0]);
        var idEmpat = parseInt(urlSegments[1]);

        document.getElementById("id_mahasiswa").value = idTiga;
        document.getElementById("id_matkul").value = idEmpat;
    </script>

    <script>
        function hitungKeterangan(totalNilai) {
            if (totalNilai >= 86 && totalNilai == 100) {
                return "A";
            } else if (totalNilai >= 80 && totalNilai < 86) {
                return "A-";
            } else if (totalNilai >= 75 && totalNilai < 80) {
                return "B+";
            } else if (totalNilai >= 70 && totalNilai < 75) {
                return "B";
            } else if (totalNilai >= 65 && totalNilai < 80) {
                return "B-";
            } else if (totalNilai >= 60 && totalNilai <= 65) {
                return "C";
            } else if (totalNilai >= 40 && totalNilai <= 60) {
                return "D";
            } else if (totalNilai < 40) {
                return "E"
            } else {
                return "";
            }
        }


        function hitungTotal() {
            var kehadiran = parseFloat(document.getElementsByName("212395_Kehadiran")[0].value) || 0;
            var tugas = parseFloat(document.getElementsByName("212395_Tugas")[0].value) || 0;
            var midSemester = parseFloat(document.getElementsByName("212395_Mid")[0].value) || 0;
            var finalSemester = parseFloat(document.getElementsByName("212395_Final")[0].value) || 0;

            var totalNilai = kehadiran + tugas + midSemester + finalSemester;

            if (totalNilai > 100) {
                alert("Nilai tidak boleh melebihi 100");
                document.getElementsByName("212395_Kehadiran")[0].value = '';
                document.getElementsByName("212395_Tugas")[0].value = '';
                document.getElementsByName("212395_Mid")[0].value = '';
                document.getElementsByName("212395_Final")[0].value = '';
                document.getElementsByName("212395_Keterangan")[0].value = '';
                document.getElementsByName("212395_Kehadiran")[0].focus();
                return;
            } else {
                // Kosongkan pesan error jika nilai valid
            }
            var keterangan = hitungKeterangan(totalNilai);
            document.getElementsByName("212395_Keterangan")[0].value = keterangan;
        }

        var inputElements = document.querySelectorAll('input[name^="212395_"]');

        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].addEventListener("input", hitungTotal);
        }
    </script>


    <script>
        function validateInput(input) {
            // Ambil nilai dari input
            var value = input.value;

            // Konversi nilai menjadi angka
            var numericValue = parseFloat(value);

            // Cek apakah nilai lebih dari 100
            if (numericValue > 100) {
                // Jika lebih dari 100, atur nilai input menjadi 100
                input.value = 100;

                // Tampilkan pesan kesalahan
                alert("Nilai tidak boleh lebih dari 100");
            }
        }
    </script>

</main>

<?= $this->endSection(); ?>