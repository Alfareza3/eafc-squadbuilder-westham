<?php
include '../inc/koneksi.php';
include '../inc/header-admin.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pemain WHERE id = $id");
$p = mysqli_fetch_assoc($data);

if (!$p) {
  echo "<div class='alert alert-danger text-center'>Pemain tidak ditemukan.</div>";
  include '../inc/footer-admin.php';
  exit;
}

$alert = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama   = $_POST['nama'];
  $nomor  = $_POST['nomor'];
  $posisi = $_POST['posisi'];
  $kapten = $_POST['kapten_urutan'];
  $status = $_POST['status'];
  $foto   = $p['foto'];

  if ($_FILES['foto']['name']) {
    $fotoBaru = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "../img/" . $fotoBaru;
    move_uploaded_file($tmp, $path);
    $foto = $fotoBaru;
  }

  if ($kapten != 0) {
    $cek = mysqli_query($conn, "SELECT COUNT(*) FROM pemain WHERE kapten_urutan = $kapten AND id != $id");
    $hasil = mysqli_fetch_array($cek);
    if ($hasil[0] > 0) {
      $alert = "<div class='alert alert-danger text-center'>⚠️ Kapten urutan $kapten sudah dipakai pemain lain!</div>";
    } else {
      mysqli_query($conn, "UPDATE pemain SET 
        nama = '$nama', 
        nomor = '$nomor', 
        posisi = '$posisi', 
        foto = '$foto', 
        kapten_urutan = '$kapten',
        status = '$status'
        WHERE id = $id");
      $alert = "<div class='alert alert-success text-center'>✅ Data pemain berhasil diperbarui!</div>";
      $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pemain WHERE id = $id"));
    }
  } else {
    mysqli_query($conn, "UPDATE pemain SET 
      nama = '$nama', 
      nomor = '$nomor', 
      posisi = '$posisi', 
      foto = '$foto', 
      kapten_urutan = '$kapten',
      status = '$status'
      WHERE id = $id");
    $alert = "<div class='alert alert-success text-center'>✅ Data pemain berhasil diperbarui!</div>";
    $p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pemain WHERE id = $id"));
  }
}
?>

<h3 class="text-center mb-4">✏️ Edit Pemain</h3>

<?= $alert ?>

<div class="row justify-content-center">
  <div class="col-md-8 col-lg-6">
    <form method="POST" enctype="multipart/form-data" class="bg-light text-dark p-4 rounded shadow-sm">
      <div class="mb-3">
        <label class="form-label">Nama Pemain</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($p['nama']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nomor Punggung</label>
        <input type="number" name="nomor" class="form-control" value="<?= $p['nomor'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Posisi</label>
        <select name="posisi" class="form-select" required>
          <?php
            $posisiList = ['GK','CB','LB','RB','CDM','CM','CAM','LW','RW','ST'];
            foreach ($posisiList as $pos) {
              echo "<option value='$pos'" . ($p['posisi'] === $pos ? " selected" : "") . ">$pos</option>";
            }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Ganti Foto (opsional)</label><br>
        <img src="../img/<?= $p['foto'] ?>" width="80" class="mb-2 rounded"><br>
        <input type="file" name="foto" accept="image/*" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Kapten Urutan</label>
        <select name="kapten_urutan" class="form-select">
          <option value="0" <?= $p['kapten_urutan'] == 0 ? "selected" : "" ?>>Bukan Kapten</option>
          <?php for ($i = 1; $i <= 5; $i++): ?>
            <option value="<?= $i ?>" <?= $p['kapten_urutan'] == $i ? "selected" : "" ?>>Kapten Ke-<?= $i ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Status Pemain</label>
        <select name="status" class="form-select" required>
          <option value="starter" <?= $p['status'] === 'starter' ? 'selected' : '' ?>>🔥 Starter</option>
          <option value="sub" <?= $p['status'] === 'sub' ? 'selected' : '' ?>>🔁 Substitusi</option>
          <option value="cadangan" <?= $p['status'] === 'cadangan' ? 'selected' : '' ?>>📦 Cadangan</option>
        </select>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="pemain-list.php" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
</div>

<?php include '../inc/footer-admin.php'; ?>
