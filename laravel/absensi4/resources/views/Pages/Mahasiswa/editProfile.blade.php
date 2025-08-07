@extends('Layouts.MainLayout')

@section('content')
<div class="container py-5" style="max-width: 900px;">
    @if (session('fail_profile'))
    <x-showerror type="danger" title="Gagal!" :message="session('fail_profile')" />
    @endif
    @if (session('success_profile'))
    <x-showerror type="success" title="Berhasil!" :message="session('success_profile')" />
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="rounded shadow p-4" style="background: linear-gradient(to bottom, #e754b1, #aa4a68); color: white;">
            <h2 class="fw-bold">Account</h2>
            <p class="mb-4">Information and activities of your property</p>

            <div class="row align-items-center mb-4">
                <div class="col-md-2 text-center">
                    <img src="{{ Auth::user()->detail?->foto ? asset('storage/' . Auth::user()->detail->foto) : asset('img/default.png') }}"
                        alt="Profile" class="rounded-circle" width="80" height="80">
                </div>
                <div class="col-md-10">
                    <h6 class="fw-bold">Profile picture</h6>
                    <div class="d-flex gap-2">
                        <input type="file" name="profile_picture" class="form-control form-control-sm" style="max-width: 250px;">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Full name</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', Auth::user()->nama) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" value="{{  Auth::user()->nim }}" disabled>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Contact email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email',  Auth::user()->email) }}">
            </div>

            <div class="mb-3">
                <h6 class="fw-bold">Password</h6>
                <p class="mb-2">Modify your current password</p>

                <div class="mb-3">
                    <label class="form-label">Current password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                        <input type="password" name="current_password" class="form-control" placeholder="Enter current password">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">New password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                        <input type="password" name="new_password" class="form-control" placeholder="Enter new password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-light mt-2 fw-bold">Done</button>
            <a href="/logout" class="btn btn-light mt-2 fw-bold">Logout</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Show/hide password toggle
        document.querySelectorAll('.input-group').forEach(group => {
            const input = group.querySelector('input[type="password"]');
            const btn = group.querySelector('button');
            if (btn && input) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = btn.querySelector('i');
                    if (input.type === "password") {
                        input.type = "text";
                        icon.classList.remove("bi-eye");
                        icon.classList.add("bi-eye-slash");
                    } else {
                        input.type = "password";
                        icon.classList.remove("bi-eye-slash");
                        icon.classList.add("bi-eye");
                    }
                });
            }
        });

        // Gambar preview
        const fileInput = document.querySelector('input[name="profile_picture"]');
        const imgPreview = document.querySelector('img[alt="Profile"]');

        fileInput?.addEventListener('change', function() {
            const file = this.files[0];
            if (file && file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>


@endsection