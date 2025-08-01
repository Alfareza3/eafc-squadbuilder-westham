<?php
include 'inc/koneksi.php';
include 'inc/header.php';

$formasi = $_GET['formasi'] ?? '433';

$starter = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'starter' ORDER BY kapten_urutan ASC, posisi ASC, nomor ASC");
$sub     = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'sub' ORDER BY posisi ASC, nomor ASC");
$cadangan = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'cadangan' ORDER BY posisi ASC, nomor ASC");

$posisiMap = [];
while ($p = mysqli_fetch_assoc($starter)) {
  $posisiMap[$p['posisi']][] = $p;
}

function ambilPemain($map, $kode, $jumlah) {
  $list = $map[$kode] ?? [];
  return array_slice($list, 0, $jumlah);
}
?>

<h3 class="mb-3">Formasi: <?= $formasi === '433' ? '4-3-3 Holding' : $formasi ?></h3>



<?php if ($formasi == '433'): ?>
<div class="formasi text-center">

  <div class="row justify-content-center mb-3">
    <?php foreach (ambilPemain($posisiMap, 'LW', 1) as $p) include 'inc/kartu-pemain.php'; ?>
    <?php foreach (ambilPemain($posisiMap, 'ST', 1) as $p) include 'inc/kartu-pemain.php'; ?>
    <?php foreach (ambilPemain($posisiMap, 'RW', 1) as $p) include 'inc/kartu-pemain.php'; ?>
  </div>

    <div class="row justify-content-center mb-3">
    <?php foreach (ambilPemain($posisiMap, 'CM', 1) as $p) include 'inc/kartu-pemain.php'; ?>
    <?php foreach (ambilPemain($posisiMap, 'CDM', 1) as $p) include 'inc/kartu-pemain.php'; ?>
    <?php foreach (ambilPemain($posisiMap, 'CM', 2) as $index => $p) if ($index === 1) include 'inc/kartu-pemain.php'; ?>
    </div>

  <div class="row justify-content-center mb-3">
    <?php foreach (ambilPemain($posisiMap, 'LB', 1) as $p) include 'inc/kartu-pemain.php'; ?>
    <?php foreach (ambilPemain($posisiMap, 'CB', 2) as $p) include 'inc/kartu-pemain.php'; ?>
    <?php foreach (ambilPemain($posisiMap, 'RB', 1) as $p) include 'inc/kartu-pemain.php'; ?>
  </div>

  <div class="row justify-content-center">
    <?php foreach (ambilPemain($posisiMap, 'GK', 1) as $p) include 'inc/kartu-pemain.php'; ?>
  </div>
</div>
<?php endif; ?>

<?php if (mysqli_num_rows($sub) > 0): ?>
  <h4 class="mt-5">🔁 Pemain Pengganti</h4>
  <div class="row justify-content-center">
    <?php while ($p = mysqli_fetch_assoc($sub)) include 'inc/kartu-pemain.php'; ?>
  </div>
<?php endif; ?>

<?php if (mysqli_num_rows($cadangan) > 0): ?>
  <h5 class="mt-4 text-muted">🔁 Cadangan Lapis 2</h5>
  <div class="row justify-content-center">
    <?php while ($p = mysqli_fetch_assoc($cadangan)) include 'inc/kartu-pemain.php'; ?>
  </div>
<?php endif; ?>

<?php include 'inc/footer.php'; ?>
