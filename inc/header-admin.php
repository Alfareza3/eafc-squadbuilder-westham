<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Squad Builder</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/script.js" defer></script>
</head>
<body>

<header class="py-2" style="background-color: #7A263A;">
  <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div class="d-flex align-items-center gap-2">
      <img src="../img/westham.svg" alt="Logo West Ham" height="38">
      <span class="fs-5 fw-bold text-white">Admin Panel</span>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="../index.php" class="btn btn-sm btn-light">⏎ Kembali</a>
      <button onclick="toggleMode()" class="btn btn-sm btn-outline-light">🌓 Mode</button>
    </div>
  </div>
</header>

<nav class="navbar navbar-expand-md navbar-dark py-1" style="background-color: #5A1F2E; margin-bottom: 1rem;">
  <div class="container">
    <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNav">
      <ul class="navbar-nav me-auto mb-2 mb-md-0 small">
        <li class="nav-item">
          <a class="nav-link" href="index.php">🏠 Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah-pemain.php">➕ Tambah Pemain</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pemain-list.php">📋 Daftar Pemain</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container">
