@extends('Layouts.MainLayout')

@section('content')
@if(session("pengajuans_success"))
<x-showalert
    type="success"
    title="Well done!"
    footer="{{session('pengajuans_success')}}">
</x-showalert>
@endif
@if(session("pengajuans_fail"))
<x-showalert
    type="danger"
    title="Well fail!"
    footer="{{session('pengajuans_fail')}}">
</x-showalert>
@endif

@if(session("berhasil_register"))
<x-showalert
    type="success"
    title="Well done!"
    footer="{{session('berhasil_register')}}">
</x-showalert>
@endif

@if(session("gagal_register"))
<x-showalert
    type="danger"
    title="Well fails!"
    footer="{{session('gagal_register')}}">
</x-showalert>
@endif


<div class="container mt-3">
    <x-headerinfo></x-headerinfo>
</div>
<section id="histori">
    <x-tables></x-tables>
</section>
@endSection