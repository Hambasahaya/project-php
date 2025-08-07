<?= $this->extend('home/layouts/index'); ?>

<?= $this->section('content'); ?>

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To</div>
        <div class="masthead-heading text-uppercase">
            <span style="color: blue;">PU</span><span style="color: yellow;">PR</span> Shortlink
        </div>
        <a class="btn btn-primary btn-xl text-uppercase"
            href="<?= logged_in() ? base_url('user/homepage') : base_url('login'); ?>">Mulai</a>
    </div>
</header>

<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <br>
            <br>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-eraser"></i>
                <h4 class="my-3">Customize Link</h4>
                <p class="text-muted">Sesuaikan tautan pendek Anda agar sesuai dengan kebutuhan Anda.
                    Dengan layanan Custom URL, Anda dapat memilih kata-kata pilihan sendiri untuk membuat tautan yang
                    unik dan mudah diingat.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-file-code"></i>
                <h4 class="my-3">Shortlink</h4>
                <p class="text-muted">Memperpendek tautan Anda, tautan Anda akan terlihat lebih rapi dan menarik.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="bi bi-file-binary-fill"></i>
                </span>
                <h4 class="my-3">Encryption Link</h4>
                <p class="text-muted">Lindungi privasi Anda dengan fitur enkripsi URL kami. Enkripsikan tautan pendek
                    Anda dengan kata sandi. Jaga keamanan data dan privasi Anda setiap kali membagikan tautan.</p>
            </div>
        </div>
    </div>
</section>

<section class="page-section" id="faq">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Frequently Asked Questions</h2>
            <br>
            <br>
            <br>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets2/img/faq/shortlink.jpg"
                        alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Apa itu Shortlink?</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Shortlink adalah URL yang telah dipendekkan dari bentuk aslinya. Biasanya,
                            shortlink
                            digunakan untuk menghemat ruang dan membuat tautan lebih mudah diingat dan dibagikan.
                            Misalnya, tautan panjang seperti "https://puprtes-my.sharepoint.com/:x:/:y/:z/abcde" dapat
                            dipendekkan menjadi "https://pupr.ai/example". Meskipun ukurannya lebih kecil, shortlink
                            tetap mengarahkan pengguna ke halaman yang sama dengan URL aslinya.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets2/img/faq/encrypt.jpeg"
                        alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Apa Kegunaan Enkripsi URL?</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Enkripsi URL penting untuk menjaga keamanan data sensitif saat berbagi
                            tautan online. Dengan mengenkripsi URL, informasi yang dikirimkan melalui tautan dapat
                            dilindungi dari akses yang tidak sah atau perubahan oleh pihak yang tidak diinginkan. Ini
                            membantu melindungi privasi pengguna dan mencegah potensi penipuan atau serangan cyber yang
                            mengancam keamanan data.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets2/img/faq/function.jpeg"
                        alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Apa Kegunaan Shortlink?</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Menghemat Ruang: Shortlink lebih pendek, sehingga lebih cocok digunakan
                            ketika membagikan informasi.
                            Mudah Diingat: URL yang pendek lebih mudah diingat dan diketik oleh pengguna.
                            Estetika: Tautan yang pendek dan rapi lebih terlihat profesional dan lebih menarik, terutama
                            ketika digunakan dalam penyebaran informasi.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets2/img/faq/customize.jpeg"
                        alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Apa itu kustomisasi URL?</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Fitur kustomisasi URL memungkinkan pengguna untuk membuat shortlink yang
                            lebih personal
                            dan relevan. Alih-alih menggunakan string karakter acak, Anda bisa mengganti bagian dari
                            shortlink dengan teks yang mudah diingat dan relevan dengan konten. Misalnya, Anda bisa
                            mengganti "https://pupr.ai/xyz123" menjadi "https://pupr.ai/RapatBesar". Fitur ini tidak
                            hanya membuat tautan lebih mudah diingat, tetapi juga dapat meningkatkan kepercayaan dan
                            klik dari pengguna, karena tautan terlihat lebih sah dan relevan.</p>
                    </div>
                </div>
            </li>
            <!-- <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li> -->
        </ul>
    </div>
</section>

<?= $this->endSection(); ?>