<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

        }

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 0.1px solid black;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: black;
        }
    </style>

    <script>
        $(document).ready(function() {
            var totalNilai = 0;
            var totalSKS = 0;
            $('#table tbody tr').each(function() {
                var sks = parseFloat($(this).find('td:eq(3)').text().trim()); // Mendapatkan nilai dari kolom "SKS"// Mendapatkan nilai dari kolom "Keterangan"
                var keterangan = $(this).find('td:eq(4)').text().trim(); // Mendapatkan nilai dari kolom "Keterangan"

                // Setel bobot berdasarkan nilai keterangan
                var bobot = 0;
                switch (keterangan) {
                    case 'A':
                        bobot = 4;
                        break;
                    case 'A-':
                        bobot = 3.67;
                        break;
                    case 'B+':
                        bobot = 3.33;
                        break;
                    case 'B':
                        bobot = 3;
                        break;
                    case 'B-':
                        bobot = 2.67;
                        break;
                    case 'C+':
                        bobot = 2.33;
                        break;
                    case 'C':
                        bobot = 2;
                        break;
                    case 'D':
                        bobot = 1;
                        break;
                    default:
                        bobot = 0; // Untuk nilai selain A, B, C, D
                        break;
                }

                var total = sks * bobot;
                totalNilai += total;
                totalSKS += sks;
                // Masukkan bobot ke dalam kolom "Bobot"
                $(this).find('td:eq(5)').text(bobot); // Mengisi kolom "Bobot" di baris saat ini
                $(this).find('td:eq(6)').text(total); // Mengisi kolom "Bobot" di baris saat ini
            });
            var ipk = (totalNilai / totalSKS);

            $("h4:contains('Index Prestasi Kumulatif')").append(ipk);
            $("h4:contains('SKS Terprogram')").append(totalSKS);
            $('#table tfoot tr td:eq(3)').text(totalNilai);
        });

        function cetakHalaman() {
            setTimeout(function() {
                var konfirmasi = window.confirm("Apakah Anda ingin mengonversi halaman ke PDF?");
                if (konfirmasi) {
                    konversiKePDF(); // Panggil fungsi konversi ke PDF jika konfirmasi diterima
                } else {
                    console.log("Konversi ke PDF dibatalkan");
                }
            }, 2000);
        }

        function konversiKePDF() {
            var element = document.body; // Ubah elemen ini sesuai dengan yang ingin kamu konversi ke PDF
            html2pdf(element, {
                margin: 10,
                filename: 'dokumen.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 1
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            });
        }

        window.onload = function() {
            cetakHalaman();
        };
    </script>
</head>
<?php dd($ipk) ?>

<body onload="cetakHalaman()">
    <!-- <table border="0" width="100%">
        <tbody>
            <tr>
                <td width="90"><img src="images/logo.png" width="70"></td>
                <td align="left">

                    <font size="4">YAYASAN DIPANEGARA</font><br>
                    <font size="5">UNIVERSITAS DIPA MAKASSAR</font><br>
                    <font size="2">JL. PERINTIS KEMERDEKAAN KM.9 MAKASSAR TELP. 0411-587194 HOTLINE 0812-2822-1994</font>
                </td>
            </tr>
        </tbody>
    </table> -->

    <!-- <hr class="opacity-75"> -->

    <div class="card-body">
        <h2 style="text-align: center; color: #012970; padding-top: 15px">Daftar Nilai</h2>
        <hr class="opacity-75">
        <table style="margin-bottom: 10px;" id="nama">
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= session('nama') ?></td>
                    <td><?= $ipk ?></td>
                </tr>
                <tr>
                    <td style=" width: 15%;">Nim</td>
                    <td>: </td>
                    <td style="width: 85%;"><?= array_values($mahasiswa)[0]['212395_Nim'] ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><?= array_values($mahasiswa)[0]['212395_Jurusan'] ?></td>
                </tr>
            </tbody>
        </table>
        <div id="table">

            <!-- Default Table -->
            <table style="text-align: center;" id="table" width="100%">
                <thead>
                    <tr>
                        <th style="text-align:center" scope="col">No</th>
                        <th style="text-align:center" scope="col">Kode</th>
                        <th style="text-align:center" scope="col">Mata Kuliah</th>
                        <th style="text-align:center" scope="col">SKS</th>
                        <th style="text-align:center" scope="col">Keterangan</th>
                        <th style="text-align:center" scope="col">Bobot</th>
                        <th style="text-align:center" scope="col">Bobot*sks</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php
                    $totalSKS = 0; // Inisialisasi variabel total SKS
                    foreach ($mahasiswa as $ds) :
                        $totalSKS += $ds['212395_SKS']; ?>
                        <tr scope="row" id="1">
                            <td><?= $i++; ?></td>
                            <td><?= $ds['212395_Kode']; ?></td>
                            <td style="text-align: left;"><?= $ds['212395_Nama_Matkul']; ?></td>
                            <td><?= $ds['212395_SKS']; ?></td>
                            <td><?= $ds['212395_Keterangan']; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><?= $totalSKS; ?></td>
                        <td colspan="2"></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <h4 style="margin-block-end: -15px;">Index Prestasi Kumulatif : </h4>
            <h4 style="margin-block-end: -15px;">Coba : <?= $ipk; ?></h4>
            <h4>SKS Terprogram : </h4>
            <!-- End Default Table Example -->
        </div>

    </div>
</body>

</html>