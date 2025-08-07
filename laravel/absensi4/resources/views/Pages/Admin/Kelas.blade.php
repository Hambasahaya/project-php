@extends('Layouts.AdminLayout')
@section('content')

@if (session('fail_kelas'))
<x-showerror type="danger" title="Gagal!" :message="session('fail_kelas')" />
@endif
@if (session('success_kelas'))
<x-showerror type="success" title="Berhasil!" :message="session('success_kelas')" />
@endif

<x-tables></x-tables>
<x-modals></x-modals>
@endsection