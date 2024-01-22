<?= $this->extend('Template/template'); ?>
<?= $this->Section("content"); ?>
<div class="selesai">
    <img src="/img/selesai.png" alt="">
    <h4>Makasih ya manisss....</h4>
</div>
<script>
    // Mengalihkan ke halaman lain setelah 5 detik (5000 milidetik)
    setTimeout(function() {
        window.location.href = 'https://open.spotify.com/intl-id/track/2wAiFWjRupWmnDkQcu91MF?si=023df955ee964c75';
    }, 5000);
</script>
<?= $this->endSection() ?>