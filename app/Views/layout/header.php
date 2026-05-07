<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
  </head>
  
<body>
  <header>
    <div class="logo">
      <img src="<?= base_url('img/logotravel.png') ?>" alt="Mobil Travel" width="400">
      <strong>Travel Mobil</strong>
    </div>

   <nav>
  <ul>
    <li><a href="<?= base_url('/') ?>">Home</a></li>
    <li><a href="<?= base_url('tambahan/bantuan') ?>">Bantuan</a></li>
        <li><a href="<?= base_url('tambahan/tentang') ?>">Tentang</a></li>
    <?php if (in_groups('admin')):?>
        <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
        <?php endif; ?>
    <li class="profile-menu">
      <a href="javascript:void(0)" class="profile-icon">👤</a>
      <ul class="dropdown">
        <li><a href="<?= base_url('profile') ?>">My Profile</a></li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>

  </header>
<?= $this->renderSection('content')?>