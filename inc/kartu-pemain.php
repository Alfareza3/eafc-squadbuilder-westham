<div class="col-auto text-center mx-2 my-2">
  <img src="img/<?= $p['foto'] ?>" width="70" class="rounded-circle border shadow">
  <div class="fw-bold mt-1">
    <?= htmlspecialchars($p['nama']) ?>
    <?php if ($p['kapten_urutan'] == 1): ?>
      <span class="badge bg-warning text-dark">©</span>
    <?php elseif ($p['kapten_urutan'] > 1): ?>
      <span class="badge bg-secondary">C<?= $p['kapten_urutan'] ?></span>
    <?php endif; ?>
  </div>
  <div class="text-muted small">#<?= $p['nomor'] ?> | <?= $p['posisi'] ?></div>
</div>
