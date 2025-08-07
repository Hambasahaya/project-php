window.addEventListener('DOMContentLoaded', async () => {
  let type_absen=null 
  let VideoStream;
  let Interval;
   await Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('/Models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('/Models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('/Models')

  ]);
  window.openModalPengajuan = () => document.getElementById("modal").classList.remove("hidden");
  document.getElementById("batalBtn")?.addEventListener("click", () => document.getElementById("modal").classList.add("hidden"));


window.openRegisterModal = () => {
    document.getElementById('registerModal').classList.remove('hidden');
  };
  window.closeRegisterModal = () => {
    document.getElementById('registerModal').classList.add('hidden');
  };
window.faceveriv = () => {
    document.getElementById('faceverif').classList.remove('hidden');
    StartVerifVideo();
  };
  window.closefaceverif = () => {
    document.getElementById('faceverif').classList.add('hidden');
    stopVerifVideo();
  };

document.getElementById('registerForm')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
  const payload = {
    nama: form.name.value,
    email: form.email.value,
    password: form.password.value,
  }; 
  
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
  const response = await fetch("/addstaff", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": csrfToken
    },
    body: JSON.stringify(payload)
  });

  if (loadingText) loadingText.classList.add('hidden');
  if (response.status===200) {
    alert("Staff berhasil didaftarkan!");
    closeRegisterModal();
    location.reload();
    form.reset();
  } else {
   const errorData = await response.json();
  alert("Gagal mendaftarkan staff: " + (errorData.message || "Terjadi kesalahan."));
  }
});
  window.openAbsenModals= (button) => {
    document.getElementById('absenmodals').classList.remove('hidden');
    type_absen=button.dataset.type;
    startAbenVideo();
  };

  const StartVerifVideo = async () => {
    VideoStream = await navigator.mediaDevices.getUserMedia({ video: true });
    const video = document.getElementById('verifVideo');
    video.srcObject = VideoStream;
    video.onloadedmetadata = () => {
      video.play();
      drawBoundingBox("verifVideo","verifCanvas",Interval);
    };
  };
  const startAbenVideo = async () => {
    VideoStream = await navigator.mediaDevices.getUserMedia({ video: true });
    const video = document.getElementById('absenVideo');
    video.srcObject = VideoStream;
    video.onloadedmetadata = () => {
      video.play();
      drawBoundingBox('absenVideo','absenCanvas',Interval);
    };
  };

  const stopVerifVideo = () => {
    VideoStream?.getTracks().forEach(t => t.stop());
    clearInterval(Interval);
    const canvas = document.getElementById('verifCanvas');
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
  };
  const stopabsenVideo = () => {
    VideoStream?.getTracks().forEach(t => t.stop());
    clearInterval(Interval);
    const canvas = document.getElementById('absenCanvas');
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
  };


  window.closeAbsenmodal = () => {
    document.getElementById('absenmodals').classList.add('hidden');
    stopabsenVideo();
  };

  const drawBoundingBox = (video,canvas,interval) => {
    video = document.getElementById(video);
    canvas = document.getElementById(canvas);
    const ctx = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    interval = setInterval(async () => {
      const detection = await faceapi.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions());
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      const boxWidth = canvas.width * 0.6;
      const boxHeight = canvas.height * 0.6;
      const boxX = (canvas.width - boxWidth) / 2;
      const boxY = (canvas.height - boxHeight) / 2;
      ctx.strokeStyle = 'red';
      if (detection) {
        const faceBox = detection.box;
        const isInside = faceBox.x > boxX && faceBox.y > boxY &&
                         faceBox.x + faceBox.width < boxX + boxWidth &&
                         faceBox.y + faceBox.height < boxY + boxHeight;
        if (isInside) ctx.strokeStyle = 'green';
      }
      ctx.lineWidth = 3;
      ctx.strokeRect(boxX, boxY, boxWidth, boxHeight);
    }, 200);
  };
window.facedetection = async (video, canvas) => {
  video = document.getElementById(video);
  canvas = document.getElementById(canvas);
  
  const loadingOverlay = document.getElementById('loadingOverlay');
  loadingOverlay.classList.remove('hidden');

  const loadingText = document.getElementById('loadingText');
  if (loadingText) {
    loadingText.textContent = "Jangan bergerak... sedang mendeteksi wajah...";
    loadingText.classList.remove('hidden');
  }

  const detection = await faceapi.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
    .withFaceLandmarks()
    .withFaceDescriptor();

  if (!detection) {
    if (loadingText) loadingText.classList.add('hidden');
    return alert("Wajah tidak terdeteksi.");
  }
  

  loadingOverlay.classList.add('hidden');

  const faceBox = detection.detection.box;
  const boxWidth = canvas.width * 0.6;
  const boxHeight = canvas.height * 0.6;
  const boxX = (canvas.width - boxWidth) / 2;
  const boxY = (canvas.height - boxHeight) / 2;

  const isInside = faceBox.x > boxX && faceBox.y > boxY &&
                   faceBox.x + faceBox.width < boxX + boxWidth &&
                   faceBox.y + faceBox.height < boxY + boxHeight;

  if (!isInside) {
    if (loadingText) loadingText.classList.add('hidden');
    return alert("Pastikan wajah Anda berada di dalam kotak hijau.");
  }

  return Array.from(detection.descriptor);
};


  document.getElementById('absenForm')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
 const face_descriptor = await facedetection('absenVideo', 'absenCanvas');
  if (!face_descriptor) return;

  const payload = {
    face_descriptor: face_descriptor,
    type: type_absen,
  }; 
  
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

  const response = await fetch("/Absens", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": csrfToken
    },
    body: JSON.stringify(payload)
  });

  if (response.status===200) {
    alert("berhasil Absen");
    closeRegisterModal();
    location.reload();
    form.reset();
  } else {
   const errorData = await response.json();
  alert("Gagal absen: " + (errorData.message || "Terjadi kesalahan."));
  }
});



window.handlePengajuanAction = (id, action) => {
   const url = `/pengajuan/${id}/${action}`;
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(res => {
                alert(res.message);
                location.reload();
            })
            .catch(err => {
                alert('Terjadi kesalahan.');
                console.error(err);
            });
};
document.getElementById('filterSelect').addEventListener('change', async function () {
    const filter = this.value;
    try {
       loadAbsensi(filter)
    } catch (error) {
        console.error('Gagal ambil data:', error);
    }
});
document.getElementById('filterSelectall')?.addEventListener('change', async function () {
    const filter = this.value;
    try {
        const response = await fetch(`/absensiall/filter?filter=${filter}`);
        const data = await response.json();
        document.getElementById('absenAllBody').innerHTML = data.html;
    } catch (error) {
        console.error('Gagal mengambil data:', error);
    }
});

async function loadAbsensi(filter = "minggu") {
  try {
    const res = await fetch(`/absensi/filter?filter=${filter}`);
    const data = await res.json();
    const target = document.getElementById("absenBody");
    if (target) {
      target.innerHTML = data.html;
    }
  } catch (err) {
    alert("Gagal mengambil data: " + err);
  }
}
async function loadAbsensiAll(filter = "minggu") {
  try {
    const res = await fetch(`/absensiall/filter?filter=${filter}`);
    const data = await res.json();
    const target = document.getElementById("absenallBody");
    if (target) {
      target.innerHTML = data.html;
    }
  } catch (err) {
    alert("Gagal mengambil data: " + err);
  }
}
loadAbsensi('minggu')
loadAbsensiAll('minggu')

  document.getElementById('faceverifform')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
 const face_descriptor = await facedetection('verifVideo', 'verifCanvas');
  if (!face_descriptor) return;

  const payload = {
    face_descriptor: face_descriptor,
  }; 
  
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

  const response = await fetch("/faceverif", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": csrfToken
    },
    body: JSON.stringify(payload)
  });

  if (response.status===200) {
    alert("verifikasi Wajah Anda berhasil!");
       closefaceverif();
       location.reload();
    form.reset();
  } else {
   const errorData = await response.json();
  alert("Gagal Verifikasi wajah " + (errorData.message || "Terjadi kesalahan."));
  }
});
});

