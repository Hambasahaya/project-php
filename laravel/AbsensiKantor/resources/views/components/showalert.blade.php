@php
$type = $type ?? 'success';
$icons = [
'success' => 'bi-check-circle-fill',
'danger' => 'bi-exclamation-triangle-fill',
'warning' => 'bi-exclamation-circle-fill',
'info' => 'bi-info-circle-fill',
];
$bg = [
'success' => 'bg-success',
'danger' => 'bg-danger',
'warning' => 'bg-warning',
'info' => 'bg-info',
];
@endphp

<div class="alert {{ $bg[$type] ?? 'bg-success' }} text-white shadow-sm border-0 d-flex align-items-start justify-content-between alert-dismissible fade show animate__animated animate__fadeInDown" role="alert" style="border-radius: 0.75rem;">
    <div class="d-flex">
        <i class="bi {{ $icons[$type] ?? 'bi-check-circle-fill' }} fs-4 me-3 mt-1"></i>
        <div>
            @if($title)
            <h5 class="alert-heading mb-1">{{ $title }}</h5>
            @endif

            <div>{{ $slot }}</div>

            @if($footer)
            <hr class="my-2 border-white opacity-50">
            <p class="mb-0"><strong>{{ $footer }}</strong></p>
            @endif
        </div>
    </div>

    <button type="button" class="btn-close btn-close-white ms-3 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
</div>