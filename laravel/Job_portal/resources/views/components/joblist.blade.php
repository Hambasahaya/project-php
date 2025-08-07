 <div id="joblistSection" style="display: none;">
     @if(Auth::user()->role==="perusahaan")
     <a href="javascript:void(0)" onclick="showPostJob()" class="post-button">Post New Job</a>
     @endif
     @foreach($jobs as $datajobs)
     <div class="job-card">
         <div class="job-info">
             <img src="{{ asset('storage/foto_user/'.$datajobs->perusahaan->foto) }}" alt="Company Logo">
             <div class="job-text">
                 <small>{{$datajobs->perusahaan->nama}}</small>
                 <strong>{{$datajobs["judul_lowongan"]}}</strong>
                 <small>{{$datajobs["deskripsi_lowongan"]}}</small>
             </div>
         </div>
         <a href="{{route('statusjobs',$datajobs->id)}}" class="lihat-btn">
             Lihat →
         </a>
     </div>
     @endforeach
 </div>
 <div id="postJobSection" style="display: none;">
     <x-PostJob></x-PostJob>
     <button type="button" onclick="cancelPostJob()" class="lihat-btn">Cancel</button>
 </div>

 <script>
     function showPostJob() {
         document.getElementById('joblistSection').style.display = 'none';
         document.getElementById('postJobSection').style.display = 'block';
     }

     function cancelPostJob() {
         document.getElementById('postJobSection').style.display = 'none';
         document.getElementById('joblistSection').style.display = 'block';
     }
 </script>