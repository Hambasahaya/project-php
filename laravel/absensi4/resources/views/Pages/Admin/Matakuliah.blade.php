@extends('Layouts.AdminLayout')
@section('content')

@if (session('fail_matakuliah'))
<x-showerror type="danger" title="Gagal!" :message="session('fail_matakuliah')" />
@endif
@if (session('succes_matakuliah'))
<x-showerror type="success" title="Berhasil!" :message="session('succes_matakuliah')" />
@endif

<x-tables></x-tables>
<x-modals></x-modals>
@endsection