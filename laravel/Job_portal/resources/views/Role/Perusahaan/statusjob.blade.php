@extends('layouts.perusahaan')

@section('content')
<div class="Statusjob">
  <div class="job-status">
    
    {{-- Bagian Kiri: Informasi Pekerjaan --}}
    <div class="job-info">
      <h2 class="title">Job Detail</h2>
      <h3 class="subtitle">Open Position for UI/UX Designer</h3>

      <h4>About Sevanam:</h4>
      <p>
        Established since 2020, PT. Sevanam Teknologi Solusindo is engaged in Software Development,
        especially Microfinance Institutions that focus on Customer Centric towards Customer Satisfaction.
        Serving 60+ Customers spread across Bali, Central and Eastern Indonesia.
      </p>

      <h4>Requirements:</h4>
      <ul>
        <li>Technical understanding of how to perform software testing</li>
        <li>Ability to perform concrete problem solving in software</li>
        <li>Ability to identify bugs, errors/defects, and provide input on specific improvements needed</li>
        <li>Ability to document software testing results based on findings during the testing process</li>
      </ul>

      
    </div>

    {{-- Bagian Kanan: Informasi Perusahaan dan Gambar --}}
    <div class="company-info">
     <figure>
       <img src="" alt="Logo Sevanam Teknologi Solusindo" class="company-logo">
      <h3>Sevanam</h3>
     </figure>
      <img src="" alt="Ilustrasi Pekerjaan UI/UX Designer" class="job-image">
    </div>
  </div>

  <h2>List Pelamar</h2>


<div class="pelamar-card">
    <div class="pelamar-avatar">
        <img src="{{ $foto ?? asset('default-avatar.png') }}" alt="Foto Pelamar">
    </div>
    <div class="pelamar-info">
        <h5>nama - posisi</h5>
        <div class="pelamar-bio">
            bio
        </div>
    </div>
    <div class="pelamar-action">
        <a href="{{ $cv_link ?? '#' }}"  target="_blank">Lihat CV </a>
        <button class="terima">Terima</button>
        <button class="tolak">Tolak</button>
    </div>
</div>
</div>

<style>
    .Statusjob {
  max-width: 1100px;
  margin: 50px auto;
  padding: 20px;
}

.job-status {
  display: flex;
  justify-content: space-between;
  gap: 30px;
  padding: 30px;
  border-radius: 20px;
  background: linear-gradient(135deg, #ff4fac, #ff8bb3);
  color: white;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  flex-wrap: wrap;
  margin-bottom: 50px
}

.job-info {
  flex: 2;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.job-info h2 {
  font-size: 28px;
  margin-bottom: 10px;
}

.job-info h3 {
  font-size: 20px;
  margin-bottom: 10px;
}

.job-info h4 {
  font-size: 18px;
  margin-top: 15px;
}

.job-info p {
  margin-top: 5px;
  line-height: 1.5;
}

.job-info ul {
  padding-left: 20px;
}

.job-info li {
  margin-bottom: 8px;
}

.company-info {
  flex: 1;
  display: flex;
 flex-direction: column;
  align-items: center;
  gap: 10px;
  text-align: center;
  justify-content: center;
}

.company-logo {
  width: 80px;
  height: 80px;
  object-fit: contain;
  border-radius: 10px;
}

.job-image {
  width: 100%;
  max-width: 200px;
  border-radius: 10px;
  margin-top: 10px;
}

.apply-btn, .visit-btn {
  padding: 10px 20px;
  background-color: #3f88ff;
  color: white;
  text-decoration: none;
  border-radius: 20px;
  margin-top: 20px;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.apply-btn:hover, .visit-btn:hover {
  background-color: #2e6fdc;
}
.pelamar-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #ff4fac;
    border-radius: 20px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    flex-wrap: wrap;
}

.pelamar-avatar img {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    object-fit: cover;
}

.pelamar-info {
    flex: 1;
    margin-left: 15px;
    margin-right: 15px;
    min-width: 200px;
}

.pelamar-info h5 {
    margin: 0 0 10px;
    font-weight: bold;
    color: white;
}

.pelamar-bio {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px;
    border-radius: 10px;
    color: white;
    font-size: 14px;
    min-height: 60px;
}


.pelamar-action a {
     background: #4e9bff;
    color: white;
    padding: 8px 10px;
    border-radius: 20px;
    text-decoration: none;
    transition: 0.3s;
    display: inline-block;
   
}
.pelamar-action button.terima {
    background: #4e9bff;
    color: green;
    padding: 8px 10px;
    border-radius: 20px;
    text-decoration: none;
    transition: 0.3s;
    display: inline-block;
   
}
.pelamar-action button.tolak {
    background: #4e9bff;
    color: red;
    padding: 8px 15px;
    border-radius: 20px;
    text-decoration: none;
    transition: 0.3s;
    display: inline-block;
   
}

.lihat-cv-btn:hover {
    background: #2a7dd0;
}

/* Responsive */


@media (max-width: 768px) {
  .job-status {
    flex-direction: column;
  }

  .company-info, .job-info {
    width: 100%;
  }

  .job-image {
    width: 100%;
    max-width: 100%;
  }
  .pelamar-card {
        flex-direction: column;
        align-items: flex-start;
    }
    .pelamar-info, .pelamar-action {
        margin-left: 0;
        margin-right: 0;
        margin-top: 10px;
        width: 100%;
        text-align: left;
    }
    .pelamar-action {
        text-align: center;
    }
    .company-info {
  
 flex-direction: row;
  
}
}

</style>
@endsection

