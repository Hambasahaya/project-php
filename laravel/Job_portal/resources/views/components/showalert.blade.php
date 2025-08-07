<div class="alert alert-{{ $type ?? 'success' }} alert-dismissible fade show" role="alert">
    @if($title)
    <h4 class="alert-heading">{{ $title }}</h4>
    @endif

    <p>{{ $slot }}</p>

    @if($footer)
    <hr>
    <p class="mb-0"><strong>{{ $footer }}</strong></p>
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>