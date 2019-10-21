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
            <a class="nav-item nav-link" href="#" id="Navigasi">CMS</a>
            <a class="nav-item nav-link" href="#" id="Navigasi">HASIL LAPORAN</a>
        </div>
        <form class="form-inline">
            <?php if($this->session->userdata('statususer') == "login") {?>
                <button  data-toggle="modal" data-target="#logoutModal" class="btn btn-light" type="button" id="Navigasi" style="color: black"><?php echo $username ?></button>
            <?php }
            else{ ?>
                <button class="btn btn-light" type="button" id="Navigasi" style="color: black" onclick="window.location='<?php echo site_url("Login"); ?>'">Masuk</button>
            <?php } ?>
        </form>
    </div>
</nav>
