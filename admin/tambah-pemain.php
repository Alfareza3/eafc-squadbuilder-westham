<?php
include '../inc/koneksi.php';
include '../inc/header-admin.php';

$alert = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama    = $_POST['nama'];
  $nomor   = $_POST['nomor'];
  $posisi  = $_POST['posisi'];
  $kapten  = $_POST['kapten_urutan'];
  $status  = $_POST['status'];

  $foto = $_FILES['foto']['name'];
  $tmp  = $_FILES['foto']['tmp_name'];
  $path = "../img/" . $foto;

  if ($kapten != 0) {
    $cek = mysqli_query($conn, "SELECT COUNT(*) FROM pemain WHERE kapten_urutan = $kapten");
    $hasil = mysqli_fetch_array($cek);
    if ($hasil[0] > 0) {
      $alert = "<div class='alert alert-danger text-center'>⚠️ Kapten urutan $kapten sudah dipakai!</div>";
    } else {
      move_uploaded_file($tmp, $path);
      mysqli_query($conn, "INSERT INTO pemain (nama, nomor, posisi, foto, kapten_urutan, status)
                          VALUES ('$nama', '$nomor', '$posisi', '$foto', '$kapten', '$status')");
      $alert = "<div class='alert alert-success text-center'>✅ Pemain berhasil ditambahkan!</div>";
    }
  } else {
    move_uploaded_file($tmp, $path);
    mysqli_query($conn, "INSERT INTO pemain (nama, nomor, posisi, foto, kapten_urutan, status)
                        VALUES ('$nama', '$nomor', '$posisi', '$foto', '$kapten', '$status')");
    $alert = "<div class='alert alert-success text-center'>✅ Pemain berhasil ditambahkan!</div>";
  }
}
?>

<h3 class="text-center mb-4">Tambah Pemain</h3>

<?= $alert ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <form method="POST" enctype="multipart/form-data" class="bg-light text-dark p-4 rounded shadow-sm">
        <div class="mb-3">
          <label class="form-label">Nama Pemain</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nomor Punggung</label>
          <input type="number" name="nomor" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Posisi</label>
          <select name="posisi" class="form-select" required>
            <option value="">-- Pilih Posisi --</option>
            <option>GK</option><option>CB</option><option>LB</option><option>RB</option>
            <option>CDM</option><option>CM</option><option>CAM</option>
            <option>LW</option><option>RW</option><option>ST</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Foto Pemain</label>
          <input type="file" name="foto" accept="image/*" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Kapten Urutan</label>
          <select name="kapten_urutan" class="form-select">
            <option value="0">Bukan Kapten</option>
            <option value="1">Kapten Utama</option>
            <option value="2">Kapten Ke-2</option>
            <option value="3">Kapten Ke-3</option>
            <option value="4">Kapten Ke-4</option>
            <option value="5">Kapten Ke-5</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Status Pemain</label>
          <select name="status" class="form-select" required>
            <option value="starter">🔥 Starter</option>
            <option value="sub">🔁 Substitusi</option>
            <option value="cadangan">📦 Cadangan</option>
          </select>
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Simpan Pemain</button>
          <a href="pemain-list.php" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer-admin.php'; ?>
