<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @livewireStyles
  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      color: white;
      padding: 10px 20px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .main-content {
      margin-left: 220px;
      padding: 20px;
      width: calc(100% - 220px);
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center">Menu</h4>
    <a href="/tiket">Tiket</a>
    <a href="/film">Film</a>
    <a href="/jadwal">Jadwal</a>
    <a href="/logout" onclick="return confirm('Yakin mau logout?')">Logout</a>
  </div>

  <!-- Livewire Component Area -->
  <div class="main-content">
    <livewire:main />
  </div>

  @livewireScripts
</body>
</html>
