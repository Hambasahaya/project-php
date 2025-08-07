 @extends('Layouts.MainLayout')
 @section('content')
 <div class="text-center">
     <h2 class="section-title">Student course schedule</h2>
 </div>
 <div class="attendance-section">
     <x-listmatkul></x-listmatkul>
 </div>

 <!-- <div class="text-center">
     <button class="btn btn-scan py-2">Scan QR Code</button><br>
     <a href="#">Report an absence</a>
 </div> -->
 @endsection