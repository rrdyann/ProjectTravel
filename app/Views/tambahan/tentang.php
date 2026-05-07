<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= esc($about['pembuka']) ?></title>

   <link rel="stylesheet" href="<?= base_url('style/tambahan.css') ?>">

  
</head>
<body>

  <div class="topbar">
    <a href="<?= base_url() ?>" class="back-btn" aria-label="Kembali">←</a>
    <div class="top-title"></div>
  </div>

  <div class="card-wrap">
    <div class="card">

      <!-- pembuka sebagai judul -->
      <h1><?= esc($about['pembuka']) ?></h1>

      <!-- isi -->
      <p><?= esc($about['isi']) ?></p>

      <!-- penutup -->
      <p><?= esc($about['penutup']) ?></p>

      <!-- claim (copyright/footer) -->
      <div class="copyright">
        <?= esc($about['claim']) ?>
      </div>

    </div>
  </div>

</body>
</html>