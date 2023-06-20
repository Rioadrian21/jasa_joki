<nav class="navbar fixed-top navbar-expand-lg bg-dark py-1" style="border-bottom: 4px solid yellow;">
  <div class="container">
    <a class="navbar-brand font-weight-bold font-italic text-warning ml-3" href="#">JASA JOKI GAME ONLINE</a>
    <button class="navbar-toggler m-2 mr-3" type="button" style="border:none;" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto">
        <?php if ($this->session->userdata('role') == 'admin') { ?>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-warning mx-2 text-warning my-2" aria-current="page" href="<?= base_url('admin');?>">Dashboard</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-warning mx-2 text-warning my-2" aria-current="page" href="<?= base_url('user');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-warning mx-2 text-warning my-2" href="<?= base_url('user/buatPesanan');?>">Buat Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-warning mx-2 text-warning my-2" href="<?= base_url('user/history');?>">History</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link btn btn-outline-warning mx-2 text-warning my-2" href="<?= base_url('user/about');?>">About</a>
        </li>
        <?php } ?>
        <li class="nav-item dropdown n2">
          <a class="nav-link dropdown-toggle btn btn-outline-warning mx-2 text-warning my-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $user['name']; ?>
          </a>
          <ul class="dropdown-menu mx-2">
            <li><a class="dropdown-item mx-2 text-warning" href="<?= base_url('menu/profile'); ?>">Profile</a></li>
            <li><a class="dropdown-item mx-2 text-warning" href="<?= base_url('menu/changepassword'); ?>">Change Password</a></li>
            <li><a class="dropdown-item mx-2 text-warning" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
          </ul>
        </li>    
      </ul>
    </div>
      <ul class="navbar-nav ml-2 text-dark n1">
        <li class="nav-item dropdown">
          <a class="nav-link text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $user['name']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-warning" href="<?= base_url('menu/profile'); ?>">Profile</a></li>
            <li><a class="dropdown-item text-warning" href="<?= base_url('menu/changepassword'); ?>">Change Password</a></li>
            <li><a class="dropdown-item text-warning" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
          </ul>
        </li>    
      </ul>
  </div>
</nav>
 