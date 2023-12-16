<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Mahasiswa</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-user-3-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($mahasiswa); ?></h6>
                                    <a href="/mahasiswa/Data_Mahasiswa" class="text-muted small pt-2 ps-1">Selengkapnya</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Dosen</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-user-2-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($dosen); ?></h6>
                                    <a href="/dosen/Data_Dosen" class="text-muted small pt-2 ps-1">Selengkapnya</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Admin</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-user-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($admin); ?></h6>
                                    <a href="/admin/Data_Admin" class="text-muted small pt-2 ps-1">Selengkapnya</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah User</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-user-3-line"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($user); ?></h6>
                                    <a href="/dosen/Data_Dosen" class="text-muted small pt-2 ps-1">Selengkapnya</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Mata Kuliah</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-book-3-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($matkul); ?></h6>
                                    <a href="/matkul/Data_Matkul" class="text-muted small pt-2 ps-1">Selengkapnya</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kelas</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-database-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($kelas); ?></h6>
                                    <a href="/matkul/Data_Matkul" class="text-muted small pt-2 ps-1">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xxl-6 col-md-6 mx-auto">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h2 class="card-title">Jumlah Mahasiswa Yang Belum Mempunyai Kelas</h2>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-user-unfollow-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= esc($kelasM); ?></h6>
                                    <a href="/kelas_mahasiswa/Data_kelasM" class="text-muted small pt-2 ps-1">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
        </div>
    </section>

</main>

<?= $this->endSection(); ?>