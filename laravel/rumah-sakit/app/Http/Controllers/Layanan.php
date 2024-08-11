<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Layanan extends Controller
{
    public function index(Request $request, $id)
    {
        $content = [
            1 => [
                "slug" => [
                    "Apa Itu Dokter Anastesi"
                ],
                "kontent_slug" => [
                    "Dokter anestesi adalah dokter spesialis yang bertanggung jawab dalam proses pembiusan sebelum pasien menjalani operasi atau prosedur medis lainnya. Dokter spesialis ini juga memiliki keahlian
             dalam manajemen penanganan nyeri dan perawatan pasien."
                ],
                "headline" => [
                    "Peran Dokter Anestasi"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
            anestesi memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "konten1_headline" => [
                    "Manajemen praoperasi, selama operasi, dan pascaoperasi"
                ],
                "kontent_1" => [
                    "Dokter anestesi berperan penting dalam membantu dokter bedah dan bekerja sama dengan perawat dalam persiapan sebelum operasi, memonitor kondisi pasien, memberikan anestesi, dan melakukan observasi pascaoperasi. Mereka memastikan tanda vital seperti pernapasan, detak jantung, tekanan darah, suhu tubuh, jumlah cairan, dan kadar oksigen dalam darah tetap stabil. Setelah operasi, dokter anestesi menghentikan pemberian obat anestesi dan memantau kondisi pasien hingga efeknya hilang, memastikan pasien 
            tetap nyaman dan tidak merasakan sakit selama proses tersebut."
                ],
                "kontent2_headline" => [
                    "Perawatan intensif dan kritis"
                ],
                "kontent_2" => [
                    "Selain dalam prosedur operasi, dokter anestesi juga bertanggung jawab merawat pasien kritis di ICU, termasuk memonitor kondisi, menentukan pemberian cairan dan obat, serta melakukan intubasi jika diperlukan. Mereka berkolaborasi dengan perawat dan dokter spesialis lain seperti dokter penyakit dalam, bedah, anak, dan saraf 
            untuk memastikan perawatan optimal sesuai diagnosis pasien."
                ],
                "kontent3_headline" => [
                    "Kompentensi dan Tindakan yang Dilakukan Dokter Anestesi"
                ],
                "kontent_3" => [
                    "Seorang dokter anestesi memiliki berbagai kompetensi dan tindakan, termasuk penilaian kondisi praoperasi, pemantauan fungsi vital, interpretasi hasil pemeriksaan medis, pengaturan posisi aman selama operasi, dan penentuan jenis anestesi. Mereka juga ahli dalam anestesi untuk berbagai jenis bedah, penanganan emergensi seperti pemasangan kateter dan trakeostomi, pengelolaan trauma dan kondisi darurat, serta resusitasi jantung paru. Selain itu, mereka mengelola jal
            an napas dengan berbagai teknik intubasi, menentukan bantuan pernapasan, merawat pasien kritis di ICU, dan menangani nyeri akut maupun kronis."
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Anestesi"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dokter anestesi, siapkan informasi tentang riwayat kesehatan, obat atau suplemen yang dikonsumsi, riwayat alergi, dan riwayat operasi atau anestesi sebelumnya. Informasi ini membantu dokter menentukan jenis dan dosis anestesi yang tepat. Saat konsultasi, tanyakan jenis anestesi yang akan diterima, durasi efeknya, dan apakah perlu menghentikan konsumsi makanan atau minuman tertentu. Temui dokter anestesi sebelum operasi untuk memahami jenis anestesi yang akan diberikan dan efek sampingnya, sehingga Anda lebih siap dan tenang menjalani operasi.
            "
                ]

            ],
            2 => [
                "slug" => [
                    "Apa Itu Dokter Anak"
                ],
                "kontent_slug" => [
                    "Dokter anak adalah dokter yang berfokus pada kesehatan anak-anak dari usia 0-18 tahun. Dokter anak dapat melakukan pemeriksaan dan perawatan, serta memberikan tindakan pencegahan penyakit
             pada anak yang sehat. Selain itu, dokter anak juga dapat mendiagnosis dan mengobati berbagai macam penyakit anak, mulai dari masalah kesehatan ringan hingga penyakit serius.
            "
                ],
                "headline" => [
                    "Peran Dokter Anak"
                ],
                "konten1_headline" => [
                    "Secara garis besar, dokter spesialis 
            anak memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent_headline" => [
                    "Merawat Kesehatan Fisik"
                ],
                "kontent_1" => [
                    "Salah satu tugas dokter anak yang utama adalah merawat kesehatan fisik pasiennya. Dalam hal ini, dokter anak bertanggungjawab untuk mendiagnosis, merawat, dan mengelola berbagai kondisi medis yang dialami anak-anak.
            "
                ],
                "kontent2_headline" => [
                    "Melakukan Program Pencegahan"
                ],
                "kontent_2" => [
                    "Dalam hal ini, dokter berperan penting dalam memberikan vaksinasi untuk anak sesuai jadwal. Jadi, anak-anak bisa tumbuh secara sehat dan terhindar dari risiko penyakit. 
            Tindak pencegahan juga dapat dilakukan melalui skrining kesehatan rutin untuk mendeteksi kemungkinan masalah kesehatan atau tumbuh kembang yang tidak normal. 
            Dengan begitu, dokter anak bisa mengidentifikasi berbagai faktor risiko atau kondisi medis yang memerlukan intervensi lanjutan."
                ],
                "kontent3_headline" => [
                    "Menjaga Kesehatan Mental"
                ],
                "kontent_3" => [
                    "Seorang dokter anak dapat mendeteksi tanda-tanda dan mendiagnosis gangguan mental, seperti kecemasan, depresi, gangguan perilaku, atau gangguan neurodevelopmental seperti ADHD atau autisme.
             Melalui observasi yang dilakukan dengan cara mengamati perilaku dan interaksi anak, serta bertanya kepada anak dan orang tua tentang perasaan dan pikiran anak."
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Anak"
                ],
                "kontent_4" => [
                    "Sebelum membawa anak ke dokter spesialis anak, Anda dianjurkan untuk mencatat setiap keluhan atau gangguan yang dialami anak. Hal tersebut cukup berguna bagi dokter dalam mendiagnosis penyakit apa yang dialami buah hati Anda.
            Bagi anak yang memiliki masalah tumbuh kembang, bawalah hasil pemeriksaan sebelumnya jika ada, seperti status tumbuh kembang, status imunisasi, atau pemeriksaan pendukung lainnya.
            "
                ]

            ],
            3 => [
                "slug" => [
                    "Apa Itu Dokter Bedah"
                ],
                "kontent_slug" => [
                    "Dokter bedah adalah dokter spesialis yang mengkhususkan diri dalam mengevaluasi dan mengobati kondisi yang mungkin memerlukan pembedahan, atau mengubah tubuh manusia secara fisik.
                "
                ],
                "headline" => [
                    "Peran Dokter Bedah"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                Bedah memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "konten1_headline" => [
                    "Diagnostik dan Evaluasi"
                ],
                "kontent_1" => [
                    "Menilai kondisi pasien melalui konsultasi, pemeriksaan fisik, dan interpretasi hasil tes medis seperti pencitraan (X-ray, MRI, CT scan) dan tes laboratorium. Menentukan apakah pembedahan diperlukan atau jika kondisi dapat diatasi dengan pengobatan lain.
                "
                ],
                "kontent2_headline" => [
                    "Pelaksanaan Operasi"
                ],
                "kontent_2" => [
                    "Mencakup persiapan pra-operasi, melakukan pembedahan dengan teknik yang tepat, dan menggunakan alat bedah yang diperlukan. Dokter bedah harus memiliki keterampilan dan ketelitian tinggi untuk mengatasi masalah medis pasien dengan aman dan efektif. Selama operasi, mereka juga bekerja sama dengan tim medis lainnya, termasuk perawat bedah dan ahli anestesi, untuk memastikan bahwa setiap prosedur berjalan lancar dan sesuai rencana.
                "
                ],
                "kontent3_headline" => [
                    "Perawatan Pasca-Bedah"
                ],
                "kontent_3" => [
                    "Setelah operasi, dokter bedah terus memantau pemulihan pasien. Mereka memberikan perawatan lanjutan dan instruksi mengenai pemulihan dan rehabilitasi. Dokter bedah juga mengelola komplikasi yang mungkin timbul setelah operasi dan melakukan tindakan yang diperlukan untuk mengatasinya.
                "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Bedah"
                ],
                "kontent_4" => [
                    "Agar dokter bedah dapat memutuskan perlu tidaknya dilakukan operasi atau tindakan lainnya, pasien akan diminta menjalani serangkaian pemeriksaan medis, terutama jika memiliki kondisi
                seperti kebiasaan merokok berat atau konsumsi minuman alkohol, tekanan darah tinggi dan penyakit lainnya. ika ingin menggunakan BPJS atau memiliki asuransi lainnya, pastikan rumah sakit tempat Anda menjalani tindakan pembedahan telah bekerja sama dengan asuransi yang Anda miliki. Jangan lupa 
                untuk mempersiapkan berkas yang diperlukan untuk mempermudah proses administrasi.
                "
                ]

            ],

            4 => [
                "slug" => [
                    "Apa Itu Dokter Endokrinologi"
                ],
                "kontent_slug" => [
                    "Dokter endokrinologi adalah dokter spesialis medis yang merawat orang dengan kondisi yang disebabkan oleh masalah pada kelenjar endokrin dan hormon, seperti diabetes, menopause, dan masalah tiroid.
                    "
                ],
                "headline" => [
                    "Peran Dokter Endokrinologi"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                    Endokrinologi memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Gangguan Hormon"
                ],
                "kontent_1" => [
                    "Mendiagnosis gangguan yang terkait dengan sistem endokrin, yang mencakup berbagai kelenjar penghasil hormon. Mereka menggunakan berbagai tes diagnostik, seperti tes darah untuk mengukur kadar hormon, tes pencitraan untuk memeriksa kelenjar, dan evaluasi klinis untuk menentukan kondisi pasien.
                    Contoh gangguan yang sering ditangani diabetes, hipotiroidisme, gangguan adrenal dan masalah pertumbuhan"
                ],
                "kontent2_headline" => [
                    "Manajemen dan Pengobatan Penyakit Endokrin"
                ],
                "kontent_2" => [
                    "Setelah mendiagnosis gangguan hormonal, dokter endokrinologi merancang dan mengimplementasikan rencana pengobatan yang tepat untuk setiap pasien. Pengobatan ini bisa melibatkan terapi hormon, obat-obatan, perubahan gaya hidup, atau kombinasi dari semua itu.
                    Dokter endokrin juga mengelola kondisi jangka panjang dan memantau efektivitas pengobatan secara berkala."
                ],
                "kontent3_headline" => [
                    "Penyuluhan dan Pendidikan Pasien"
                ],
                "kontent_3" => [
                    "memberikan informasi kepada pasien tentang kondisi mereka, termasuk bagaimana cara mengelola gejala dan mencegah komplikasi.
                    "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Endokrinologi"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter anak ahli endokrinologi, sebaiknya Anda mempersiapkan beberapa hal untuk memudahkan dokter menentukan penanganan yang tepat
                    seperti riwayat keluhan dan gejala yang dialami secara detail, bila perlu dalam bentuk catatan
                    daftar riwayat kesehatan anak dan orang tua, daftar obat atau suplemen yang dikonsumsi anak, daftar makanan dan minuman yang dikonsumsi anak setiap hari, catatan perubahan tinggi dan berat badan anak
                    dan kondisi medis yang tidak biasa dialami anak
                    "
                ]

            ],

            5 => [
                "slug" => [
                    "Apa Itu Dokter Geriatri"
                ],
                "kontent_slug" => [
                    " dokter perawatan primer yang memiliki pelatihan khusus dalam merawat pasien lanjut usia. Mereka mengkhususkan diri dalam merawat orang dewasa yang lebih tua, terutama mereka yang berusia di atas 65 tahun dengan kebutuhan medis yang kompleks.
                        "
                ],
                "headline" => [
                    "Peran Dokter Geriatri"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                        Geriatri memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Manajemen Penyakit Kronis"
                ],
                "kontent_1" => [
                    "Dokter geriatri ahli dalam mendiagnosis dan mengelola penyakit kronis yang sering terjadi pada lansia, seperti diabetes, hipertensi, penyakit jantung, artritis, dan osteoporosis. Mereka bekerja untuk mengontrol gejala, memperlambat perkembangan penyakit, dan mengurangi komplikasi melalui pengobatan yang tepat, perubahan gaya hidup, dan terapi rehabilitasi.
                        "
                ],
                "kontent2_headline" => [
                    "Penilaian dan Pengelolaan Sindrom Geriatri"
                ],
                "kontent_2" => [
                    "Sindrom geriatri adalah kumpulan kondisi yang umum terjadi pada lansia dan memerlukan pendekatan khusus, seperti delirium, kelemahan (frailty), jatuh, inkontinensia, dan gangguan mobilitas. Dokter geriatri melakukan penilaian menyeluruh untuk mengidentifikasi faktor-faktor risiko dan merancang intervensi yang bertujuan untuk meningkatkan kualitas hidup dan fungsi sehari-hari pasien.
                        "
                ],
                "kontent3_headline" => [
                    "Penyuluhan dan Koordinasi Perawatan"
                ],
                "kontent_3" => [
                    "Memainkan peran penting dalam memberikan edukasi kepada pasien dan keluarga mereka mengenai manajemen penyakit kronis dan penuaan sehat. Juga berperan sebagai koordinator perawatan, menghubungkan pasien dengan layanan kesehatan lain seperti perawatan di rumah, layanan sosial, dan program rehabilitasi.
                        "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Geriatri"
                ],
                "kontent_4" => [
                    "Sebelum berkunjung ke dokter geriatri, persiapkan surat rujukan dari dokter yang menangani Anda agar dokter geriatri dapat menentukan perawatan atau pengobatan yang tepat.
                        Jangan lupa untuk mempersiapkan catatan terkait riwayat kesehatan, termasuk penyakit yang pernah atau sedang diderita, obat atau suplemen yang sedang dikonsumsi, serta terapi atau pengobatan lain yang sedang dijalani.
                        "
                ]

            ],

            6 => [
                "slug" => [
                    "Apa Itu Dokter Gigi"
                ],
                "kontent_slug" => [
                    "Dokter yang khusus mempelajari ilmu kesehatan dan penyakit pada gigi dan mulut. Seorang dokter gigi memiliki kompetensi atau keahlian dalam mendiagnosis, mengobati, dan memberikan edukasi tentang pencegahan berbagai masalah kesehatan gigi, gusi, dan mulut.
                            "
                ],
                "headline" => [
                    "Peran Dokter Gigi"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                            Gigi memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Perawatan Penyakit Mulut dan Gigi"
                ],
                "kontent_1" => [
                    " Dokter gigi bertanggung jawab untuk mendiagnosis dan merawat berbagai penyakit dan kondisi yang mempengaruhi gigi, gusi, dan mulut. Ini termasuk karies gigi (gigi berlubang), penyakit periodontal (penyakit gusi), infeksi mulut, dan lesi prakanser.
                            Perawatan dapat meliputi tambal gigi, pembersihan gigi, perawatan saluran akar, dan ekstraksi gigi jika diperlukan.
                            "
                ],
                "kontent2_headline" => [
                    "Pencegahan dan Promosi Kesehatan Gigi"
                ],
                "kontent_2" => [
                    "berperan penting dalam pencegahan penyakit gigi dan mulut melalui edukasi pasien dan promosi kesehatan gigi. Mereka memberikan saran mengenai praktik kebersihan mulut yang baik, seperti teknik menyikat dan flossing yang benar, pentingnya penggunaan pasta gigi berfluoride, dan diet sehat yang mengurangi risiko karies gigi.
                            "
                ],
                "kontent3_headline" => [
                    "Rekonstruksi dan Estetika Gigi"
                ],
                "kontent_3" => [
                    "Membantu memperbaiki fungsi dan penampilan gigi serta mulut. Ini mencakup prosedur seperti pemasangan mahkota gigi, jembatan gigi, implan gigi, veneer, dan prosedur pemutihan gigi. Peran ini penting untuk memperbaiki kerusakan akibat cedera, karies yang parah, atau keausan gigi, serta meningkatkan 
                            kepercayaan diri pasien dengan senyum yang lebih estetis.
                            "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Gigi"
                ],
                "kontent_4" => [
                    "Saat pemeriksaan, dokter gigi akan melakukan beberapa penanganan seperti menanyakan keluhan yang dirasakan, menanyakan kebiasaan makan atau kebiasaan lain, seperti merokok dan minum alkohol, menanyakan kebiasaan menjaga kebersihan gigi dan mulut, mengecek kesahatan gigi, gusi, dan mulut secara keseluruhan, melakukan tindakan sesuai keluhan, memberikan obat-obatan sesuai diagnosis dan kebutuhan pasien terkait masalah pada gigi, gusi, dan mulut. Jika terdapat kondisi yang tidak dapat ditangani oleh dokter gigi umum, 
                            rujukan mungkin diberikan agar masalah gigi dan mulut Anda bisa ditangani oleh dokter gigi spesialis.
                            "
                ]

            ],

            7 => [
                "slug" => [
                    "Apa Itu Dokter Jantung"
                ],
                "kontent_slug" => [
                    "dokter yang mengkhususkan diri dalam menangani kondisi jantung dan pembuluh darah. Mereka dapat mengobati penyakit jantung dan membantu mencegah penyakit jantung.
                                "
                ],
                "headline" => [
                    "Peran Dokter Jantung"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                jantung memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Penyakit Jantung"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis berbagai penyakit jantung dan kondisi kardiovaskular dengan menggunakan berbagai alat diagnostik seperti elektrokardiogram (EKG), echocardiogram, tes stres, angiografi koroner, dan tes darah untuk mengevaluasi fungsi jantung dan mendeteksi adanya kelainan. 
                                "
                ],
                "kontent2_headline" => [
                    "Manajemen dan Pengobatan Penyakit Kardiovaskular"
                ],
                "kontent_2" => [
                    "Merancang dan mengimplementasikan rencana perawatan yang mencakup penggunaan obat-obatan, perubahan gaya hidup, dan kadang-kadang prosedur medis atau bedah. Penyakit yang sering ditangani yaitu jantung coroner, gagal jantung dan hipertensi. Serta melakukan prosedur intervensional seperti angioplasti dan pemasangan stent untuk membuka arteri yang tersumbat.
                                "
                ],
                "kontent3_headline" => [
                    "Pencegahan dan Edukasi Kesehatan Jantung"
                ],
                "kontent_3" => [
                    "Memberikan saran tentang faktor risiko penyakit jantung seperti merokok, obesitas, tekanan darah tinggi, kolesterol tinggi, dan gaya hidup tidak aktif. Edukasi ini mencakup panduan mengenai diet sehat, aktivitas fisik, manajemen stres, dan pentingnya rutin melakukan pemeriksaan kesehatan.
                                "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Jantung"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter spesialis jantung dan pembuluh darah, ada beberapa hal yang perlu dipersiapkan untuk memudahkan dokter dalam menentukan perawatan yang tepat, seperti
                                membuat catatan terkait riwayat keluhan dan gejala yang diderita secara detail, membawa hasil
                                pemeriksaan sebelumnya, menginfokan daftar obat yang rutin anda konsumsi, dan tanyakan pilihan perawatan yang tersedia dan tingkat keberhasilan.
                                "
                ]

            ],

            8 => [
                "slug" => [
                    "Apa Itu Dokter Kulit dan Kelamin"
                ],
                "kontent_slug" => [
                    "dokter yang memiliki keahlian khusus dalam mendiagnosis dan mengobati masalah kesehatan kulit dan kelamin pada pria maupun wanita. Tugas mereka adalah melakukan diagnosis dan memberikan penanganan sesuai dengan keluhan pasien.
                                    "
                ],
                "headline" => [
                    "Peran Dokter Kulit dan Kelamin"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                    kulit dan kelamin memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Perawatan Penyakit Kulit"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan merawat berbagai penyakit dan kondisi kulit. Ini termasuk penyakit umum seperti jerawat, eksim, psoriasis, dermatitis, dan infeksi kulit (bakteri, jamur, virus). Mereka menggunakan berbagai metode diagnostik, termasuk biopsi kulit, tes alergi, dan dermatoskopi, untuk mengidentifikasi masalah kulit.
                                    "
                ],
                "kontent2_headline" => [
                    "Perawatan Penyakit Menular Seksual (PMS)"
                ],
                "kontent2" => [
                    "Melakukan tes laboratorium untuk mendeteksi infeksi dan meresepkan pengobatan yang sesuai, seperti antibiotik atau antiviral. Selain itu, mereka memberikan edukasi kepada pasien tentang pencegahan PMS, 
                                    termasuk pentingnya penggunaan kondom dan praktik seksual yang aman."
                ],
                "kontent3_headline" => [
                    "Manajemen Kondisi Kronis dan Estetika Kulit"
                ],
                "kontent3" => [
                    "mengelola kondisi kulit kronis yang memerlukan perawatan jangka panjang, seperti rosacea, vitiligo, dan lupus kulit. Mereka memberikan rencana perawatan berkelanjutan untuk mengontrol gejala dan mencegah flare-up. Dalam aspek estetika, dokter kulit melakukan prosedur untuk meningkatkan penampilan kulit, seperti pengelupasan kimia, mikrodermabrasi, filler, Botox, dan perawatan anti-penuaan lainnya.
                                    "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Kulit dan Kelamin"
                ],
                "kontent4" => [
                    "Sebelum menemui dokter spesialis kulit dan kelamin, ada beberapa hal yang perlu dipersiapkan untuk memudahkan dokter dalam menentukan penanganan yang tepat, yaitu menyiapkan catatan pertanyaan yang ingin diajukan dan Riwayat keluhan atau gejala yang dialami, membawa beberapa dokumen pemeriksaan yang sebelumnya dilakukan, dan memberitahu obat yang dikonsumsi.
                                    "
                ]

            ],

            9 => [
                "slug" => [
                    "Apa Itu Dokter Mata"
                ],
                "kontent_slug" => [
                    "dokter profesional perawatan kesehatan yang menyediakan perawatan penglihatan primer, termasuk pemeriksaan mata, tes penglihatan, dan koreksi penglihatan.
                                        "
                ],
                "headline" => [
                    "Peran Dokter Mata"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                        mata memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Pengelolaan Penyakit Mata"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan mengelola berbagai penyakit dan kondisi yang mempengaruhi mata. Ini termasuk penyakit seperti glaukoma, katarak, degenerasi makula, retinopati diabetik, dan infeksi mata. Setelah diagnosis, dokter mata merancang rencana perawatan yang dapat meliputi obat tetes mata, obat oral, terapi laser, atau pembedahan.
                                        "
                ],
                "kontent2_headline" => [
                    "Perawatan Bedah dan Prosedur Terapi Mata"
                ],
                "kontent_2" => [
                    "Melakukan berbagai prosedur bedah untuk memperbaiki atau menyembuhkan masalah mata. Ini termasuk operasi katarak, koreksi laser untuk penglihatan (LASIK), pembedahan glaukoma, dan vitrektomi. Selain bedah, dokter mata juga melakukan prosedur non-bedah seperti suntikan intraokular untuk kondisi seperti degenerasi makula dan edema makula.
                                        "
                ],
                "kontent3_headline" => [
                    "Penilaian dan Koreksi Penglihatan"
                ],
                "kontent_3" => [
                    "Bertanggung jawab untuk menilai dan memperbaiki masalah penglihatan. Mereka melakukan pemeriksaan mata lengkap untuk menentukan ketajaman visual dan meresepkan kacamata atau lensa kontak sesuai kebutuhan. 
                                        Mereka juga mengidentifikasi dan mengelola kondisi refraktif seperti miopia (rabun jauh), hiperopia (rabun dekat), astigmatisme, dan presbiopia. Mereka bekerja sama dengan optometris dan teknisi optik untuk memastikan bahwa pasien menerima koreksi visual yang tepat.
                                    "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Mata"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dokter spesialis mata, Anda dapat mempersiapkan beberapa hal untuk memudahkan dokter dalam menentukan diagnosis dan penanganan yang tepat, seperti kacamata(pengguna), data Riwayat Kesehatan atau alergi, daftar obat dan suplemen yang dikonsumsi, Riwayat keluhan dan gejala, dan informasi asuransi Kesehatan.
                                        "
                ]

            ],

            10 => [
                "slug" => [
                    "Apa Itu Dokter Saraf"
                ],
                "kontent_slug" => [
                    "dokter spesialis yang mendiagnosis dan mengobati masalah yang berkaitan dengan otak dan sistem saraf. Dokter saraf dapat menangani berbagai keluhan, seperti penyakit Parkinson, penyakit Alzheimer, kejang, demensia, cedera otak, stroke, dan epilepsi.
                                            "
                ],
                "headline" => [
                    "Peran Dokter Saraf"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                            saraf memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Gangguan Saraf"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan mengevaluasi berbagai gangguan yang mempengaruhi sistem saraf pusat dan perifer, termasuk otak, sumsum tulang belakang, dan saraf dengan menggunakan berbagai alat diagnostik seperti MRI, CT scan, elektroensefalogram (EEG), elektromiogram (EMG), dan tes darah untuk mengidentifikasi kondisi neurologis. 
                                            "
                ],
                "kontent2_headline" => [
                    "Manajemen dan Pengobatan Penyakit Neurologis"
                ],
                "kontent_2" => [
                    "Merancang dan mengimplementasikan rencana perawatan yang mencakup penggunaan obat-obatan, terapi fisik, terapi okupasi, dan dalam beberapa kasus, intervensi bedah. Memberikan pengobatan yang tepat bertujuan untuk mengendalikan gejala, memperlambat perkembangan penyakit, dan meningkatkan kualitas hidup pasien. 
                                            "
                ],
                "kontent3_headline" => [
                    "Penyuluhan dan Rehabilitasi Neurologis"
                ],
                "kontent_3" => [
                    "Berperan penting dalam memberikan edukasi kepada pasien dan keluarga mereka mengenai kondisi neurologis, pengobatan, dan strategi pengelolaan jangka panjang. Mereka bekerja sama dengan tim rehabilitasi, termasuk fisioterapis, terapis okupasi, dan logopedis, untuk membantu pasien pulih dan mencapai potensi fungsional maksimal setelah cedera atau penyakit neurologis. 
                                            "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Saraf"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dokter saraf, catat keluhan yang selama ini dirasakan, obat yang biasa dikonsumsi, penyakit atau alergi yang pernah diderita, dan riwayat penyakit dalam keluarga. Pada konsultasi pertama, dokter saraf akan melakukan pemeriksaan fisik dan saraf, serta menelusuri riwayat keluhan penyakit yang dirasakan pasien. Selanjutnya, dokter saraf akan menyarankan pemeriksaan lebih lanjut untuk menentukan diagnosa penyakit yang diderita pasien.
                                            "
                ]

            ],

            11 => [
                "slug" => [
                    "Apa Itu Dokter Kandungan"
                ],
                "kontent_slug" => [
                    "Dokter yang mengkhususkan diri dalam kesehatan reproduksi wanita, termasuk menstruasi, kehamilan, persalinan, dan menopause.
                                                "
                ],
                "headline" => [
                    "Peran Dokter Kandungan"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                kandungan memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Perawatan Kehamilan dan Persalinan"
                ],
                "kontent_1" => [
                    "Memantau kesehatan ibu dan janin selama kehamilan melalui pemeriksaan rutin, ultrasonografi, dan tes laboratorium. Mereka juga memberikan saran mengenai nutrisi, olahraga, dan perawatan prenatal. Selama persalinan, dokter kandungan bertanggung jawab untuk memantau proses persalinan, menangani komplikasi yang mungkin terjadi, dan melakukan prosedur bedah seperti operasi caesar jika diperlukan. 
                                                "
                ],
                "kontent2_headline" => [
                    "Diagnostik dan Pengobatan Penyakit Ginekologi"
                ],
                "kontent_2" => [
                    "Menangani berbagai kondisi dan penyakit yang mempengaruhi sistem reproduksi wanita, seperti endometriosis, fibroid rahim, kista ovarium, infeksi panggul, dan kanker reproduktif dengan menggunakan berbagai metode diagnostik, termasuk pemeriksaan panggul, pap smear, biopsi, dan pencitraan seperti ultrasonografi dan MRI. Pengobatan bisa meliputi obat-obatan, terapi hormon, prosedur minimal invasif, atau operasi bedah untuk mengatasi masalah yang ditemukan.
                                                "
                ],
                "kontent3_headline" => [
                    "Kesehatan Reproduksi dan Perencanaan Keluarga"
                ],
                "kontent_3" => [
                    "membantu pasien dalam memilih metode kontrasepsi yang sesuai, memberikan perawatan dan saran mengenai infertilitas, serta melakukan prosedur seperti inseminasi buatan atau fertilisasi in vitro (IVF). 
                                                "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Kandungan"
                ],
                "kontent_4" => [
                    "Sebelum berkonsultasi dengan dokter kandungan, sebaiknya Anda mencatat beragam keluhan yang Anda alami. Dokter biasanya akan menanyakan berbagai pertanyaan terkait gejala atau keluhan yang Anda alami, termasuk siklus menstruasi, kesehatan reproduksi, dan kegiatan seksual. Bila Anda sedang hamil, beri tahu dokter bila mengalami keluhan selama kehamilan sehingga dapat ditangani sedini mungkin. 
                                                "
                ]

            ],
            12 => [
                "slug" => [
                    "Apa Itu Dokter Kanker"
                ],
                "kontent_slug" => [
                    "Dokter yang memiliki keahlian khusus dalam mendiagnosis, menangani, dan mengobati penyakit yang diakibatkan oleh kanker.
                                                    "
                ],
                "headline" => [
                    "Peran Dokter Kanker"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                    kanker memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Kanker"
                ],
                "kontent_1" => [
                    "bertanggung jawab untuk mendiagnosis berbagai jenis kanker melalui berbagai metode seperti biopsi, tes darah, pencitraan (CT scan, MRI, PET scan), dan endoskopi. Mereka mengevaluasi stadium dan jenis kanker untuk menentukan sejauh mana penyakit telah berkembang.
                                                    "
                ],
                "kontent2_headline" => [
                    "Perawatan dan Manajemen Kanker"
                ],
                "kontent_2" => [
                    "Merancang dan melaksanakan rencana perawatan yang komprehensif. Dapat mencakup terapi kanker seperti kemoterapi, radioterapi, imunoterapi, dan terapi target. Serta mengelola efek samping dari pengobatan kanker dan memberikan perawatan paliatif untuk mengurangi gejala dan meningkatkan kualitas hidup pasien.
                                                    "
                ],
                "kontent3_headline" => [
                    "Penyuluhan dan Dukungan Pasien"
                ],
                "kontent_3" => [
                    "Memberikan dukungan emosional dan edukasi kepada pasien serta keluarga mereka mengenai diagnosis, pilihan perawatan, dan prognosis serta membantu pasien memahami kondisi mereka dan membuat keputusan yang tepat mengenai perawatan.
                                                    "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Kanker"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter spesialis kanker, ada beberapa hal yang perlu dipersiapkan untuk memudahkan dokter dalam menentukan perawatan yang tepat, seperti membuat catatan terkait Riwayat keluhan dan gejala yang diderita, membawa hasil pemeriksaan sebelumnya, jika sudah terdiognosis informasikan tingkat keparahan kanker yang diderita, dan bawalah anggota keluarga saat melakukan pemeriksaan.
                                                    "
                ]

            ],

            13 => [
                "slug" => [
                    "Apa Itu Dokter Tulang"
                ],
                "kontent_slug" => [
                    "Dokter yang khusus menangani masalah pada sistem muskuloskeletal, meliputi tulang, otot, sendi, saraf, ligamen, serta jaringan yang menghubungkan tulang dan tendon (sendi).
                                                        "
                ],
                "headline" => [
                    "Peran Dokter Tulang"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                        tulang memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Cedera dan Penyakit Tulang"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan mengevaluasi berbagai cedera dan penyakit yang mempengaruhi sistem muskuloskeletal, termasuk tulang, sendi, ligamen, tendon, dan otot.
                                                        "
                ],
                "kontent2_headline" => [
                    "Perawatan dan Manajemen Cedera Muskuloskeletal"
                ],
                "kontent_2" => [
                    "Merancang dan melaksanakan rencana perawatan untuk mengatasi cedera dan penyakit muskuloskeletal. Ini bisa mencakup penggunaan gips atau bidai untuk patah tulang, terapi fisik untuk rehabilitasi, injeksi kortikosteroid untuk mengurangi peradangan, dan operasi bedah untuk memperbaiki kerusakan struktur tulang atau sendi. 
                                                        "
                ],
                "kontent3_headline" => [
                    "Pencegahan dan Edukasi Kesehatan Tulang"
                ],
                "kontent_3" => [
                    "Memberikan saran mengenai cara menjaga kesehatan tulang dan sendi, termasuk pentingnya olahraga teratur, diet kaya kalsium dan vitamin D, serta teknik yang benar dalam aktivitas fisik untuk mencegah cedera. 
                                                        "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Tulang"
                ],
                "kontent_4" => [
                    "Sebelum berkonsultasi dengan dokter ortopedi, Anda disarankan mencatat keluhan yang dialami, apalagi jika Anda baru saja mengalami cedera. Selanjutnya, kumpulkan riwayat medis yang lengkap, termasuk riwayat pengobatan atau riwayat penyakit tertentu yang pernah atau sedang diderita. Jangan lupa untuk membawa hasil pemeriksaan lain, seperti foto Rontgen atau tes darah jika ada. 
                                                        "
                ]

            ],

            14 => [
                "slug" => [
                    "Apa Itu Dokter Paru-paru"
                ],
                "kontent_slug" => [
                    "Dokter yang mengkhususkan diri dalam mendiagnosis dan mengobati penyakit pada sistem pernapasan. Sistem pernapasan ini meliputi paru-paru, hidung, tenggorokan, trakea, saluran udara, otot, dan pembuluh darah.
                                                            "
                ],
                "headline" => [
                    "Peran Dokter Paru-paru"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                            paru-paru memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Penyakit Paru-Paru"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan mengevaluasi berbagai penyakit dan kondisi yang mempengaruhi sistem pernapasan, termasuk paru-paru dan saluran napas dengan menggunakan berbagai alat diagnostik seperti spirometri, bronkoskopi, CT scan, tes fungsi paru, dan rontgen dada untuk mengidentifikasi kondisi seperti asma dan penyakit paru obstruktif kronis (PPOK),
                                                            "
                ],
                "kontent2_headline" => [
                    "Perawatan dan Manajemen Penyakit Pernapasan"
                ],
                "kontent_2" => [
                    "Merancang dan melaksanakan rencana perawatan yang mencakup penggunaan obat-obatan, terapi oksigen, dan rehabilitasi paru. Mereka mengelola penyakit kronis seperti asma dan PPOK dengan memberikan obat bronkodilator, steroid inhalasi, dan terapi lainnya untuk mengontrol gejala dan mencegah eksaserbasi.
                                                            "
                ],
                "kontent3_headline" => [
                    "Pencegahan dan Edukasi Kesehatan Paru-Paru"
                ],
                "kontent_3" => [
                    "Memberikan saran mengenai berhenti merokok, yang merupakan faktor risiko utama untuk banyak penyakit paru-paru. Selain itu, mereka mengedukasi pasien tentang cara menghindari polusi udara dan iritasi lainnya, pentingnya vaksinasi (seperti vaksin flu dan pneumonia), serta teknik pernapasan yang benar untuk mengurangi risiko komplikasi. 
                                                            "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Paru-paru"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter paru, ada beberapa hal yang perlu Anda persiapkan guna mempermudah dokter paru dalam mendiagnosis dan menentukan pengobatan yang tepat, seperti menyampaikan berbagai keluhan dan gejala yang dirasakan secara detail kepada dokter paru, membawa semua hasil pemeriksaan medis yang pernah Anda jalani, memberi tahu dokter mengenai riwayat penyakit, obat-obatan yang sedang dikonsumsi, dan alergi yang dimiliki
                                                            "
                ]

            ],

            15 => [
                "slug" => [
                    "Apa Itu Dokter Patologi"
                ],
                "kontent_slug" => [
                    "Dokter yang mengkhususkan diri dalam kegiatan laboratorium untuk mendiagnosis penyakit, pencegahan, dan perawatannya.
                                                                "
                ],
                "headline" => [
                    "Peran Dokter Patologi"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                                patologi memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik Penyakit Melalui Analisis Laboratorium"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis penyakit melalui analisis sampel jaringan, darah, dan cairan tubuh lainnya di laboratorium, serta melakukan pemeriksaan mikroskopis terhadap sampel biopsi, sitologi (seperti pap smear), dan aspirasi jarum halus untuk mendeteksi kelainan seluler dan jaringan.
                                                                "
                ],
                "kontent2_headline" => [
                    "Pengembangan dan Pengawasan Tes Laboratorium"
                ],
                "kontent_2" => [
                    "Mengembangkan, mengawasi, dan memastikan kualitas berbagai tes laboratorium yang digunakan dalam diagnosis penyakit. Menetapkan protokol dan standar untuk tes, serta memantau hasil untuk memastikan akurasi dan konsistensi. Selain itu juga bertanggung jawab untuk menginterpretasikan hasil tes yang kompleks dan memberikan laporan yang dapat digunakan oleh dokter klinis untuk merumuskan rencana perawatan
                                                                "
                ],
                "kontent3_headline" => [
                    "Penyuluhan dan Dukungan Klinis"
                ],
                "kontent_3" => [
                    "Memberikan konsultasi kepada dokter klinis mengenai interpretasi hasil tes laboratorium dan implikasinya terhadap diagnosis dan pengobatan. Mereka sering bekerja secara kolaboratif dengan dokter spesialis lain untuk menyusun rencana perawatan yang optimal berdasarkan temuan patologis. 
                                                                "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Patologi"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter patologi, ada beberapa hal yang perlu Anda persiapkan guna mempermudah dokter patalogi dalam mendiagnosis dan menentukan pengobatan yang tepat, seperti menyampaikan berbagai keluhan dan gejala yang dirasakan secara detail kepada dokter paru, membawa semua hasil pemeriksaan medis yang pernah Anda jalani, memberi tahu dokter mengenai riwayat penyakit, obat-obatan yang sedang dikonsumsi, dan alergi yang dimiliki
                                                                "
                ]

            ],

            16 => [
                "slug" => [
                    "Apa Itu Dokter Penyakit Dalam"
                ],
                "kontent_slug" => [
                    "dokter yang bertanggung jawab dalam menangani berbagai kondisi medis terkait dengan banyak organ dalam tubuh, seperti jantung, paru-paru, ginjal, hati, dan lain-lain.
                                                                    "
                ],
                "headline" => [
                    "Peran Dokter Penyakit Dalam"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                                    penyakit dalam memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Pengelolaan Penyakit Kronis dan Akut"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan mengelola berbagai penyakit kronis dan akut yang mempengaruhi organ-organ dalam tubuh, serta menangani kondisi seperti diabetes, hipertensi, penyakit jantung, penyakit ginjal, penyakit paru-paru, dan gangguan pencernaan.
                                                                    "
                ],
                "kontent2_headline" => [
                    "Koordinasi Perawatan Multidisiplin"
                ],
                "kontent_2" => [
                    "Bekerja sama dengan ahli bedah, kardiolog, endokrinolog, pulmonolog, dan spesialis lainnya untuk memastikan bahwa pasien menerima perawatan yang terkoordinasi dan komprehensif. Internis juga berperan dalam merujuk pasien ke spesialis yang tepat, mengintegrasikan rekomendasi perawatan, dan memantau kemajuan pasien untuk memastikan efektivitas pengobatan.
                                                                    "
                ],
                "kontent3_headline" => [
                    "Pencegahan dan Promosi Kesehatan"
                ],
                "kontent_3" => [
                    "Memberikan edukasi kepada pasien tentang pentingnya gaya hidup sehat, termasuk diet seimbang, aktivitas fisik, berhenti merokok, dan manajemen stres. Internis juga melakukan skrining rutin untuk mendeteksi penyakit pada tahap awal, seperti pemeriksaan tekanan darah, kadar kolesterol, dan tes untuk diabetes.
                                                                    "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Penyakit Dalam"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter patologi, ada beberapa hal yang perlu disiapkan seperti catatan pertanyaan yang ingin diajukan dan riwayat keluhan atau gejala yang diderita secara detail, hasil pemeriksaan yang Anda lakukan sebelumnya jika ada, misalnya hasil pemeriksaan darah, foto Rontgen, atau CT scan dan tanyakan opsi perawatan yang tersedia dan tingkat keberhasilan serta risiko dari setiap perawatan.
                                                                    "
                ]

            ],

            17 => [
                "slug" => [
                    "Apa Itu Dokter Psikiatri"
                ],
                "kontent_slug" => [
                    "dokter yang bertanggung jawab dalam  mengidentifikasi gangguan mental berdasarkan akibat dari sebuah kondisi. Penyakit mental juga lebih kompleks, seperti bipolar disorder, anxiety disorder (Gangguan kecemasan), anorexia nervosa, depresi berat, skizofrenia.
                                                                        "
                ],
                "headline" => [
                    "Peran Dokter Psikiatri"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                                        psikiatri memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Evaluasi Gangguan Mental"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis berbagai gangguan mental melalui wawancara klinis, penilaian psikologis, dan tes diagnostic, serta mengevaluasi gejala seperti perubahan suasana hati, perilaku, pola pikir, dan fungsi kognitif untuk mengidentifikasi kondisi seperti depresi, gangguan kecemasan, skizofrenia, gangguan bipolar, dan gangguan makan.
                                                                        "
                ],
                "kontent2_headline" => [
                    "Perawatan dan Manajemen Terapi Psikiatrik"
                ],
                "kontent_2" => [
                    "Meresepkan dan memantau obat-obatan seperti antidepresan, antipsikotik, ansiolitik, dan stabilisator suasana hati untuk membantu mengelola gejala gangguan mental. Selain itu juga melakukan terapi psikologis seperti terapi kognitif-behavioral (CBT), terapi interpersonal, dan terapi kelompok untuk membantu pasien mengatasi masalah emosional dan perilaku.
                                                                        "
                ],
                "kontent3_headline" => [
                    "Penyuluhan dan Dukungan Pasien"
                ],
                "kontent_3" => [
                    "Memberikan edukasi dan dukungan kepada pasien dan keluarga mereka mengenai kondisi mental yang didiagnosis, opsi pengobatan, dan strategi mengelola gejala. Serta membantu pasien memahami kondisi mereka, mengembangkan keterampilan koping, dan meningkatkan kepatuhan terhadap rencana perawatan. 
                                                                        "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Psikiatri"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter psikiatri, ada beberapa hal yang perlu disiapkan seperti cari tahu lebih dahulu tentang psikiater yang akan menangani masalah anda, jelaskan alasan menemui seorang psikiater termasuk gejala yang dialami, berapa lama gejala sudah terjadi dan pernah mengalami masalah perilaku atau kejadian traumatis. 
                                                                        "
                ]

            ],

            18 => [
                "slug" => [
                    "Apa Itu Dokter Radiologi"
                ],
                "kontent_slug" => [
                    "Dokter spesialis yang melakukan pemeriksaan radiologi untuk mendeteksi, mendiagnosis, dan mengobati penyakit. Pemeriksaan radiologi dapat menggunakan prosedur pencitraan, seperti foto Rontgen, USG, CT scan, hingga MRI, atau radiasi.
                                                                            "
                ],
                "headline" => [
                    "Peran Dokter Radiologi"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                                            radiologi memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik melalui Pencitraan Medis"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis berbagai kondisi medis melalui penggunaan teknologi pencitraan medis, serta menginterpretasikan gambar dari berbagai modalitas pencitraan seperti sinar-X, ultrasonografi, CT scan, MRI, dan PET scan. Dengan menganalisis gambar dapat mendeteksi penyakit, cedera, atau kelainan yang mungkin tidak terlihat melalui pemeriksaan fisik biasa.
                                                                            "
                ],
                "kontent2_headline" => [
                    "Intervensi Radiologi"
                ],
                "kontent_2" => [
                    "Melakukan prosedur intervensional yang menggunakan pencitraan medis untuk memandu tindakan terapeutik. Prosedur ini termasuk biopsi yang dibantu pencitraan, pemasangan kateter, drainase abses, embolisasi, dan prosedur minimal invasif lainnya.
                                                                            "
                ],
                "kontent3_headline" => [
                    "Pemantauan dan Tindak Lanjut Perawatan"
                ],
                "kontent_3" => [
                    "Melakukan pencitraan berulang untuk memantau perkembangan penyakit atau respons terhadap pengobatan, seperti melihat perubahan ukuran tumor setelah kemoterapi atau radioterapi, serta memberikan laporan dan rekomendasi kepada tim medis yang merawat pasien untuk memastikan bahwa perawatan yang diberikan tetap sesuai dan efektif.
                                                                            "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Radiologi"
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter radiologi, ada beberapa hal yang perlu disiapkan seperti tiba setidaknya 20 menit sebelum pemeriksaan radiologi, siapkan dan bawa laporan riwayat medis dan surat pengantar
                                                                            pemeriksaan radiologi dari dokter yang menangani, beri tahu dokter jika Anda dalam kondisi hamil atau sedang menyusui, membawa kartu identitas lengkap dan beberapa dokumen pendukung terkait pemeriksaan yang telah dilakukan sebelumnya, misalnya hasil pemeriksaan darah, foto Rontgen, atau CT scan, dan beritahu dokter obat atau suplemen yang dikonsumsi.
                                                                            "
                ],

            ],

            19 => [
                "slug" => [
                    "Apa Itu Dokter Rehabilitasi Medik"
                ],
                "kontent_slug" => [
                    "dokter rehabilitasi medik, merupakan keilmuan medis yang memiliki cakupan luas. Seorang dokter rehabilitasi medik dituntut mampu menangani pasien dengan fungsi tubuh bermasalah agar kembali mandiri.
                                                                                "
                ],
                "headline" => [
                    "Peran Dokter Rehabilitasi Medik"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                    rehabilitasi Medik memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Penilaian dan Rencana Rehabilitasi"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk melakukan penilaian menyeluruh terhadap fungsi fisik dan kognitif pasien setelah cedera, penyakit, atau gangguan kronis, serta menggunakan hasil penilaian untuk merancang rencana rehabilitasi yang disesuaikan dengan kebutuhan individu pasien denan encakup penilaian terhadap kekuatan otot, rentang gerak, keseimbangan, koordinasi, dan kemampuan fungsional.
                                                                                "
                ],
                "kontent2_headline" => [
                    "Koordinasi Perawatan Multidisiplin"
                ],
                "kontent_2" => [
                    "Bekerja sama dengan berbagai profesional kesehatan, termasuk fisioterapis, terapis okupasi, terapis bicara, dan psikolog, untuk menyediakan perawatan yang komprehensif dan terintegrasi. Mereka berperan dalam merencanakan, mengoordinasikan, dan memantau berbagai aspek perawatan rehabilitasi, memastikan bahwa semua intervensi dilakukan secara sinergis untuk mencapai tujuan rehabilitasi pasien.
                                                                                "
                ],
                "kontent3_headline" => [
                    "Manajemen Nyeri dan Pemulihan"
                ],
                "kontent_3" => [
                    "Bertanggung jawab untuk manajemen nyeri dan pemulihan pasien dari cedera atau penyakit dengan menggunakan berbagai metode untuk mengelola nyeri, termasuk terapi fisik, terapi manual, penggunaan alat bantu, dan intervensi medikamentosa, serta bekerja untuk membantu pasien meminimalkan nyeri, memperbaiki fungsi, dan meningkatkan mobilitas.
                                                                                "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter Rehabilitasi Medik "
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter rehabilitasi medik, ada beberapa hal yang perlu disiapkan seperti tiba setidaknya 20 menit sebelum pemeriksaan radiologi, siapkan dan bawa laporan riwayat medis dan surat pengantar
                                                                                pemeriksaan dari dokter yang menangani, membawa kartu identitas lengkap dan beberapa dokumen pendukung terkait pemeriksaan yang telah dilakukan sebelumnya, dan beritahu dokter obat atau suplemen yang dikonsumsi.
                                                                                "
                ],

            ],

            20 => [
                "slug" => [
                    "Apa Itu Dokter THT"
                ],
                "kontent_slug" => [
                    "dokter yang secara khusus menangani berbagai kondisi medis yang berkaitan dengan telinga, hidung, tenggorokan, bedah kepala dan leher.
                                                                                    "
                ],
                "headline" => [
                    "Peran Dokter THT"
                ],
                "kontent_headline" => [
                    "Secara garis besar, dokter spesialis 
                                                                                    THT memiliki peran dalam beberapa aspek medis, yaitu:"
                ],
                "kontent1_headline" => [
                    "Diagnostik dan Pengobatan Gangguan Telinga"
                ],
                "kontent_1" => [
                    "Bertanggung jawab untuk mendiagnosis dan mengobati berbagai gangguan yang mempengaruhi telinga, termasuk infeksi telinga, gangguan pendengaran, dan tinnitus (denging di telinga) dengan menggunakan berbagai alat diagnostik seperti otoskop untuk memeriksa telinga dan audiometri untuk mengukur tingkat pendengaran
                                                                                    "
                ],
                "kontent2_headline" => [
                    "Penanganan Masalah Hidung dan Sinus"
                ],
                "kontent_2" => [
                    "Menangani berbagai masalah yang mempengaruhi hidung dan sinus, seperti sinusitis, rinitis alergi, dan polip hidung dengan menggunakan teknik diagnostik seperti endoskopi hidung untuk memeriksa saluran hidung dan sinus secara langsung. Pengobatan bisa melibatkan penggunaan obat-obatan seperti dekongestan, kortikosteroid nasal, atau terapi imunoterapi untuk alergi. 
                                                                                    "
                ],
                "kontent3_headline" => [
                    "Perawatan Gangguan Tenggorokan dan Suara"
                ],
                "kontent_3" => [
                    "berfokus pada diagnosis dan perawatan gangguan yang mempengaruhi tenggorokan dan suara, seperti radang tenggorokan, laringitis, dan gangguan suara. Mereka menggunakan alat diagnostik seperti laringoskopi untuk memeriksa laring dan struktur tenggorokan. Pengobatan dapat mencakup terapi suara, penggunaan obat-obatan, dan dalam beberapa kasus, intervensi bedah untuk mengatasi masalah seperti nodul atau polip pita suara.
                                                                                    "
                ],
                "kontent4_headline" => [
                    "Hal yang Harus dilakukan Sebelum Bertemu Dokter THT "
                ],
                "kontent_4" => [
                    "Sebelum bertemu dengan dokter THT, ada beberapa hal yang perlu disiapkan seperti tiba lebih awal, bawa laporan riwayat medis lengkap serta surat rujukan atau rekomendasi dari dokter lain, catat dan siapkan informasi mengenai gejala yang sedang dialami dan riwayat pengobatan.
                                                                                    "
                ],

            ]
        ];
        $data_img = [
            1 => [

                "img" => "/asset/img/doctor-high-tech-healthcare-diagnosis 1.svg",
                "judul" => "Spesialis Anestesi"
            ],
            2 => [
                "id" => 2,
                "img" => "/asset/img/stages-baby-boy-collection-flat-design 1.svg",
                "judul" => "Spesialis Anak"
            ],
            3 => [
                "id" => 3,
                "img" => "/asset/img/professional-surgeons-surrounding-patient-operation-table-flat-illustration 1.svg",
                "judul" => "Spesialis Bedah"
            ],
            4 => [
                "img" => "/asset/img/hand-drawn-flat-design-thyroid-illustration 1.svg",
                "judul" => "Spesialis Endokrinologi"
            ],
            5 => [
                "id" => 5,
                "img" => "/asset/img/confused-elderly-man-suffering-from-alzheimer-disease-his-relative-doctor-flat-vector-illustration 1.svg",
                "judul" => "Spesialis Geriatri"
            ],
            6 => [
                "id" => 6,
                "img" => "/asset/img/qnyr_6e7r_220302 1.svg",
                "judul" => "Spesialis Dokter Gigi"
            ],
            7 => [
                "img" => "/asset/img/high-blood-pressure-abstract-concept-illustration 1.svg",
                "judul" => "Spesialis Jantung"
            ],
            8 => [
                "id" => 8,
                "img" => "/asset/img/hand-drawn-sex-toys-illustration 1.svg",
                "judul" => "Spesialis Kulit dan Alat Kelamin"
            ],
            9 => [
                "img" => "/asset/img/flat-hand-drawn-microblading-illustration 1.svg",
                "judul" => "Spesialis Mata"
            ],
            10 => [
                "img" => "/asset/img/klinik (8) 1.svg",
                "judul" => "Spesialis Saraf"
            ],
            11 => [
                "img" => "/asset/img/klinik (9) 1.svg",
                "judul" => "Spesialis Kandungan"
            ],
            12 => [
                "img" => "/asset/img/klinik (10) 1.svg",
                "judul" => "Spesialis Kangker"
            ],
            13 => [
                "img" => "/asset/img/klinik (11) 1.svg",
                "judul" => "Spesialis Tulang"
            ],
            14 => [
                "img" => "/asset/img/klinik (12) 1.svg",
                "judul" => "Spesialis Paru-Paru"
            ],
            15 => [
                "img" => "/asset/img/klinik (13) 1.svg",
                "judul" => "Spesialis Patologi"
            ],
            16 => [
                "img" => "/asset/img/klinik (14) 1.svg",
                "judul" => "Spesialis Penyakit Dalam"
            ],
            17 => [
                "img" => "/asset/img/klinik (15) 1.svg",
                "judul" => "Spesialis Psikiatri"
            ],
            18 => [
                "img" => "/asset/img/klinik (16) 1.svg",
                "judul" => "Spesialis Radiologi"
            ],
            19 => [
                "img" => "/asset/img/klinik (17) 1.svg",
                "judul" => "Spesialis Rehabilitasi medis"
            ],
            20 => [
                "img" => "/asset/img/klinik (18) 1.svg",
                "judul" => "Spesialis THT"
            ]
        ];
        if (array_key_exists($id, $content)) {
            if (array_key_exists($id, $data_img)) {
                return view('Pages.Layanandetail_pages', [
                    'content' => $content[$id],
                    'img' => $data_img[$id],
                ]);
            }
        } else {
            return abort(404, 'Content not found');
        }
    }
}
