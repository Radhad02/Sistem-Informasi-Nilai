<aside id="sidebar" class="sidebar bg-dark-light">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

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

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Nilai</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/nilai/Data_Nilai">
                        <i class="bi bi-circle"></i><span>Data Nilai</span>
                    </a>
                </li>
                <li>
                    <a href="/matkul/input">
                        <i class="bi bi-circle"></i><span>Tambah Data</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

    </ul>
</aside>