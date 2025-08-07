 @extends('Layouts.MainLayout')
 @section('content')
 <div class="text-center">
     <h2 class="section-title">Your attendance</h2>
 </div>
 <div class="attendance-section">
     <x-listmatkul></x-listmatkul>
 </div>

 <div class="text-center">
     <a href="{{route('scanner')}}" class="btn btn-scan py-2">Scan QR Code</a><br>
     <a href="#">Report an absence</a>
 </div>
 @endsection