{{-- Kategori --}}
<div class="container-all d-flex gap-5 flex-column">
  <div class="popular-categories mb-4">
    <h2>Kategori pekerjaan populer</h2>
    <div class="category-buttons">
      <button onclick="goToCategory('UI/UX')">UI/UX</button>
      <button onclick="goToCategory('Frontend')">Frontend</button>
      <button onclick="goToCategory('Programing')">Programing</button>
      <button onclick="goToCategory('IT Support')">IT Support</button>
      <button onclick="goToCategory('Management')">Management</button>
      <button onclick="goToCategory('Golang')">Golang</button>
    </div>

  </div>
  <script>
    function goToCategory(kategori) {
      window.location.href = `/jobkategori/${encodeURIComponent(kategori)}`;
    }
  </script>