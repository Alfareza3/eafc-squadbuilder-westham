<?php
include '../inc/koneksi.php';
include '../inc/header-admin.php';

$starter   = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'starter' ORDER BY posisi ASC, nomor ASC");
$sub       = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'sub' ORDER BY posisi ASC, nomor ASC");
$cadangan  = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'cadangan' ORDER BY posisi ASC, nomor ASC");
$kapten    = mysqli_query($conn, "SELECT * FROM pemain WHERE kapten_urutan > 0 ORDER BY kapten_urutan ASC");

$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pemain"));
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">Dashboard Admin</h4>
</div>


<div class="row g-4 mb-5">
  <div class="col-md-3">
    <div class="card bg-primary text-white shadow">
      <div class="card-body text-center">
        <h1><?= $total ?></h1>
        <p class="mb-0">Total Pemain</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-success text-white shadow">
      <div class="card-body text-center">
        <h1><?= mysqli_num_rows($starter) ?></h1>
        <p class="mb-0">Starter</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-warning text-dark shadow">
      <div class="card-body text-center">
        <h1><?= mysqli_num_rows($sub) ?></h1>
        <p class="mb-0">Substitusi</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-secondary text-white shadow">
      <div class="card-body text-center">
        <h1><?= mysqli_num_rows($cadangan) ?></h1>
        <p class="mb-0">Cadangan</p>
      </div>
    </div>
  </div>
</div>

<div class="mb-5">
  <h4 class="mb-3">🔥 Starting XI</h4>
  <div class="row row-cols-2 row-cols-md-4 g-3">
    <?php while ($p = mysqli_fetch_assoc($starter)): ?>
      <div class="col">
        <div class="card bg-dark text-white h-100 text-center">
          <img src="../img/<?= $p['foto'] ?>" class="card-img-top" alt="<?= $p['nama'] ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?= htmlspecialchars($p['nama']) ?></h5>
            <small>#<?= $p['nomor'] ?> - <?= $p['posisi'] ?></small>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<div class="mb-5">
  <h4 class="mb-3">🔁 Pemain Substitusi</h4>
  <div class="row row-cols-2 row-cols-md-4 g-3">
    <?php while ($p = mysqli_fetch_assoc($sub)): ?>
      <div class="col">
        <div class="card bg-dark text-white h-100 text-center">
          <img src="../img/<?= $p['foto'] ?>" class="card-img-top" alt="<?= $p['nama'] ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?= htmlspecialchars($p['nama']) ?></h5>
            <small>#<?= $p['nomor'] ?> - <?= $p['posisi'] ?></small>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<div class="mb-5">
  <h4 class="mb-3">Cadangan Kedua</h4>
  <div class="row row-cols-2 row-cols-md-4 g-3">
    <?php while ($p = mysqli_fetch_assoc($cadangan)): ?>
      <div class="col">
        <div class="card bg-dark text-white h-100 text-center">
          <img src="../img/<?= $p['foto'] ?>" class="card-img-top" alt="<?= $p['nama'] ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?= htmlspecialchars($p['nama']) ?></h5>
            <small>#<?= $p['nomor'] ?> - <?= $p['posisi'] ?></small>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<div class="mb-5">
  <h4 class="mb-3">Urutan Kapten</h4>
  <div class="row row-cols-2 row-cols-md-4 g-3">
    <?php while ($p = mysqli_fetch_assoc($kapten)): ?>
      <div class="col">
        <div class="card border-light bg-dark text-white h-100 text-center">
          <img src="../img/<?= $p['foto'] ?>" class="card-img-top" alt="<?= $p['nama'] ?>">
          <div class="card-body">
            <h5 class="card-title mb-1"><?= htmlspecialchars($p['nama']) ?></h5>
            <small>C<?= $p['kapten_urutan'] ?> • #<?= $p['nomor'] ?> - <?= $p['posisi'] ?></small>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include '../inc/footer-admin.php'; ?>
