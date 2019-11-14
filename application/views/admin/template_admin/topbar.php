<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <?php if ($this->session->flashdata('notifbuku') == "true") { ?>
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">!</span>
                </a>
            <?php
            } else { ?>
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book fa-fw"></i>
                    <!-- Counter - Alerts -->
                </a>
            <?php }
            $count = count($listbuku); ?>
            <!-- Dropdown - Alerts -->
            <?php if ($count != 0) { ?>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Buku baru
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>Admin/Detailbuku/<?php echo $listbuku[$count - 1]["Judul"] ?>">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="<?php echo base_url('upload/book/' . $listbuku[$count - 1]["Image"]) ?>" width="64" />
                        </div>
                        <div>
                            <div class="small text-gray-500"><?php echo $listbuku[$count - 1]["Year"] ?></div>
                            <span class="font-weight-bold"><?php echo $listbuku[$count - 1]["Judul"] ?></span>
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('Admin/Daftarbuku') ?>">Tampilkan seluruh buku</a>
                </div>
            <?php } ?>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <?php if ($this->session->flashdata('notifuser') == "true") { ?>
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">!</span>
                </a>
            <?php
            } else { ?>
                <a class="nav-link dropdown-toggle " href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <!-- Counter - Messages -->

                </a>
            <?php }
            $countuser = count($listuser); ?>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Pengguna baru
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>Admin/Detailuser/<?php echo $listuser[$countuser - 1]["username"] ?>">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?php echo base_url('upload/user/' . $listuser[$countuser - 1]["image"]) ?>" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-capitalize"><?php echo $listuser[$countuser - 1]["username"] ?></div>
                        <div class="small text-gray-500"><?php echo $listuser[$countuser - 1]["email"] ?></div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('Admin/Daftaruser') ?>">Tampilkan seluruh user</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <?php if ($this->session->flashdata('notifuser') == "true") { ?>
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">!</span>
                </a>
            <?php
            } else { ?>
                <a class="nav-link dropdown-toggle " href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Messages -->

                </a>
            <?php }
            $counttransaksi = count($listtransaksi); ?>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Transaksi baru
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('Admin/Transaksibuku') ?>" id="Transaksi<?php echo $counttransaksi - 1 ?>">
                    <script>
                        document.getElementById("Transaksi<?php echo $counttransaksi - 1 ?>").onclick = function() {
                            <?php $this->load->model('admin_model');
                            $this->admin_model->insertNotifikasiTransaksi($listtransaksi[$counttransaksi - 1]["ID_Peminjaman"]);
                            ?>
                        }
                    </script>

                    <div class="font-weight-bold">
                        <div class="text-capitalize"><?php echo $listtransaksi[$counttransaksi - 1]["Judul"] ?></div>
                        <div class="small text-gray-500">Dipinjam oleh: <?php echo $listtransaksi[$counttransaksi - 1]["username"] ?></div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('Admin/Transaksibuku') ?>">Tampilkan seluruh transaksi</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-transform: capitalize;font-weight: bold"><?php echo $username; ?></span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('/Login/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>