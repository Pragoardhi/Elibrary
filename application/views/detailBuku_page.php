<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail <?php echo $detailbuku[0]["Judul"]; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
       
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/style.css" type="text/css">   


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.bootstrap4.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Navbar -->
                <?php $this->load->view('template/header.php') ?>
                <!-- End of Navbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                 
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-dark">Details<button class="btn btn-dark" style="float:right" onclick="location.href='<?= base_url() ?>Home/Katalog'"><h3 class="m-0 font-weight-bold text-dark"></h3>Back</button> </h3>
                        </div>
                        <div class="card-body">
                            <form class="well form-horizontal text-capitalize" action="">
                                <div class="form-group row">
                                    <div class="form-group col-sm-2">
                                        <img class="img-thumbnail" src="<?php echo base_url('upload/book/' . $detailbuku[0]["Image"]) ?>" width="128" />
                                    </div>
                                    <div class="form-group col">
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Judul
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["Judul"]; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                Pengarang
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["Penulis"]; ?>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                ISBN
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["ISBN"]; ?>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Penerbit
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["Penerbit"]; ?>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Tipe
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["Tipe"]; ?>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Bahasa
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["bahasa"]; ?>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Tahun
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["Year"]; ?>
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Harga
                                            </div>
                                            <div class="form-group col">
                                                : Rp. <?php echo $detailbuku[0]["Harga"]; ?> ,-
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <div class="form-group col-sm-3">
                                                Keterangan
                                            </div>
                                            <div class="form-group col">
                                                : <?php echo $detailbuku[0]["Keterangan"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('template/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets') ?>/js/sb-admin-2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

</body>

</html>