@extends("Layout.Userpages_layout")
@section("usercontent")
<style>
    .queue-number-card {
        max-width: 400px;
        margin: 50px auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .queue-number {
        font-size: 48px;
        font-weight: bold;
        color: #007bff;
    }

    .btn-home {
        width: 100%;
        margin-top: 20px;
    }
</style>
<div class="container">
    <div class="queue-number-card text-center">
        <h4 class="mb-4">NOMOR ANTRIAN ANDA</h4>
        @foreach($rumahsakit as $rs)
        <h5 class="mb-2">{{$rs->user->nama_lengkap}}</h5>
        <p class="mb-1">{{$rs->alamat_fasyankes}}</p>
        <h6 class="mb-3">{{Auth::user()->nama_lengkap}}</h6>
        @endforeach
        <div class="queue-number-card bg-light py-3 rounded mb-4">
            <p class="mb-1">NOMOR</p>
            <p class="queue-number">{{$antrian}}</p>
            <p>Tanggal antrian:{{$tanggal_antrian}}</p>
        </div>
        <h6 class="noted">Harap sabar menunggu antrian anda dipanggil yaaa!!!</h6>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="startModal" tabindex="-1" role="dialog" aria-labelledby="startModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="startModalLabel">Mulai Antrian</h5>
            </div>
            <div class="modal-body">
                Klik "Mulai" untuk memulai antrian.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="start-button">Mulai</button>
            </div>
        </div>
    </div>
</div>

<audio id="notification-audio" src="/asset/voice/panggil.mp3" preload="auto"></audio>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const noted = document.querySelector('.noted');
    $(document).ready(function() {
        let previousStatus = null;
        let userInteracted = false;
        $('#startModal').modal('show');

        $('#start-button').click(function() {
            userInteracted = true;
            checkStatus();
            $('#startModal').modal('hide');
        });

        function checkStatus() {
            if (!userInteracted) return;

            $.ajax({
                url: '{{ route("check-status", Auth::user()->id) }}',
                method: 'GET',
                success: function(response) {
                    console.log('Response from server:', response);
                    if (response.status !== previousStatus) {
                        previousStatus = response.status;
                        if (response.status === 'dipanggil') {
                            noted.innerHTML = "MASUKK YUKK!,UDAH DI PANGGIL TUH!!!!!"
                            console.log('Playing audio...');

                            $('#notification-audio')[0].play().catch(function(error) {
                                console.log('Audio play error:', error);
                            });
                        } else if (response.status == 'selesai') {
                            window.location.href = '/finispasient'
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                }
            });
        }

        setInterval(checkStatus, 90000); // Polling every 60 seconds
    });
</script>
@endsection