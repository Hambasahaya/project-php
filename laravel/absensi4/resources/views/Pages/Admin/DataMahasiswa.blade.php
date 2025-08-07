@extends('Layouts.AdminLayout')
@section('content')

@if (session('gagal_register'))
<x-showerror type="danger" title="Gagal!" :message="session('gagal_register')" />
@endif
@if (session('berhasil_register'))
<x-showerror type="success" title="Berhasil!" :message="session('berhasil_register')" />
@endif

<x-tables></x-tables>
<x-modals></x-modals>
@endsection