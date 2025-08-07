@props(['type' => 'success', 'title' => '', 'message' => '', 'errors' => null])

@if ($type === 'error' && $errors && $errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{ $title ?: 'Terjadi Kesalahan!' }}</h4>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif ($message)
<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{ $title ?: 'Informasi' }}</h4>
    <p>{{ $message }}</p>
    <hr>
    <p class="mb-0">Silakan lanjutkan sesuai petunjuk.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif