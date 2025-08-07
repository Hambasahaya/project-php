<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/pupr.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
            border-radius: 15px 15px 0 0;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-control {
            border-radius: 25px;
        }

        .btn-primary,
        .btn-secondary {
            border-radius: 25px;
            background: linear-gradient(45deg, #007bff, #6610f2);
            border: none;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background: linear-gradient(45deg, #0056b3, #5200c8);
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }
    </style>
</head>

<body>

    <div id="auth">
        <?= $this->renderSection('content') ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const unitOrganisasiSelect = document.querySelector('[name="unit_organisasi"]');
            const unitKerjaSelect = document.querySelector('[name="unit_kerja"]');
            const unitKerjaOptions = {
                "Setjen": ["Biro Perencanaan Anggaran dan Kerja Sama Luar Negeri", "Biro Kepegawaian, Organisasi, dan Tata Laksana",
                    "Biro Keuangan", "Biro Umum", "Biro Hukum", "Biro Pengelolaan Barang Milik Negara", "Biro Komunikasi Publik",
                    "Pusat Analisis Pelaksanaan Kebijakan", "Pusat Data dan Teknologi Informasi", "Pusat Fasilitasi Infrastruktur Daerah"],

                "Itjen": ["Sekretariat Inspektorat Jenderal", "Inspektorat I", "Inspektorat II", "Inspektorat III", "Inspektorat IV",
                    "Inspektorat V", "Inspektorat VI"],

                "Ditjen Sumber Daya Air": ["Sekretariat Direktorat Jenderal", "Direktorat Sistem dan Strategi Pengelolaan Sumber Daya Air",
                    "Direktorat Sungai dan Pantai", "Direktorat Irigasi dan Rawa", "Direktorat Bendungan dan Danau", "Direktorat Air Tanah dan Air Baku",
                    "Direktorat Bina Operasi dan Pemeliharaan", "Direktorat Bina Teknik Sumber Daya Air", "Direktorat Kepatuhan Intern", "Pusat Pengendalian Lumpur Sidoarjo",
                    "Balai Besar Wilayah Sungai Sumatera VIII Palembang", "Balai Besar Wilayah Sungai Mesuji Sekampung", "Balai Besar Wilayah Sungai Cidanau, Ciujung, Cidurian",
                    "Balai Besar Wilayah Sungai Ciliwung Cisadane", "Balai Besar Wilayah Sungai Citarum", "Balai Besar Wilayah Sungai Cimanuk Cisanggarung", "Balai Besar Wilayah Sungai Pemali Juana",
                    "Balai Besar Wilayah Sungai Serayu Opak", "Balai Besar Wilayah Sungai Bengawan Solo", "Balai Besar Wilayah Sungai Brantas", "Balai Besar Wilayah Sungai Pompengan Jeneberang",
                    "Balai Besar Wilayah Sungai Citanduy", "Balai Wilayah Sungai Sumatra I Banda Aceh", "Balai Wilayah Sungai Sumatra II Medan", "Balai Wilayah Sungai Sumatra III Pekanbaru",
                    "Balai Wilayah Sungai Sumatra IV Batam", "Balai Wilayah Sungai Bangka Belitung", "Balai Wilayah Sungai Sumatra V Padang", "Balai Wilayah Sungai Sumatra VI Jambi",
                    "Balai Wilayah Sungai Sumatra VII Bengkulu", "Balai Wilayah Sungai Bali Penida", "Balai Wilayah Sungai Nusa Tenggara I Mataram", "Balai Wilayah Sungai Nusa Tenggara II Kupang",
                    "Balai Wilayah Sungai Kalimantan I Pontianak", "Balai Wilayah Sungai Kalimantan II Palangkaraya", "Balai Wilayah Sungai Kalimantan III Banjarmasin",
                    "Balai Wilayah Sungai Kalimantan IV Samarinda", "Balai Wilayah Sungai Kalimantan V Tanjung Selor", "Balai Wilayah Sungai Sulawesi I Manado", "Balai Wilayah Sungai Sulawesi II Gorontalo",
                    "Balai Wilayah Sungai Sulawesi III Palu", "Balai Wilayah Sungai Sulawesi IV Kendari", "Balai Wilayah Sungai Maluku", "Balai Wilayah Sungai Maluku Utara", "Balai Wilayah Sungai Papua",
                    "Balai Wilayah Sungai Papua Barat", "Balai Wilayah Sungai Papua Marauke", "Balai Teknik Bendungan", "Balai Teknik Pantai", "Balai Teknik Sungai", "Balai Teknik Rawa", "Balai Teknik Irigasi",
                    "Balai Teknik Sabo", "Balai Teknik Hidrolika dan Geoteknik Keairan", "Balai Air Tanah", "Balai Hidrologi Dan Lingkungan Keairan"],

                "Ditjen Bina Marga": ["Sekretariat Direktorat Jenderal", "Direktorat Sistem dan Strategi Pengelenggaraan Jalan dan Jembatan",
                    "Subdirektorat Keterpaduan Sistem Jaringan Jalan dan Jembatan", "Direktorat Pembangunan Jalan", "Direktorat Pembangunan Jembatan", "Direktorat Preservasi Jalan dan Jembatan Wilayah I",
                    "Direktorat Preservasi Jalan dan Jembatan Wilayah II", "Direktorat Jalan Bebas Hambatan", "Direktorat Bina Teknik Jalan dan Jembatan", "Direktorat Kepatuhan Intern",
                    "Balai Besar Pelaksanaan Jalan Nasional Sumatera Utara", "Balai Besar Pelaksanaan Jalan Nasional Sumatera Selatan", "Balai Besar Pelaksanaan Jalan Nasional DKI Jakarta - Jawa Barat",
                    "Balai Besar Pelaksanaan Jalan Nasional Jawa Tengah - DI Yogyakarta", "Balai Besar Pelaksanaan Jalan Nasional Jawa Timur - Bali", "Balai Besar Pelaksanaan Jalan Nasional Sulawesi Selatan", "Balai Besar Pelaksanaan Jalan Nasional Kalimantan Timur",
                    "Balai Pelaksanaan Jalan Nasional Aceh", "Balai Pelaksanaan Jalan Nasional Riau", "Balai Pelaksanaan Jalan Nasional Kepulauan Riau", "Balai Pelaksanaan Jalan Nasional Sumatera Barat",
                    "Balai Pelaksanaan Jalan Nasional Jambi", "Balai Pelaksanaan Jalan Nasional Bengkulu", "Balai Pelaksanaan Jalan Nasional Bangka Belitung", "Balai Pelaksanaan Jalan Nasional Lampung",
                    "Balai Pelaksanaan Jalan Nasional Banten", "Balai Pelaksanaan Jalan Nasional Nusa Tenggara Barat", "Balai Pelaksanaan Jalan Nasional Nusa Tenggara Timur", "Balai Pelaksanaan Jalan Nasional Kalimantan Barat",
                    "Balai Pelaksanaan Jalan Nasional Kalimantan Selatan", "Balai Pelaksanaan Jalan Nasional Kalimantan Utara", "Balai Pelaksanaan Jalan Nasional Kalimantan Tengah", "Balai Pelaksanaan Jalan Nasional Sulawesi Utara",
                    "Balai Pelaksanaan Jalan Nasional Gorontalo", "Balai Pelaksanaan Jalan Nasional Sulawesi Tengah", "Balai Pelaksanaan Jalan Nasional Sulawesi Tenggara",
                    "Balai Pelaksanaan Jalan Nasional Sulawesi Barat", "Balai Pelaksanaan Jalan Nasional Maluku", "Balai Pelaksanaan Jalan Nasional Maluku Utara", "Balai Pelaksanaan Jalan Nasional Jayapura",
                    "Balai Pelaksanaan Jalan Nasional Merauke", "Balai Pelaksanaan Jalan Nasional Papua Barat", "Balai Pelaksanaan Jalan Nasional Wamena", "Balai Bahan Jalan", "Balai Jembatan",
                    "Balai Geoteknik dan Terowongan, dan Struktur", "Balai Perkerasan dan Lingkungan Jalan"],

                "Ditjen Cipta Karya": ["Sekretariat Direktorat Jenderal", "Direktorat Sistem dan Strategi Pengelenggaraan Infrastruktur Permukiman",
                    "Direktorat Bina Penataan Bangunan", "Direktorat Air Minum", "Direktorat Pembangunan Jembatan", "Direktorat Pengembangan Kawasan Permukiman", "Direktorat Sanitasi", "Direktorat Prasarana Strategis",
                    "Direktorat Bina Teknik Permukiman dan Perumahan", "Direktorat Kepatuhan Intern", "Balai Prasarana Permukiman Wilayah Aceh", "Balai Prasarana Permukiman Wilayah Sumatera Utara", "Balai Prasarana Permukiman Wilayah Riau",
                    "Balai Prasarana Permukiman Wilayah Kepulauan Riau", "Balai Prasarana Permukiman Wilayah Sumatera Barat", "Balai Prasarana Permukiman Wilayah Sumatera Selatan", "Balai Prasarana Permukiman Wilayah Lampung",
                    "Balai Prasarana Permukiman Wilayah Banten", "Balai Prasarana Permukiman Wilayah Jakarta Metropolitan", "Balai Prasarana Permukiman Wilayah Jawa Barat", "Balai Prasarana Permukiman Wilayah Jawa Tengah",
                    "Balai Prasarana Permukiman Wilayah D.I. Yogyakarta", "Balai Prasarana Permukiman Wilayah Jawa Timur", "Balai Prasarana Permukiman Wilayah Bali", "Balai Prasarana Permukiman Wilayah Nusa Tenggara Barat",
                    "Balai Prasarana Permukiman Wilayah Nusa Tenggara Timur", "Balai Prasarana Permukiman Wilayah Kalimantan Barat", "Balai Prasarana Permukiman Wilayah Kalimantan Selatan", "Balai Prasarana Permukiman Wilayah Kalimantan Tengah",
                    "Balai Prasarana Permukiman Wilayah Kalimantan Timur", "Balai Prasarana Permukiman Wilayah Kalimantan Utara", "Balai Prasarana Permukiman Wilayah Sulawesi Utara", "Balai Prasarana Permukiman Wilayah Sulawesi Tenggara",
                    "Balai Prasarana Permukiman Wilayah Sulawesi Tengah", "Balai Prasarana Permukiman Wilayah Sulawesi Selatan", "Balai Prasarana Permukiman Wilayah Papua", "Balai Prasarana Permukiman Wilayah Papua Barat",
                    "Balai Prasarana Permukiman Wilayah Bengkulu", "Balai Prasarana Permukiman Wilayah Bangka Belitung", "Balai Prasarana Permukiman Wilayah Jambi", "Balai Prasarana Permukiman Wilayah Gorontalo",
                    "Balai Prasarana Permukiman Wilayah Sulawesi Barat", "Balai Prasarana Permukiman Wilayah Maluku", "Balai Prasarana Permukiman Wilayah Maluku Utara", "Balai Teknologi Air Minum", "Balai Teknologi Sanitasi", "Balai Sains Bangunan",
                    "Balai Bahan dan Struktur Bangunan Gedung", "Balai Kawasan Permukiman dan Perumahan"],

                "Ditjen Perumahan": ["Sekretariat Direktorat Jenderal", "Direktorat Sistem dan Strategi Pengelenggaraan Perumahan", "Direktorat Rumah Umum dan Komersial",
                    "Direktorat Rumah Swadaya", "Direktorat Rumah Susun", "Direktorat Rumah Khusus", "Direktorat Kepatuhan Intern", "Balai Pelaksana Penyediaan Perumahan Sumatera II", "Balai Pelaksana Penyediaan Perumahan Sumatera III",
                    "Balai Pelaksana Penyediaan Perumahan Sumatera IV", "Balai Pelaksana Penyediaan Perumahan Sumatera V", "Balai Pelaksana Penyediaan Perumahan Jawa I", "Balai Pelaksana Penyediaan Perumahan Jawa II", "Balai Pelaksana Penyediaan Perumahan Jawa III",
                    "Balai Pelaksana Penyediaan Perumahan Jawa IV", "Balai Pelaksana Penyediaan Perumahan Kalimantan I", "Balai Pelaksana Penyediaan Perumahan Kalimantan II", "Balai Pelaksana Penyediaan Perumahan Sulawesi I",
                    "Balai Pelaksana Penyediaan Perumahan Sulawesi I", "Balai Pelaksana Penyediaan Perumahan Sulawesi II", "Balai Pelaksana Penyediaan Perumahan Sulawesi III", "Balai Pelaksana Penyediaan Perumahan Maluku", "Balai Pelaksana Penyediaan Perumahan Papua I",
                    "Balai Pelaksana Penyediaan Perumahan Sumatera I", "Balai Pelaksana Penyediaan Perumahan Nusa Tenggara I", "Balai Pelaksana Penyediaan Perumahan Nusa Tenggara II", "Balai Pelaksana Penyediaan Perumahan Papua II"],

                "Ditjen Bina Konstruksi": ["Sekretariat Direktorat Jenderal", "Direktorat Pengembangan Jasa Konstruksi", "Direktorat Kelembagaan dan Sumber Daya Konstruksi", "Direktorat Kompentensi dan Produktivitas Konstruksi", "Direktorat Pengadaan Jasa Konstruksi",
                    "Direktorat Keberlanjutan Konstruksi", "Balai Jasa Konstruksi Wilayah I Aceh", "Balai Jasa Konstruksi Wilayah II Palembang", "Balai Jasa Konstruksi Wilayah III Jakarta", "Balai Jasa Konstruksi Wilayah IV Surabaya", "Balai Jasa Konstruksi Wilayah V Banjarmasin",
                    "Balai Jasa Konstruksi Wilayah VI Makassar", "Balai Jasa Konstruksi Wilayah VII Jayapura", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Aceh", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sumatera Utara", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sumatera Barat",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sumatera Selatan", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Jambi", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Lampung", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Banten",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah DKI Jakarta", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Jawa Barat", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah D.I. Yogyakarta", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Jawa Tengah",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Jawa Timur", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Bali", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Nusa Tenggara Timur", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Nusa Tenggara Barat",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kalimantan Barat", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kalimantan Selatan", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kalimantan Tengah", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kalimantan Timur",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kalimantan Utara", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sulawesi Utara", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sulawesi Tenggara", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sulawesi Tengah",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sulawesi Selatan", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Papua", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Papua Barat", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Riau",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kepulauan Papua", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Bengkulu", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Bangka Belitung", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Gorontalo",
                    "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sulawesi Barat", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Sulawesi Barat", "Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Maluku Utara"],

                "Ditjen Pembiayaan Infrastruktur Pekerjaan Umum dan Perumahan": ["Sekretariat Direktorat Jenderal", "Direktorat Pengembangan Sistem dan Strategi Penyelenggaraan Pembiayaan", "Direktorat Pelaksanaan Pembiayaan Infrastruktur Sumber Daya Air", "Direktorat Pelaksanaan Pembiayaan Infrastruktur Jalan dan Jembatan",
                    "Direktorat Pelaksanaan Pembiayaan Infrastruktur Permukiman", "Direktorat Pelaksanaan Pembiayaan Perumahan"],

                "BPIW": ["Sekretariat Badan", "Pusat Pengembangan Infrastruktur Wilayah Nasional", "Pusat Pengembangan Infrastruktur Pekerjaan Umum dan Perumahan Rakyat Wilayah I", "Pusat Pengembangan Infrastruktur Pekerjaan Umum dan Perumahan Rakyat Wilayah II",
                    "Pusat Pengembangan Infrastruktur Pekerjaan Umum dan Perumahan Rakyat Wilayah III"],

                "BPSDM": ["Sekretariat Badan", "Pusat Pengembangan Talenta", "Pusat Pengembangan Kompetensi Sumber Daya Air dan Permukaan", "Pusat Pengembangan Kompetensi Jalan, Perumahan, dan Pengembangan Infrastruktur Wilayah",
                    "Pusat Pengembangan Kompetensi Manajemen", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah I Medan", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah II Palembang", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah III Jakarta",
                    "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah IV Bandung", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah V Yogyakarta", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VI Surabaya",
                    "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VII Banjarmasin", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VIII Makassar", "Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah IX Jayapura", "Balai Penilaian Kompetensi"],

                "BPJT": ["Sekretariat BPJT", "Bagian Hukum", "Bidang Teknik", "Bagian Investasi", "Bidang Operasi dan Pemeliharaan", "Bidang Pendanaan", "Kelompok Jabatan Fungsional"]
            };

            function updateUnitKerjaOptions() {
                const selectedOrganisasi = unitOrganisasiSelect.value;
                unitKerjaSelect.innerHTML = "";
                unitKerjaOptions[selectedOrganisasi].forEach(function (option) {
                    const optionElement = document.createElement("option");
                    optionElement.value = option;
                    optionElement.textContent = option;
                    unitKerjaSelect.appendChild(optionElement);
                });
            }

            unitOrganisasiSelect.addEventListener("change", updateUnitKerjaOptions);

            updateUnitKerjaOptions();
        });

    </script>

</body>

</html>