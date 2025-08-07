<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Absensi Karyawan</title>
  <script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script defer src="js/script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900">
  <x-navbar></x-navbar>
  <main class="max-w-7xl mx-auto px-6 py-8" id="app">
    @yield('content')
  </main>

  <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg text-center">
      <p id="LoadingText" class="text-gray-700 font-medium">Sedang mendeteksi wajah...</p>
    </div>
  </div>
</body>

</html>