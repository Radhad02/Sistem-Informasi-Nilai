<aside id="sidebar" class="sidebar bg-dark-light">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link " href="/admin">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        <?php endif ?>

        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/mahasiswa/Data_Mahasiswa">
                            <i class="bi bi-circle"></i><span>Data Mahasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="/mahasiswa/input">
                            <i class="bi bi-circle"></i><span>Tambah Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        <?php endif ?>


        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Dosen</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dosen/Data_Dosen">
                            <i class="bi bi-circle"></i><span>Data Dosen</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dosen/input">
                            <i class="bi bi-circle"></i><span>Tambah Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->
        <?php endif ?>


        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Mata Kuliah</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/matkul/Data_Matkul">
                            <i class="bi bi-circle"></i><span>Data Mata Kuliah</span>
                        </a>
                    </li>
                    <li>
                        <a href="/matkul/input">
                            <i class="bi bi-circle"></i><span>Tambah Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
        <?php endif ?>


        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#kelas-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Kelas</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="kelas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/kelas/Data_Kelas">
                            <i class="bi bi-circle"></i><span>Data Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kelas/input">
                            <i class="bi bi-circle"></i><span>Tambah Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
        <?php endif ?>


        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item" id="kelas mahasiswa">
                <a class="nav-link" href="/kelas_mahasiswa/Data_KelasM">
                    <i class="bi bi-bar-chart"></i><span>Data Kelas Mahasiswa</span>
                </a>
            </li><!-- End Tables Nav -->
        <?php endif ?>


        <?php if (aduh('212395_Level') == 'dosen') : ?>
            <li class="nav-item" id="nilai">
                <a class="nav-link " href="/nilai/Data_Nilai">
                    <i class="bi bi-bar-chart"></i><span>Data Nilai</span>
                </a>
            </li>
        <?php endif ?>


        <?php if (aduh('212395_Level') == 'dosen') : ?>
            <li class="nav-item" id="nilai">
                <a class="nav-link " href="/nilai/coba">
                    <i class="bi bi-bar-chart"></i><span>Nilai Mahasiswa</span>
                </a>
            </li>
        <?php endif ?>

        <?php if (aduh('212395_Level') == 'mahasiswa') : ?>
            <li class="nav-item" id="nilai">
                <a class="nav-link " href="/nilai/nilaiMahasiswa">
                    <i class="bi bi-bar-chart"></i><span>Nilai Mahasiswa</span>
                </a>
            </li>
        <?php endif ?>

        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/Data_Admin">
                            <i class="bi bi-circle"></i><span>Data Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/input">
                            <i class="bi bi-circle"></i><span>Tambah Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
        <?php endif ?>

        <?php if (aduh('212395_Level') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link" href="/user/Data_User">
                    <i class="ri-user-3-fill"></i><span>Data User</span>
                </a>
            </li><!-- End Tables Nav -->
        <?php endif ?>
    </ul>
</aside>