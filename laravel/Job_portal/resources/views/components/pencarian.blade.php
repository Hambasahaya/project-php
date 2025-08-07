<form id="formCariLowongan" class="mb-4">
  <div class="field container">
    <div class="search-container">
      <div class="search-input">
        <i class="fas fa-search"></i>
        <input type="text" name="judul" placeholder="What are you looking for?" class="form-control me-2" />
      </div>
      <div class="input-lokasi">
        <input type="text" name="lokasi" placeholder="Lokasi" class="form-control me-2" />
      </div>
      <button type="submit" class="search-button btn btn-primary">Cari</button>
    </div>
  </div>
</form>

<div class="container">
  <h4 id="judulHasil" class="text-center">Hasil Pencarian</h4>


  <div id="hasil-lowongan" class="row row-cols-2 mt-4">
  </div>

  <div id="pagination-wrapper" class="mt-4 text-center">
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formCariLowongan');
    const hasilContainer = document.getElementById('hasil-lowongan');
    const paginationWrapper = document.getElementById('pagination-wrapper');
    const inputs = form.querySelectorAll('input');
    let debounceTimer;

    function fetchData(url = null) {
      const formData = new FormData(form);
      const judul = formData.get('judul')?.trim();
      const lokasi = formData.get('lokasi')?.trim();
      const heading = document.getElementById('judulHasil');

      // ✅ Jika input kosong, kosongkan semua & sembunyikan heading
      if (!judul && !lokasi) {
        hasilContainer.innerHTML = '';
        paginationWrapper.innerHTML = '';
        heading.style.display = 'none';
        return;
      }

      const query = new URLSearchParams(formData).toString();
      const endpoint = url ?? `{{ route('lowongan.cari') }}?${query}`;

      fetch(endpoint, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => response.json())
        .then(data => {
          hasilContainer.innerHTML = data.view;
          paginationWrapper.innerHTML = data.pagination;
          if (data.view && data.view.trim() !== '') {
            heading.style.display = 'block';
          } else {
            heading.style.display = 'none';
          }
        })
        .catch(error => {
          console.error('Gagal fetch data:', error);
        });
    }



    form.addEventListener('submit', function(e) {
      e.preventDefault();
      fetchData();
    });

    inputs.forEach(input => {
      input.addEventListener('keyup', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => fetchData(), 400); // debounce
      });
    });

    paginationWrapper.addEventListener('click', function(e) {
      if (e.target.tagName === 'A') {
        e.preventDefault();
        const url = e.target.getAttribute('href');
        if (url) fetchData(url);
      }
    });

    fetchData(); // load awal
  });
</script>