<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img class="logo" src="<?php echo base_url('assets') ?>/image/elo_logo_putih.png" width="70px" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto" id="navbarNav">
            <a class="nav-item nav-link" href="<?= base_url('Home') ?>" id="Navigasi">BERANDA </a>
            <a class="nav-item nav-link" href="<?= base_url('Home/Katalog') ?>" id="Navigasi">KATALOG BUKU</a>
            <a class="nav-item nav-link" href="<?= base_url('Home/DataAnggota') ?>" id="Navigasi">DATA ANGGOTA</a>
            <a class="nav-item nav-link" href="<?= base_url('Home/TransaksiUser') ?>" id="Navigasi">TRANSAKSI BUKU</a>
        </div>
        <form class="form-inline">
            <?php if ($this->session->userdata('statususer') == "login") { ?>
                <button data-toggle="modal" data-target="#logoutModal" class="btn btn-light" type="button" id="Navigasi" style="color: black"><?php echo $username ?></button>
            <?php } else { ?>
                <button class="btn btn-light" type="button" id="Navigasi" style="color: black" onclick="window.location='<?php echo site_url("Login"); ?>'">Masuk</button>
            <?php } ?>
        </form>
    </div>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin mau keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda ingin Logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-danger" onclick="window.location='<?php echo site_url("Login/logout"); ?>'">Log Out</button>
        </div>
      </div>
    </div>
  </div>