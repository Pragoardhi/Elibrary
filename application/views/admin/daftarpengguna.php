<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Daftar Pengguna</title>

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.bootstrap4.min.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/template_admin/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/template_admin/topbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- alert -->
          <?php if ($this->session->flashdata('dataada') == TRUE) { ?>
            <div role="alert" id="alert" class="alert alert-danger alert-dismissible" style="text-align:center">
              <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
              </button>
              <p><?php echo $this->session->flashdata('dataada') ?></p>
            </div>
            <script>
              window.setTimeout(function() {
                $("#alert").fadeTo(500, 0).slideUp(500, function() {
                  $(this).remove();
                });
              }, 3000);
            </script>
          <?php }
          if ($this->session->flashdata('databerhasil') == TRUE) { ?>
            <div role="alert" id="alert" class="alert alert-success alert-dismissible" style="text-align:center">
              <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
              </button>
              <p><?php echo $this->session->flashdata('databerhasil') ?></p>
            </div>
            <script>
              window.setTimeout(function() {
                $("#alert").fadeTo(500, 0).slideUp(500, function() {
                  $(this).remove();
                });
              }, 3000);
            </script>
          <?php } ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary">Daftar Pengguna <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal" style="float:right">Tambah Pengguna</button></h3>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" name="tableuser" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Image</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Image</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $count  = count($listuser);
                    for ($i = 0; $i < $count; $i++) {
                      $number = $i + 1;
                      echo '<tr>';
                      echo '<td>' . $number . '</td>';
                      ?>
                      <td>
                        <img src="<?php echo base_url('upload/user/' . $listuser[$i]["image"]) ?>" width="64" />
                      </td>
                      <?php
                        echo '<td>' . $listuser[$i]["username"] . '</td>';
                        echo '<td>' . $listuser[$i]["email"] . '</td>';
                        if ($listuser[$i]["status"] == "1") {
                          echo '<td> Admin </td>';
                        } else {
                          echo '<td> User </td>';
                        }
                        ?>
                      <td style="text-align: center">
                        <?php if ($listuser[$i]["active"] == 1) { ?>
                          <span class="dot" style="height: 20px;width: 20px;background-color: green;border-radius: 50%;display: inline-block;"></span>
                        <?php } else { ?>
                          <span class="dot" style="height: 20px;width: 20px;background-color: red;border-radius: 50%;display: inline-block;"></span>
                        <?php } ?>
                      </td>
                      <td>
                        <button class="btn btn-secondary" id="edibtn" type="button" data-toggle="modal" data-target="#editModal<?php echo $i; ?>"> <i class="fas fa-edit"></i></button>
                        <?php
                          if ($listuser[$i]["status"] == "-1") {
                            ?>
                          <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal<?php echo $i; ?>"><i class="fas fa-trash"></i></button>
                        <?php } ?>
                      </td>
                      </tr>
                      <!-- edit modal -->
                      <div class="modal fade" id="editModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="well form-horizontal" method="post" action="<?= base_url('Admin/Saveedit') ?>" enctype="multipart/form-data">
                                <fieldset>
                                  <div class="form-group" hidden>
                                    <span></span>
                                    <label class="control-label">No</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="editid" name="editid" placeholder="Full Name" class="form-control" required="true" value="<?php echo $listuser[$i]["id"]; ?>" readonly="readonly"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <span></span>
                                    <label class="control-label">Username</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="editusername" name="editusername" placeholder="Full Name" class="form-control" required="true" value="<?php echo $listuser[$i]["username"]; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="ontrol-label">Email</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="editemail" name="editemail" placeholder="Email" class="form-control" required="true" value="" type="email"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="ontrol-label">Status</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="editstatus" name="editstatus" placeholder="Status" class="form-control" required="true" value="<?php if ($listuser[$i]["status"] == "1") {
                                                                                                                                                                                                                    echo "Admin";
                                                                                                                                                                                                                  } else {
                                                                                                                                                                                                                    echo "User";
                                                                                                                                                                                                                  } ?>" readonly="readonly"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Foto Profile</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="editprofile" name="editprofile" placeholder="Profile" class="form-control-file" value="" type="file"></div>
                                    </div>
                                  </div>
                                  <!-- password lama disimpan -->
                                  <div class="form-group">
                                    <label class="control-label">Password lama</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="oldpassword" name="oldpassword" placeholder="Password" class="form-control" required="true" value="" type="password"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Password baru</label>
                                    <div class="inputGroupContainer">
                                      <div class="input-group"><span class="input-group-addon"></span><input id="editoldpassword" name="editoldpassword" placeholder="Password" class="form-control" required="true" value="" type="password"></div>
                                    </div>
                                  </div>
                                </fieldset>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary" id="buttonSubmit">Save</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $listuser[$i]["username"] ?>?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Pilih "Hapus" untuk menghapus <?php echo $listuser[$i]["username"] ?> dari daftar pengguna.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <a class="btn btn-primary" href="<?= base_url() ?>Admin/Deleteuser/<?php echo $listuser[$i]["id"] ?>">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Tambah modal -->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="well form-horizontal" method="post" action="<?= base_url('Admin/Adduser') ?>" enctype="multipart/form-data">
            <fieldset>
              <div class="form-group" hidden>
                <span></span>
                <label class="control-label">No</label>
                <div class="inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"></span><input id="tambahid" name="tambahtid" placeholder="Full Name" class="form-control" required="true" value="<?php echo count($listuser) + 1; ?>" readonly="readonly"></div>
                </div>
              </div>
              <div class="form-group">
                <span></span>
                <label class="control-label">Username</label>
                <div class="inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"></span><input id="tambahusername" name="tambahusername" placeholder="Full Name" class="form-control" required="true" value=""></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <div class="inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"></span><input id="tambahemail" name="tambahemail" placeholder="Email" class="form-control" required="true" value="" type="email"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Status</label>
                <div class="inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"></span><input id="tambahstatus" name="tambahstatus" placeholder="Email" class="form-control" required="true" value="User" type="text" readonly="readonly"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Password</label>
                <div class="inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"></span><input id="tambahpassword" name="tambahpassword" placeholder="Password" class="form-control" required="true" value="" type="password"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <div class="inputGroupContainer">
                  <div class="input-group"><span class="input-group-addon"></span><input id="confirmtambahpassword" name="confirmtambahpassword" placeholder="Confirm Password" class="form-control" required="true" value="" type="password"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Foto Profile</label>
                <div class="inputGroupContainer">
                  <img class="img-thumbnail" id="imagetambah" width="1020" />
                  <div class="input-group"><span class="input-group-addon"></span><input id="tambahprofile" name="tambahprofile" placeholder="Profile" class="form-control-file" value="" type="file"></div>
                </div>
              </div>
            </fieldset>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="buttonSubmit">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>


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
  <script>
    var password = document.getElementById("tambahpassword"),
      confirm_password = document.getElementById("confirmtambahpassword");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Password Tidak Sama");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
  <script>
    document.getElementById("tambahprofile").onchange = function() {
      var reader = new FileReader();

      reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("imagetambah").src = e.target.result;
      };

      // read the image file as a data URL.
      reader.readAsDataURL(this.files[0]);
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            exportOptions: {
              columns: [0, 2, 3, 4]
            },
            className: 'btn btn-success'
          },
          {
            extend: 'pdfHtml5',
            exportOptions: {
              columns: [0, 2, 3, 4]
            },
            className: 'btn btn-danger'
          }
        ]
      });
    });
  </script>
</body>

</html>