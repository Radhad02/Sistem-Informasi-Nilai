<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Nilai Mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div style="display: flex; justify-content: flex-end;">
        <a style="padding: 3px 6px;" href="/nilai/nama_metode">
            <i style=" font-size: 25px; margin-bottom: 5px;" class="bx bxs-printer"></i>
        </a>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center; color: #012970; padding-top: 15px">Daftar Nilai</h4>
                        <hr class="opacity-75">
                        <table class="mb-3">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= session('nama') ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 12%;">Nim</td>
                                    <td>: </td>
                                    <td style="width: 88%;"><?= array_values($mahasiswa)[0]['212395_Nim'] ?></td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td><?= array_values($mahasiswa)[0]['212395_Jurusan'] ?></td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="table-responsive" id="table">
                            <!-- Default Table -->
                            <table style="text-align: center;" id="dataNilai" class="table table-striped table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th style="background-color : #4CAF50;" scope="col">No</th>
                                        <th style="background-color : #4CAF50;" scope="col">Kode</th>
                                        <th style="background-color : #4CAF50;" scope="col">Mata Kuliah</th>
                                        <th style="background-color : #4CAF50;" scope="col">SKS</th>
                                        <th style="background-color : #4CAF50;" scope="col">Keterangan</th>
                                        <th style="background-color : #4CAF50;" scope="col">Bobot</th>
                                        <th style="background-color : #4CAF50;" scope="col">Bobot*sks</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    $totalSKS = 0; // Inisialisasi variabel total SKS
                                    foreach ($mahasiswa as $ds) :
                                        $totalSKS += $ds['212395_SKS']; ?>
                                        <tr id="1">
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ds['212395_Kode']; ?></td>
                                            <td><?= $ds['212395_Nama_Matkul']; ?></td>
                                            <td><?= $ds['212395_SKS']; ?></td>
                                            <td><?= $ds['212395_Keterangan']; ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td><?= $totalSKS; ?></td>
                                        <td colspan="2"></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <h6>Index Prestasi Kumulatif : </h6>
                            <h6>sks Terprogram : </h6>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</main>

<script>
    // $(document).ready(function() {
    //     var totalNilai = 0;
    //     var totalSKS = 0;
    //     var dataToSend = [];
    //     $('#dataNilai tbody tr').each(function() {
    //         var sks = parseFloat($(this).find('td:eq(2)').text().trim()); // Mendapatkan nilai dari kolom "SKS"// Mendapatkan nilai dari kolom "Keterangan"
    //         var keterangan = $(this).find('td:eq(3)').text().trim(); // Mendapatkan nilai dari kolom "Keterangan"

    //         // Setel bobot berdasarkan nilai keterangan
    //         var bobot = 0;
    //         switch (keterangan) {
    //             case 'A':
    //                 bobot = 4;
    //                 break;
    //             case 'A-':
    //                 bobot = 3.67;
    //                 break;
    //             case 'B+':
    //                 bobot = 3.33;
    //                 break;
    //             case 'B':
    //                 bobot = 3;
    //                 break;
    //             case 'B-':
    //                 bobot = 2.67;
    //                 break;
    //             case 'C+':
    //                 bobot = 2.33;
    //                 break;
    //             case 'C':
    //                 bobot = 2;
    //                 break;
    //             case 'D':
    //                 bobot = 1;
    //                 break;
    //             default:
    //                 bobot = 0; // Untuk nilai selain A, B, C, D
    //                 break;
    //         }

    //         var total = sks * bobot;
    //         totalNilai += total;
    //         totalSKS += sks;

    //         dataToSend.push({
    //             'sks': sks,
    //             'bobot': bobot,
    //             'total': total
    //         });
    //         // Masukkan bobot ke dalam kolom "Bobot"
    //         $(this).find('td:eq(4)').text(bobot); // Mengisi kolom "Bobot" di baris saat ini
    //         $(this).find('td:eq(5)').text(total); // Mengisi kolom "Bobot" di baris saat ini
    //     });
    //     var ipk = (totalNilai / totalSKS);

    //     $("h6:contains('Index Prestasi Kumulatif')").append(ipk);
    //     $("h6:contains('sks Terprogram')").append(totalSKS);
    //     $('#dataNilai tfoot tr td:eq(2)').text(totalNilai);

    //     console.log(ipk)
    //     $.ajax({
    //         type: 'POST',
    //         // url: 'nilai/export_pdf', // Sesuaikan URL dengan controller dan method di CodeIgniter
    //         url: 'nilai/export_pdf',
    //         data: {
    //             dataToSend: JSON.stringify(dataToSend),
    //             coba: JSON.stringify(ipk),
    //             totalSKS: JSON.stringify(totalSKS),
    //             totalNilai: JSON.stringify(totalNilai)
    //         },
    //         success: function(respo) {
    //             console.log('Data berhasil dikirim ke controller');
    //             // Lakukan sesuatu setelah data berhasil dikirim
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Gagal mengirim data ke controller: ' + error);
    //         }
    //     });
    // });

    $(document).ready(function() {

        $.ajax({
            type: 'POST',
            url: '/nilai/nama_metode', // Sesuaikan dengan controller dan method yang benar
            data: {
                nama: 'John Doe',
                umur: 30,
                pekerjaan: 'Developer',
            },
            success: function(response) {
                console.log('Data berhasil dikirim ke controller');
                // Lakukan sesuatu setelah data berhasil dikirim
            },
            error: function(xhr, status, error) {
                console.error('Gagal mengirim data ke controller: ' + error);
            }
        });
    });


    function bukaPDFdiTabBaru() {
        // Ganti 'url_to_your_controller/export_pdf' dengan URL yang sesuai pada controller Anda
        var url = 'nama_metode';

        // Membuka URL dalam tab baru
        window.open(url, '_blank');
    }
</script>

<?= $this->endSection(); ?>