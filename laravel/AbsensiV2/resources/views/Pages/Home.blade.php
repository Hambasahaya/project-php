@extends('Layouts.MainLayouts')

@section('content')
@if (session('pengajuans_fail'))
<x-showerror type="danger" title="Gagal!" :message="session('pengajuans_fail')" />
@endif
@if (session('pengajuans_success'))
<x-showerror type="success" title="Berhasil!" :message="session('pengajuans_success')" />
@endif

<x-modals></x-modals>
<x-button-absens></x-button-absens>
<x-count-section></x-count-section>
<x-tables></x-tables>
<x-footer></x-footer>
@endSection