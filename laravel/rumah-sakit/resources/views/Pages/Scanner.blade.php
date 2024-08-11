@extends("Layout.Userpages_layout")
@section("usercontent")
@if(session('berhasil_scan')==null))
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<div class="container text-center">
    <div class="backtohomes d-flex">
        <a href="{{route('user')}}" class="btn btn-link text-dark">
            <i class="bi bi-arrow-left"></i>
        </a>
    </div>
    <div class="scaneer d-flex flex-column">
        <div class="userinformation d-flex flex-column align-items-center justify-content-center">
            <h1 class="mb-4">Scan Barcode</h1>
            <img src="/asset/img//userfoto/pasient.png" class="profile-img">
            <h4 class="fw-bold">{{Auth::user()->nama_lengkap}}</h4>
            <p>{{Auth::user()->jenis_kelamin}}</p>
            <p>{{Auth::user()->nik}}</p>
        </div>
    </div>
    <div class="scanner-box">
        <button id="start-camera" class="btnscanner">Klik disini Untuk membuka kamera</button>
        <div id="qr-reader" style="display: none;"></div>
        <div id="qr-reader-results"></div>
    </div>
</div>
<script>
    let html5QrCode;

    function onScanSuccess(decodedText, decodedResult) {
        html5QrCode.stop().then(() => {
            console.log("QR Code scanning stopped.");
        }).catch(err => {
            console.error("Failed to stop scanning:", err);
        });
        fetch('/save-scanned-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                scannedData: decodedText
            })
        }).then(response => {
            if (response.ok) {
                window.location.href = `/pessiendaftar`;
            } else {
                console.error('Failed to save scanned data');
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    }

    function onScanError(errorMessage) {
        console.error(errorMessage);
    }
    document.getElementById('start-camera').addEventListener('click', function() {
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                document.getElementById('start-camera').style.display = 'none';
                document.getElementById('qr-reader').style.display = 'block';

                html5QrCode = new Html5Qrcode("qr-reader");

                html5QrCode.start({
                        facingMode: "environment"
                    }, {
                        fps: 1,
                        qrbox: {
                            width: 250,
                            height: 250
                        }
                    },
                    onScanSuccess,
                    onScanError
                ).catch((err) => {
                    console.error(err);
                });
            })
            .catch(function(err) {
                console.error("Camera access denied:", err);
            });
    });
</script>
@endif
@if(session("berhasil_scan")!==null)
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('updatepasswordgagal'));
        myModal.show();
        setTimeout(() => {
            window.location.href = '/antrian';
        }, 4000);
    });
</script>

<div class="modal fade" id="updatepasswordgagal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
        <div class="modal-content" style="background-color: transparent;">
            <div class="finishnewpas d-flex flex-column justify-content-center align-items-center align-content-center">
                <div class="authpages">
                    <form action="" method="post" class="d-flex  p-4 flex-column">
                        <h6 class="text-center">Selamat Pendaftaran kamu selesai</h6>
                        <p class="text-center" style="color: white;">kamu akan di arahkan ke halaman antrian kembali!</p>
                        <img src="/asset/img/klinik9000.svg" class="align-self-center img-form" alt="" srcset="" width="35%">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(session("terdaftar")!==null)
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('updatepasswordgagal'));
        myModal.show();
        setTimeout(() => {
            window.location.href = '/antrian';
        }, 4000);
    });
</script>

<div class="modal fade" id="updatepasswordgagal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="background-color: transparent;">
        <div class="modal-content" style="background-color: transparent;">
            <div class="finishnewpas d-flex flex-column justify-content-center align-items-center align-content-center">
                <div class="authpages">
                    <form action="" method="post" class="d-flex  p-4 flex-column">
                        <h6 class="text-center">Kamu sudah terdaftar nih</h6>
                        <p class="text-center" style="color: white;">kamu akan di arahkan ke halaman antrian kembali!</p>
                        <img src="/asset/img/klinik9000.svg" class="align-self-center img-form" alt="" srcset="" width="35%">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection