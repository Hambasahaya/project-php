
  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const photoPreview = document.getElementById('photoPreview');
  const locationInfo = document.getElementById('locationInfo');
  const modalElement = document.getElementById('cameraModal');
  let watchId = null;
  let latitude = null;
  let longitude = null;
 let mode=null
  function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
        video.srcObject = stream;
        video.style.display = 'block';
      })
      .catch(err => {
        alert('Kamera tidak dapat diakses: ' + err.message);
      });
  }

 function getLocation() {
  if (!navigator.geolocation) {
    locationInfo.textContent = "Geolocation tidak didukung oleh browser ini.";
    return;
  }

  locationInfo.textContent = "Mendeteksi lokasi secara real-time...";

  watchId = navigator.geolocation.watchPosition(position => {
    latitude = position.coords.latitude.toFixed(6);
    longitude = position.coords.longitude.toFixed(6);
    locationInfo.textContent = `Lokasi ditemukan: ${latitude}, ${longitude}`;
  }, () => {
    locationInfo.textContent = "Gagal mendapatkan lokasi.";
  }, {
    enableHighAccuracy: true,
    maximumAge: 0,
    timeout: 10000
  });
}


  function takePhoto() {
    if (!video.srcObject) {
      alert("Kamera belum aktif.");
      return;
    }

    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL('image/png');
    photoPreview.src = dataURL;
    if (video.srcObject) {
        video.srcObject.getTracks().forEach(track => track.stop());
        video.srcObject = null;
        video.style.display = 'none';
      }

    if (!latitude || !longitude) {
      alert("Lokasi belum terdeteksi.");
      return;
    }

    fetch('/absen', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
        foto: dataURL,
        lat: latitude,
        lon: longitude,
        type:mode
      })
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message || "Absen berhasil!");
      const bsModal = bootstrap.Modal.getInstance(modalElement);
      bsModal.hide();
      location.reload();
    })
    .catch(error => {
      console.error("Gagal kirim data:", error);
      alert("Gagal mengirim data ke server.");
    });
  }

  document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
    button.addEventListener('click', function () {
        mode = this.getAttribute('data-btn'); 
    });
})
  if (modalElement) {
    modalElement.addEventListener('shown.bs.modal', () => {
       console.log(mode);
      getLocation();
      startCamera();
    });

   modalElement.addEventListener('hidden.bs.modal', () => {
  if (video.srcObject) {
    video.srcObject.getTracks().forEach(track => track.stop());
    video.srcObject = null;
    video.style.display = 'none';
  }

  if (watchId !== null) {
    navigator.geolocation.clearWatch(watchId);
    watchId = null;
  }
});
  }

