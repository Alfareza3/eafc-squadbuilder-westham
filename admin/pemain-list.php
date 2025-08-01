<?php
include '../inc/koneksi.php';
include '../inc/header-admin.php';

$starter  = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'starter' ORDER BY nomor ASC");
$sub      = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'sub' ORDER BY nomor ASC");
$cadangan = mysqli_query($conn, "SELECT * FROM pemain WHERE status = 'cadangan' ORDER BY nomor ASC");
?>

<h3 class="mb-4">📋 Daftar Pemain</h3>
<a href="tambah-pemain.php" class="btn btn-success mb-3">➕ Tambah Pemain</a>

<div class="table-responsive">
  <table class="table table-dark table-bordered align-middle">
    <thead class="table-light text-dark text-center">
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Nomor</th>
        <th>Posisi</th>
        <th>Status</th>
        <th>Kapten?</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;

        function tampilkanBaris($data, &$no) {
          while ($row = mysqli_fetch_assoc($data)) {
            echo '<tr>';
            echo '<td class="text-center">' . $no++ . '</td>';
            echo '<td class="text-center"><img src="../img/' . $row['foto'] . '" width="40" class="rounded-circle"></td>';
            echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
            echo '<td class="text-center">#' . $row['nomor'] . '</td>';
            echo '<td class="text-center">' . $row['posisi'] . '</td>';

            echo '<td class="text-center">';
            echo match ($row['status']) {
              'starter' => '🔥 Starter',
              'sub'     => '🔁 Sub',
              default   => '📦 Cadangan'
            };
            echo '</td>';

            echo '<td class="text-center">';
            echo $row['kapten_urutan'] == 1 ? 'Kapten' : ($row['kapten_urutan'] > 1 ? 'C' . $row['kapten_urutan'] : '-');
            echo '</td>';

            echo '<td class="text-center">';
            echo '<a href="edit-pemain.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning">✏️ Edit</a> ';
            echo '<a href="hapus-pemain.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin hapus pemain ini?\')">🗑️ Hapus</a>';
            echo '</td>';

            echo '</tr>';
          }
        }

        // Tampilkan per kategori
        tampilkanBaris($starter, $no);
        tampilkanBaris($sub, $no);
        tampilkanBaris($cadangan, $no);
      ?>
    </tbody>
  </table>
</div>

<?php include '../inc/footer-admin.php'; ?>
